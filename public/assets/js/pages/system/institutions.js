function loadInstitution() {
    $.ajax({
        type: "GET",
        url: `${BASE_URL}/institutions`,
        data: {
            id: 1
        },
    }).done(function (data) {
        $('#form')[0].reset();
        $('#id').val(data.id);
        $('#name').val(data.name);
        $('#name_administration').val(data.name_administration);
        $('#slogan').val(data.slogan);
        $('#founder').val(data.founder);
        $('#foundation_date').val(data.foundation_date);
        $('#telephone_primary').val(data.telephone_primary);
        $('#telephone_secondary').val(data.telephone_secondary);
        $('#facebook').val(data.facebook);
        $('#instagram').val(data.instagram);
        $('#twitter').val(data.instagram);
        $('#about_us').val(data.about_us);
        $("#institution-emblem").attr("src", `/storage/emblem/${data.emblem}?random=` + Math.random());

        $("#topbar-institution-emblem").attr("src", `/storage/emblem/${data.emblem}?random=` + Math.random());
        $("#topbar-institution-emblem2").attr("src", `/storage/emblem/${data.emblem}?random=` + Math.random());
    }).fail(function (data) {
        fail();
    });
}

function update() {
    let formData = new FormData($("#form")[0]);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "POST",
        url: "/system/institutions/update",
        data: formData,
        contentType: false,
        processData: false,
    })
        .done(function (data) {
            loadInstitution();
            hideErrorsMessages();

            toastr.success("La operación ha sido exitosa!");
        })
        .fail(function (jqXhr, json, errorThrown) {
            fail(jqXhr.responseJSON.errors, [
                "name",
                "name_administration",
                "slogan",
                "founder",
                "foundation_date",
                "emblem",
                "facebook",
                "twitter",
                "instagram",
                "telephone_primary",
                "telephone_secondary",
                "about_us",
            ]);
        });
}

function updateEmblem() {
    let formData = new FormData($("#form-emblem")[0]);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "POST",
        url: "/system/institutions/update-emblem",
        data: formData,
        contentType: false,
        processData: false,
    })
        .done(function (data) {
            loadEmblem();

            toastr.success("La operación ha sido exitosa!");
        })
        .fail(function (jqXhr, json, errorThrown) {
            fail(jqXhr.responseJSON.errors, [
                "emblem",
            ]);
        });
}

function loadEmblem() {
    $.ajax({
        type: "GET",
        url: `${BASE_URL}/institutions`,
        data: {
            id: 1
        },
    }).done(function (data) {
        $("#institution-emblem").attr("src", `/storage/emblem/${data.emblem}?random=` + Math.random());
        $("#topbar-institution-emblem").attr("src", `/storage/emblem/${data.emblem}?random=` + Math.random());
        $("#topbar-institution-emblem2").attr("src", `/storage/emblem/${data.emblem}?random=` + Math.random());
    }).fail(function (data) {
        fail();
    });
}

$(document).ready(function () {
    loadInstitution();

    $(document).on("click", "#save", function () {
        update();
    });

    $(document).on("submit", "#form-emblem", function () {
        updateEmblem();
    });
});
