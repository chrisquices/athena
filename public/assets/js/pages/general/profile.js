function loadProfile(id) {
    $.ajax({
        type: "GET",
        url: `${BASE_URL}/profile`,
        data: {
            id: id
        },
    }).done(function (data) {
        let today = new Date();

        let lastLogin = new Date(data.last_login);
        let diffTime1 = Math.abs(today - lastLogin);
        let diffDays1 = Math.ceil(diffTime1 / (1000 * 60 * 60 * 24)); 
        let messageSuffix1 = (diffDays1 > 1) ? 'días' : 'día'; 

        let createdAt = new Date(data.created_at);
        let diffTime2 = Math.abs(today - createdAt);
        let diffDays2 = Math.ceil(diffTime2 / (1000 * 60 * 60 * 24)); 
        let messageSuffix2 = (diffDays2 > 1) ? 'días' : 'día'; 

        $('#form')[0].reset();

        $('#name').val(data.name);
        $('#lastname').val(data.lastname);
        $('#email').val(data.email);
        $('#ci').val(data.ci);
        data.verified == 0
        ? $("#verified").val("No")
        : $("#verified").val("Sí");

        $('#failed_attempt').val(data.failed_attempt);
        $("#last_login").val(`${new Date(data.last_login).toDateString()} (Hace ${diffDays1} ${messageSuffix1})`);
        $("#created_at").val(`${new Date(data.created_at).toDateString()} (${diffDays2} ${messageSuffix2})`);

        $("#profile-photo").attr("src", `/storage/users/${data.photo}?random=` + Math.random());
    }).fail(function (data) {
        fail();
    });
}

function loadPhoto(id) {
    $.ajax({
        type: "GET",
        url: `${BASE_URL}/profile`,
        data: {
            id: id
        },
    }).done(function (data) {
        $("#profile-photo").attr("src", `/storage/users/${data.photo}?random=` + Math.random());
        $("#topbar-profile-photo").attr("src", `/storage/users/${data.photo}?random=` + Math.random());
    }).fail(function (data) {
        fail();
    });
}

function update() {
    let formData = new FormData($("#form")[0]);
    hideErrorsMessages();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "POST",
        url: "/general/profile/update",
        data: formData,
        contentType: false,
        processData: false,
    })
        .done(function (data) {
            loadProfile($('#id').val());

            toastr.success("La operación ha sido exitosa!");
        })
        .fail(function (jqXhr, json, errorThrown) {
            fail(jqXhr.responseJSON.errors, [
                "name",
                "lastname",
                "email",
                "ci",
                "photo",
            ]);
        });
}

function updatePhoto() {
    let formData = new FormData($("#form-photo")[0]);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "POST",
        url: "/general/profile/update-photo",
        data: formData,
        contentType: false,
        processData: false,
    })
        .done(function (data) {
            loadPhoto($('#id').val());

            toastr.success("La operación ha sido exitosa!");
        })
        .fail(function (jqXhr, json, errorThrown) {
            fail(jqXhr.responseJSON.errors, [
                "photo",
            ]);
        });
}

$(document).ready(function () {
    loadProfile($('#id').val());

    $(document).on("click", "#save", function () {
        update();
    });

    $(document).on("submit", "#form-photo", function () {
        updatePhoto();
    });
});
