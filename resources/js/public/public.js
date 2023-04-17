$(document).ready(function () {
    $("#submit").on("click", function () {
        let login = $("#login").val()
        let password = $("#password").val()
        let remember = $("#remember").prop("checked")
        $.ajax({
            type: "post",
            url: "/login",
            data: {
                login: login,
                password: password,
                remember: remember,
            },
            success: function (response) {
                window.location.href = response
            },
            error: function (response) {
                $(".alert").text(response.responseJSON.message)

                $('.auth-content').css({"height": "300px"});

                let alertAnim = $('.password-alert');
                let animation = alertAnim.animate([
                    {opacity: 0},
                    {opacity: 1}
                ], 1000);
                animation.addEventListener('finish', function () {
                    alertAnim.style.transform = 'opacity: 1';
                });
            }
        })
    })

    $("#registration_btn").on("click", function () {
        let login = $("#login").val()
        let password = $("#password").val()
        let confirm_password = $("#confirm_password").val()
        $.ajax({
            type: "post",
            url: "/registration",
            data: {
                login: login,
                password: password,
                password_confirmation: confirm_password,
            },
            success: function (response) {
                window.location.href = '/'
            },
            error: function (response) {
                toastr.options.progressBar = true
                toastr.error(response.responseJSON.error)
            }
        })
    })

    $("#recovery_btn").on("click", function () {
        let email = $("#email").val()
        $.ajax({
            type: "post",
            url: "/recovery",
            data: {
                email: email,
            },
            success: function (response) {
                alert('Письмо отправлено!')
            },
            error: function (response) {
                console.log(response)
            }
        })
    })

    $("#reset_password").on("click", function () {
        let password = $("#password").val()
        let confirm_password = $("#confirm_password").val()
        let hash = $("#hash").val()
        $.ajax({
            type: "post",
            url: "/reset-password",
            data: {
                password: password,
                password_confirmation: confirm_password,
                hash: hash,
            },
            success: function (response) {
                window.location.href = '/login'
            },
            error: function (response) {
                $(".alert").text(response.responseJSON.message)

                $('.auth-content').css({"height": "300px"});

                let alertAnim = $('.password-alert');
                let animation = alertAnim.animate([
                    {opacity: 0},
                    {opacity: 1}
                ], 1000);
                animation.addEventListener('finish', function () {
                    alertAnim.style.transform = 'opacity: 1';
                });
            }
        })
    })
})
