function loadTable() {
    $("#table").DataTable({
        destroy: true,
        responsive: true,
        language: SPANISH,
        ajax: {
            type: "GET",
            url: "/system/branches/getAll",
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
                title: "Acrónimo",
                targets: 1,
            },
            {
                title: "Teléfono",
                targets: 2,
            },
            {
                title: "Dirección",
                targets: 3,
            },
            {
                title: "Estado",
                targets: 4,
            },
        ],
        columns: [
            {
                data: "name",
            },
            {
                data: "acronym",
            },
            {
                data: "telephone",
            },
            {
                data: "address",
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
        url: "/system/branches/getOne",
        data: {
            id: id,
        },
    })
        .done(function (data) {
            showButtons();

            $("#id").val(data.id);
            $("#name").val(data.name);
            $("#acronym").val(data.acronym);
            $("#telephone").val(data.telephone);
            $("#address").val(data.address);
            $("#created_at").val(new Date(data.created_at).toDateString());
            $("#updated_at").val(new Date(data.updated_at).toDateString());
            $("#status").val(data.status);

            data.status == "Activo" ? hideReactivate() : "";
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
        url: "/system/branches/store",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                "name",
                "acronym",
                "telephone",
                "address",
            ]);
        });
}

function update() {
    $.ajax({
        type: "GET",
        url: "/system/branches/update",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                "name",
                "acronym",
                "telephone",
                "address",
            ]);
        });
}

function deactivate() {
    $.ajax({
        type: "GET",
        url: "/system/branches/deactivate",
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

function reactivate() {
    $.ajax({
        type: "GET",
        url: "/system/branches/reactivate",
        data: {
            id: $("#id").val(),
        },
    })
        .done(function (data) {
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

    $(document).on("click", "#reactivate", function () {
        reactivate();
    });
});
