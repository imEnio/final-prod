$(document).ready(function (){
    $('.auth-content').on('mousemove', (e) => {
        const x = e.pageX - e.target.offsetLeft
        const y = e.pageY - e.target.offsetTop

        e.target.style.setProperty('--x', `${ x }px`)
        e.target.style.setProperty('--y', `${ y }px`)
    })
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
                    { opacity: 0 },
                    { opacity: 1 }
                ], 1000);
                animation.addEventListener('finish', function (){
                    alertAnim.style.transform = 'opacity: 1';
                });
            }
        })
    })
})
