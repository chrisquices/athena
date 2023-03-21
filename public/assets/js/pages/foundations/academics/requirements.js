function loadTable() {
    $("#table").DataTable({
        destroy: true,
        responsive: true,
        language: SPANISH,
        ajax: {
            type: "GET",
            url: "/foundations/academics/requirements/getAll",
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
                title: "Estado",
                targets: 1,
            },
        ],
        columns: [
            {
                data: "name",
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
        url: "/foundations/academics/requirements/getOne",
        data: {
            id: id,
        },
    })
        .done(function (data) {
            showButtons();

            $("#id").val(data.id);
            $("#name").val(data.name);
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
        url: "/foundations/academics/requirements/store",
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
        url: "/foundations/academics/requirements/update",
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
        url: "/foundations/academics/requirements/destroy",
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
