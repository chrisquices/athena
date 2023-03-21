function loadTable() {
    $("#table").DataTable({
        destroy: true,
        responsive: true,
        language: SPANISH,
        ajax: {
            type: "GET",
            url: "/foundations/documentaries/students/getAll",
            dataSrc: "",
        },
        dom: TABLE_DOM,
        drawCallback: TABLE_DRAW_CALLBACK,
        createdRow: TABLE_CREATED_ROW,
        columnDefs: [
            {
                title: "Nombre y apellido",
                targets: 0,
            },
            {
                title: "Tipo de documento",
                targets: 1,
            },
            {
                title: "Número de documento",
                targets: 2,
            },
            {
                title: "Estado",
                targets: 3,
            },
        ],
        columns: [
            {
                data: null,
                render: function (data) {
                    return `${data.name} ${data.lastname}`;
                },
            },
            {
                data: "document_type",
            },
            {
                data: "document_number",
            },
            {
                data: null,
                render: function (data, type, row) {
                    return applyStatusIconAndColor(data);
                },
            },
        ],
    });
}

function show(id) {
    clickDetalle();

    $.ajax({
        type: "GET",
        url: "/foundations/documentaries/students/getOne",
        data: {
            id: id,
        },
    })
        .done(function (data) {
            showButtons();

            $("#id").val(data.id);
            $("#guardian_id").val(data.guardian_id).change();
            $("#name").val(data.name);
            $("#lastname").val(data.lastname);
            $("#document_type").val(data.document_type).change();
            $("#document_number").val(data.document_number);
            $("#nationality_id").val(data.nationality_id).change();
            $("#birth_date").val(data.birth_date.replace(/\//g, "-"));
            $("#sex").val(data.sex).change();
            $("#status").val(data.status);
            $("#created_at").val(new Date(data.created_at).toDateString());
            $("#updated_at").val(new Date(data.updated_at).toDateString());
        })
        .fail(function () {
            fail();
        });
}

function store() {
    $.ajax({
        type: "GET",
        url: "/foundations/documentaries/students/store",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                "guardian_id",
                "name",
                "lastname",
                "document_type",
                "document_number",
                "nationality_id",
                "birth_date",
                "sex",
            ]);
        });
}

function update() {
    $.ajax({
        type: "GET",
        url: "/foundations/documentaries/students/update",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                "guardian_id",
                "name",
                "lastname",
                "document_type",
                "document_number",
                "nationality_id",
                "birth_date",
                "sex",
            ]);
        });
}

function destroy() {
    $.ajax({
        type: "GET",
        url: "/foundations/documentaries/students/destroy",
        data: {
            id: $("#id").val(),
        },
    })
        .done(function () {
            success();
        })
        .fail(function () {
            fail();
        });
}

$(document).ready(function () {
    loadTable();
    loadSelectGuardian();
    loadSelectNationality();

    $(document).on("click", ".detalle", function () {
        show($(this).attr("data-id"));
    });

    $(document).on("click", "#save", function () {
        action = $("#id").val() ? update() : store();
    });

    $(document).on("click", "#delete", function () {
        destroy();
    });
});
