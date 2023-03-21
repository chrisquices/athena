function loadTable() {
    $("#table").DataTable({
        destroy: true,
        responsive: true,
        language: SPANISH,
        ajax: {
            type: "GET",
            url: "/system/users/getAll",
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
                title: "Número de C.I.",
                targets: 1,
            },
            {
                title: "Correo electrónico",
                targets: 2,
            },
            {
                title: "Verificado",
                targets: 3,
            },
            {
                title: "Intentos Fallidos",
                targets: 4,
            },
            {
                title: "Estado",
                targets: 5,
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
                data: "ci",
            },
            {
                data: "email",
            },
            {
                data: null,
                render: function (data) {
                    if (data.verified) {
                        return "Sí";
                    } else {
                        return "No";
                    }
                },
            },
            {
                data: "failed_attempt",
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
    console.log(id);
    clickDetalle();

    $.ajax({
        type: "GET",
        url: "/system/users/getOne",
        data: {
            id: id,
        },
    })
        .done(function (data) {
            showButtons();

            $("#id").val(data.id);
            $("#name").val(data.name);
            $("#lastname").val(data.lastname);
            $("#ci").val(data.ci);
            $("#email").val(data.email);
            data.verified == 0
                ? $("#verified").val("No")
                : $("#verified").val("Sí");
            $("#failed_attempts").val(data.failed_attempt);
            $("#created_at").val(new Date(data.created_at).toDateString());
            $("#updated_at").val(new Date(data.updated_at).toDateString());
            $("#status").val(data.status);

            data.status == "Activo" ? hideReactivate() : "";
            data.status == "Inactivo" ? hideDeactivate() : "";
            data.status == "Inactivo" ? hideSave() : "";
            data.verified == 0 ? hideResetVerified() : "";
            data.failed_attempt == 0 ? hideResetAttempts() : "";
        })
        .fail(function () {
            fail();
        });
}

function store() {
    $.ajax({
        type: "GET",
        url: "/system/users/store",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
        })
        .fail(function (jqXhr) {
            console.log(jqXhr.responseJSON.errors);
            fail(jqXhr.responseJSON.errors, [
                "name",
                "lastname",
                "ci",
                "email",
                "password",
            ]);
        });
}

function update() {
    $.ajax({
        type: "GET",
        url: "/system/users/update",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                "name",
                "lastname",
                "ci",
                "email",
                "password",
            ]);
        });
}

function resetVerified() {
    $.ajax({
        type: "GET",
        url: "/system/users/reset-verified",
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

function resetAttempts() {
    $.ajax({
        type: "GET",
        url: "/system/users/reset-attempts",
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

function deactivate() {
    $.ajax({
        type: "GET",
        url: "/system/users/deactivate",
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
        url: "/system/users/reactivate",
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

    $(document).on("click", "#reactivate", function () {
        reactivate();
    });

    $(document).on("click", "#reset-verified", function () {
        resetVerified();
    });

    $(document).on("click", "#reset-attempts", function () {
        resetAttempts();
    });

    $(document).on("click", "#delete", function () {
        destroy();
    });
});
