$('.async-button').on('click', function () {
    let status = $(this).val();
    let errorBlock = $('.error-block');
    let imageBlock = $('.generated-image');

    errorBlock.html('');
    imageBlock.attr('src', 'loading.gif');
    $.ajax({
        data: {Form: {status: status}},
        type: "POST",
        dataType: "JSON",
        url: '/image-reviewed'
    }).done(function (response) {
        switch (response) {
            case true:
                imageBlock.attr('src', '/get-image?t=' + Date.now());
                break;
            case false:
                errorBlock.append("<p>Something went wrong</p>");
                break;
            default:
                for (let key in response) {
                    errorBlock.append("<p>" + response[key] + "</p>")
                }
        }
    });
});