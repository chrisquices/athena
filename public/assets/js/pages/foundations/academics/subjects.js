function loadTable() {
    $("#table").DataTable({
        destroy: true,
        responsive: true,
        language: SPANISH,
        ajax: {
            type: "GET",
            url: "/foundations/academics/subjects/getAll",
            dataSrc: "",
        },
        dom: TABLE_DOM,
        drawCallback: TABLE_DRAW_CALLBACK,
        createdRow: TABLE_CREATED_ROW,
        columnDefs: [
            {
                title: "Área",
                targets: 0,
            },
            {
                title: "Nombre",
                targets: 1,
            },
            {
                title: "Acrónimo",
                targets: 2,
            },
            {
                title: "Estado",
                targets: 3,
            },
        ],
        columns: [
            {
                data: "area.name",
            },
            {
                data: "name",
            },
            {
                data: "acronym",
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
        url: "/foundations/academics/subjects/getOne",
        data: {
            id: id,
        },
    })
        .done(function (data) {
            showButtons();

            $("#id").val(data.id);
            $("#area_id").val(data.name);
            $("#name").val(data.name);
            $("#acronym").val(data.name);
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
        url: "/foundations/academics/subjects/store",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, ["name"]);
        });
}

function update() {
    $.ajax({
        type: "GET",
        url: "/foundations/academics/subjects/update",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, ["name"]);
        });
}

function destroy() {
    $.ajax({
        type: "GET",
        url: "/foundations/academics/subjects/destroy",
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
    loadSelectArea();

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
