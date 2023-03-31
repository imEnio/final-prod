$(document).ready(function () {
    $('.avatar-img').on('click', function () {
        $('#avatar').click()
    })

    $('#avatar').on('change', function () {
        let file = $('#avatar')[0].files[0]
        let form = new FormData
        form.append('file', file)
        let id = $('.avatar-img').data('id')
        form.append('id', id)
        $.ajax({
            type: 'post',
            url: '/admin/profile/upload-avatar',
            data: form,
            contentType: false,
            processData: false,
            success: function (response) {
                $('.avatar').css('background-image', `url(${response})`)
                $('.avatar-img').css('background-image', `url(${response})`)

            },
        })
    })

})
