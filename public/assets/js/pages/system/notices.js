function loadTable() {
    $("#table").DataTable({
        destroy: true,
        responsive: true,
        language: SPANISH,
        ajax: {
            type: "GET",
            url: "/system/notices/getAll",
            dataSrc: "",
        },
        dom: TABLE_DOM,
        drawCallback: TABLE_DRAW_CALLBACK,
        createdRow: TABLE_CREATED_ROW,
        columnDefs: [
            {
                title: "Titulo",
                targets: 0,
            },
            {
                title: "Creado el",
                targets: 1,
            },
            {
                title: "Estado",
                targets: 2,
            },
        ],
        columns: [
            {
                data: "title",
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    let date = new Date(data.created_at).toLocaleString();

                    return date;
                },
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
        url: "/system/notices/getOne",
        data: {
            id: id,
        },
    })
        .done(function (data) {
            showButtons();

            $("#id").val(data.id);
            $("#title").val(data.title);
            $("#content").val(data.content);
            $("#status").val(data.status);
            $("#created_at").val(new Date(data.created_at).toDateString());
            $("#updated_at").val(new Date(data.updated_at).toDateString());

            data.status == "Inactivo" ? hideDeactivate() : "";
            data.status == "Inactivo" ? hideDelete() : "";
            data.status == "Inactivo" ? hideSave() : "";
        })
        .fail(function () {
            fail();
        });
}

function store() {
    $.ajax({
        type: "GET",
        url: "/system/notices/store",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                "title",
                "content",
            ]);
        });
}

function update() {
    $.ajax({
        type: "GET",
        url: "/system/notices/update",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                "title",
                "content",
            ]);
        });
}

function deactivate() {
    $.ajax({
        type: "GET",
        url: "/system/notices/deactivate",
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

    $(document).on("click", "#deactivate", function () {
        deactivate();
    });
});
