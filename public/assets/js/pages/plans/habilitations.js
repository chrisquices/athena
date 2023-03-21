function loadTableEmpty() {
    $("#table").DataTable({
        language: SPANISH,
        dom: TABLE_DOM,
        drawCallback: TABLE_DRAW_CALLBACK,
        createdRow: TABLE_CREATED_ROW,
        columnDefs: [
            {
                title: "Asignatura",
                targets: 0,
            },
            {
                title: "Modalidad",
                targets: 1,
            },
            {
                title: "Horas Semanales",
                targets: 2,
            },
            {
                title: "Promedio Requeridos",
                targets: 3,
            },
            {
                title: "Estado",
                targets: 4,
            },
        ],
    });
}

function loadTable(id) {
    $("#table").DataTable({
        destroy: true,
        responsive: true,
        language: SPANISH,
        ajax: {
            type: "GET",
            url: "/plans/habilitations/getAll",
            data: {
                id: id,
            },
            dataSrc: "",
        },
        dom: TABLE_DOM,
        drawCallback: TABLE_DRAW_CALLBACK,
        createdRow: TABLE_CREATED_ROW,
        columnDefs: [
            {
                title: "Asignatura",
                targets: 0,
            },
            {
                title: "Modalidad",
                targets: 1,
            },
            {
                title: "Horas Semanales",
                targets: 2,
            },
            {
                title: "Promedio Requeridos",
                targets: 3,
            },
            {
                title: "Estado",
                targets: 4,
            },
        ],
        columns: [
            {
                data: "subject.name",
            },
            {
                data: "modality",
            },
            {
                data: "hour_weekly",
            },
            {
                data: "average_required",
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
        url: "/plans/habilitations/getOne",
        data: {
            id: id,
        },
    })
        .done(function (data) {
            showButtons();

            $("#id").val(data.id);
            $("#course_id").val(data.course_id).change();
            $("#modality").val(data.modality).change();
            $("#required").val(data.required).change();
            $("#hour_weekly").val(data.hour_weekly);
            $("#average_required").val(data.average_required);
            $("#status").val(data.status);
            $("#created_at").val(new Date(data.created_at).toDateString());
            $("#updated_at").val(new Date(data.updated_at).toDateString());

            data.status == "Anulado" ? hideAnull() : "";
            data.status == "Anulado" ? hideSave() : "";
        })
        .fail(function () {
            fail();
        });
}

function store() {
    $.ajax({
        type: "GET",
        url: "/plans/habilitations/store",
        data: $("#form").serialize(),
    })
        .done(function (data) {
            success();
            loadTable($(".course_id:first").val());

        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                "course_id",
                "subject_id",
                "modality",
                "required",
                "hour_weekly",
                "average_required",
            ]);
        });
}

function update() {
    $.ajax({
        type: "GET",
        url: "/plans/habilitations/update",
        data: $("#form").serialize(),
    })
        .done(function () {
            loadTable($(".course_id:first").val());
            toggleModal();
            hideModal();
            hideProgressBar();
            hideButtons();
            resetSelects();

            toastr.success("La operación ha sido exitosa!");
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                "course_id",
                "subject_id",
                "modality",
                "required",
                "hour_weekly",
                "average_required",
            ]);
        });
}

function anull() {
    $.ajax({
        type: "GET",
        url: "/plans/habilitations/anull",
        data: {
            id: $("#id").val(),
        },
    })
        .done(function () {
            loadTable($(".course_id:first").val());
            toggleModal();
            hideModal();
            hideProgressBar();
            hideButtons();
            resetSelects();

            toastr.success("La operación ha sido exitosa!");
        })
        .fail(function () {
            fail();
        });
}

function loadSelectSubject(id) {
    $.ajax({
        type: "GET",
        url: `/plans/habilitations/getAllSubjects`,
        data: {
            id: id,
        },
    })
        .done(function (data) {
            $("#subject_id").empty();

            $.each(data, function (key, subject) {
                $("#subject_id").append(
                    `<option value='${subject.id}'>${subject.name}</option>`
                );
            });
        })
        .fail(function () {
            // fail();
        });
}

$(document).ready(function () {
    loadTableEmpty();
    loadSelectCourse();

    $("#container_subject_id").hide();

    $(document).on("click", ".detalle", function () {
        $("#container_subject_id").show();

        show($(this).attr("data-id"));
    });

    $(document).on("click", "#save", function () {
        action = $("#id").val() ? update() : store();
    });

    $(document).on("click", "#anull", function () {
        anull();
    });

    $(document).on("change", ".course_id", function () {
        loadTable($(this).val());
    });

    $(document).on("change", "#course_id", function () {
        $("#subject_id").empty();

        if ($("#course_id").val()) {
            loadSelectSubject($(this).val());

            if (!$("#id").val()) {
                $("#container_subject_id").show(300);
            }
        }
    });
});
