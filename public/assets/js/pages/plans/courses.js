function loadTable() {
    $("#table").DataTable({
        destroy: true,
        responsive: true,
        language: SPANISH,
        ajax: {
            type: "GET",
            url: "/plans/courses/getAll",
            dataSrc: "",
        },
        dom: TABLE_DOM,
        drawCallback: TABLE_DRAW_CALLBACK,
        createdRow: TABLE_CREATED_ROW,
        columnDefs: [
            {
                "title": "Nivel",
                "targets": 0
            },
            {
                "title": "Bachillerato",
                "targets": 1
            },
            {
                "title": "Grado",
                "targets": 2
            },
            {
                "title": "Sección",
                "targets": 3
            },
            {
                "title": "Turno",
                "targets": 4
            },
            {
                "title": "Estado",
                "targets": 5
            },
        ],
        columns: [
            {
                "data": "grade.level"
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    if (data.baccalaureate_id) {
                        return data.baccalaureate.name;
                    } else {
                        return '-';
                    }
                },
            },
            {
                "data": "grade.name"
            },
            {
                "data": "section.name"
            },
            {
                "data": "shift"
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
        url: "/plans/courses/getOne",
        data: {
            id: id,
        },
    })
        .done(function (data) {
            showButtons();

            $("#id").val(data.id);
            $("#grade_id")
                .val(`${data.grade_id}|${data.grade.has_baccalaureate}`)
                .change();
            $("#baccalaureate_id").val(data.baccalaureate_id).change();
            $("#grade").val(data.grade);
            $("#section_id").val(data.section_id).change();
            $("#shift").val(data.shift).change();
            $("#start_date").val(data.start_date.replace(/\//g, "-"));
            $("#end_date").val(data.end_date.replace(/\//g, "-"));
            $("#tuition_fee").val(data.tuition_fee);
            $("#installment_fee").val(data.installment_fee);
            $("#installment_quantity").val(data.installment_quantity);
            $("#status").val(data.status);
            $("#created_at").val(new Date(data.created_at).toDateString());
            $("#updated_at").val(new Date(data.updated_at).toDateString());

            if (data.status == "Anulado") {
                hideSave();
                hideAnull();
                disableInputs();
            }
        })
        .fail(function () {
            fail();
        });
}

function store() {
    $.ajax({
        type: "GET",
        url: "/plans/courses/store",
        data: $("#form").serialize(),
    })
        .done(function (data) {
            success();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                "grade_id",
                "baccalaureate_id",
                "section_id",
                "shift",
                "start_date",
                "end_date",
                "tuition_fee",
                "requirement_id",
                "installment_fee",
                "installment_quantity",
            ]);
        });
}

function update() {
    $.ajax({
        type: "GET",
        url: "/plans/courses/update",
        data: $("#form").serialize(),
    })
        .done(function () {
            success();
        })
        .fail(function (jqXhr) {
            fail(jqXhr.responseJSON.errors, [
                "grade_id",
                "baccalaureate_id",
                "section_id",
                "shift",
                "start_date",
                "end_date",
                "tuition_fee",
                "requirement_id",
                "installment_fee",
                "installment_quantity",
            ]);
        });
}

function anull() {
    $.ajax({
        type: "GET",
        url: "/plans/courses/anull",
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
    loadSelectGrade();
    loadSelectSection();
    loadSelectBaccalaureate();
    loadSelectRequirement();

    $("#container_baccalaureate").hide();

    $(document).on("change", "#grade_id", function () {
        let grade = $("#grade_id").val();

        if (grade) {
            let baccalaureateExist = grade.split("|").pop();

            if (baccalaureateExist == 1) {
                $("#container_baccalaureate").show(300);
            } else {
                $("#container_baccalaureate").hide(300);
                $("#baccalaureate_id").val("").change();
            }
        }
    });

    $(document).on("click", ".detalle", function () {
        $("#container_baccalaureate_id").show();

        show($(this).attr("data-id"));
    });

    $(document).on("click", "#save", function () {
        action = $("#id").val() ? update() : store();
    });

    $(document).on("click", "#anull", function () {
        anull();
    });
});
