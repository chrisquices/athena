function loadTable() {
    $("#table-auxiliary").DataTable({
        destroy: true,
        responsive: true,
        language: SPANISH,
        ajax: {
            type: "GET",
            url: "/system/roles/getAllUsers",
            dataSrc: "",
        },
        columnDefs: [
            {
                title: "Nombre y Apellido",
                targets: 0,
            },
            {
                title: "C.I.",
                targets: 1,
            },
            {
                title: "Rol",
                targets: 2,
            },
        ],
        columns: [
            {
                data: null,
                render: function (data) {
                    return `${data.user.name} ${data.user.lastname}`;
                },
            },
            {
                data: "user.ci",
            },
            {
                data: null,
                render: function (data) {
                    return `
                            <select name="role_id" class="form-control-sm select2 role_id">
                                <option selected value="${data.role.id}"/>${data.role.name}</option>
                            </select>
                            `;
                },
            },
        ],
    });

    $("#table").DataTable({
        destroy: true,
        responsive: true,
        language: SPANISH,
        ajax: {
            type: "GET",
            url: "/system/roles/getAll",
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
        url: "/system/roles/getOne",
        data: {
            id: id,
        },
    })
        .done(function (data) {
            showButtons();
            hideDelete();

            $("#id").val(data.id);
            $("#name").val(data.name);
            $("#created_at").val(new Date(data.created_at).toDateString());
            $("#updated_at").val(new Date(data.updated_at).toDateString());
            $("#status").val(data.status);

            data.status == "Activo" ? hideReactivate() : "";
            data.status == "Inactivo" ? hideDeactivate() : "";
            data.status == "Inactivo" ? hideSave() : "";
        })
        .fail(function () {
            fail();
        });
}

function store() {
    $.ajax({
        type: "GET",
        url: "/system/roles/store",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
            loadSelectRole();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, ["name"]);
        });
}

function update() {
    $.ajax({
        type: "GET",
        url: "/system/roles/update",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
            loadSelectRole();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, ["name"]);
        });
}

function deactivate() {
    $.ajax({
        type: "GET",
        url: "/system/roles/deactivate",
        data: {
            id: $("#id").val(),
        },
    })
        .done(function () {
            success();
            loadSelectRole();
        })
        .fail(function () {
            fail();
        });
}

function reactivate() {
    $.ajax({
        type: "GET",
        url: "/system/roles/reactivate",
        data: {
            id: $("#id").val(),
        },
    })
        .done(function () {
            success();
            loadSelectRole();
        })
        .fail(function () {
            fail();
        });
}

$(document).ready(function () {
    loadTable();
    loadSelectRole();

    $(document).on("change", ".role_id", function () {
        let user_ci = $(this)
            .closest("tr")
            .find("td:nth-child(2)")
            .get(0).innerHTML;
        let role_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "/system/roles/assign",
            data: {
                role_id: role_id,
                ci: user_ci,
            },
        })
            .done(function () {
                loadTable();
                hideProgressBar();
                hideButtons();
                loadSelectRole();

                toastr.success("La operación ha sido exitosa!");
            })
            .fail(function () {
                fail();
            });
    });

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

    $(document).on("click", "#add-alt", function () {
        resetId();
        resetForm();
        hideErrorsMessages();
        hideHiddenInputs();
        hideButtons();
        showClose();
        showSave();
        toggleModal();
    });
});
