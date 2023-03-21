function loadTable() {
    $("#table").DataTable({
        destroy: true,
        responsive: true,
        language: SPANISH,
        ajax: {
            type: "GET",
            url: "/foundations/documentaries/guardians/getAll",
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
                title: "Teléfono",
                targets: 3,
            },
            {
                title: "Estado",
                targets: 2,
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
                data: "telephone",
            },
            {
                "data": null,
                "render": function(data, type, row) {
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
        url: "/foundations/documentaries/guardians/getOne",
        data: {
            id: id,
        },
    })
        .done(function (data) {
            showButtons();

            $("#id").val(data.id);
            $("#name").val(data.name);
            $("#lastname").val(data.lastname);
            $("#document_type").val(data.document_type).change();
            $("#document_number").val(data.document_number);
            $("#city_id").val(data.city_id).change();
            $("#address").val(data.address);
            $("#telephone").val(data.telephone);
            $("#status").val(data.status);
            $("#created_at").val(new Date(data.created_at).toDateString());
            $("#updated_at").val(new Date(data.updated_at).toDateString());

            $("#students_container").show();
            $("#students").empty();

            if (data.student.length > 0) {
                for (let i = 0; i < data.student.length; i++) {
                    $("#students").append(
                        `<option>${data.student[i].document_number} - ${data.student[i].name} ${data.student[i].lastname}</option>`
                    );
                }
            } else {
                $("#students").append(`<option>Ningún estudiante</option>`);
            }
        })
        .fail(function () {
            fail();
        });
}

function store() {
    $.ajax({
        type: "GET",
        url: "/foundations/documentaries/guardians/store",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                "name",
                "lastname",
                "document_type",
                "document_number",
                "city_id",
                "address",
                "telephone",
            ]);
        });
}

function update() {
    $.ajax({
        type: "GET",
        url: "/foundations/documentaries/guardians/update",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                "name",
                "lastname",
                "document_type",
                "document_number",
                "city_id",
                "address",
                "telephone",
            ]);
        });
}

function destroy() {
    $.ajax({
        type: "GET",
        url: "/foundations/documentaries/guardians/destroy",
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
    loadSelectCity();

    $("#students_container").hide();

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
