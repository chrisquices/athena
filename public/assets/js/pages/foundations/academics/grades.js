function loadTable() {
    $("#table").DataTable({
        destroy: true,
        responsive: true,
        language: SPANISH,
        ajax: {
            type: "GET",
            url: "/foundations/academics/grades/getAll",
            dataSrc: "",
        },
        dom: TABLE_DOM,
        drawCallback: TABLE_DRAW_CALLBACK,
        createdRow: TABLE_CREATED_ROW,
        columnDefs: [
            {
                title: "Nombre",
                targets: 0,
            },
            {
                title: "Nombre (Numérico)",
                targets: 1,
            },
            {
                title: "Nombre (Textual)",
                targets: 2,
            },
            {
                title: "Nombre Alternativo",
                targets: 3,
            },
            {
                title: "Nivel",
                targets: 4,
            },
            {
                title: "Estado",
                targets: 5,
            },
        ],
        columns: [
            {
                data: "name",
            },
            {
                data: "name_number",
            },
            {
                data: "name_text",
            },
            {
                data: "name_alternative",
            },
            {
                data: "level",
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
        url: "/foundations/academics/grades/getOne",
        data: {
            id: id,
        },
    })
        .done(function (data) {
            showButtons();

            $("#id").val(data.id);
            $("#name").val(data.name);
            $("#name_number").val(data.name_number);
            $("#name_text").val(data.name_text);
            $("#name_alternative").val(data.name_alternative).change();
            $("#level").val(data.level).change();
            $("#level_acronym").val(data.level_acronym).change();
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
        url: "/foundations/academics/grades/store",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                "name",
                "name_number",
                "name_text",
                "name_alternative",
                "level",
            ]);
        });
}

function update() {
    $.ajax({
        type: "GET",
        url: "/foundations/academics/grades/update",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                "name",
                "name_number",
                "name_text",
                "name_alternative",
                "level",
            ]);
        });
}

function destroy() {
    $.ajax({
        type: "GET",
        url: "/foundations/academics/grades/destroy",
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
