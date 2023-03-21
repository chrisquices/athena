function show(id) {
    hideButtons();
    showProgressBar();
    toggleModal();

    $.ajax({
        type: "GET",
        url: "/system/notices/getOne",
        data: {
            id: id,
        },
    })
        .done(function (data) {
            console.log(data);
            $("#notice_title").text(data.title);
            $("#notice_content").text(data.content);
            $("#notice_created_at").text(new Date(data.created_at).toLocaleString());
        })
        .fail(function () {
            fail();
        });
}