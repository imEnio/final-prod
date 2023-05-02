let themes = localStorage.getItem('theme')
if (themes === 'light') {
    document.documentElement.setAttribute('theme', 'light')
} else {
    document.documentElement.removeAttribute('theme')
}
$(document).ready(function () {
    function date_time() {
        let today = new Date()
        let date = today.getDate()
        let month = today.getMonth() + 1
        let hours = today.getHours()
        let minutes = today.getMinutes()
        let seconds = today.getSeconds()

        let day = ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб']

        if (month <= 9) month = "0" + month

        if (hours <= 9) hours = "0" + hours
        if (minutes <= 9) minutes = "0" + minutes
        if (seconds <= 9) seconds = "0" + seconds

        $('#today').html(day[today.getDay()] + " " + date + "." + month + "." + today.getFullYear() + " " + hours + ":" + minutes + ":" + seconds)
    }

    setInterval(date_time, 1000);

    $('.db-Table').DataTable({
        scrollX: true,
        columnDefs: [{
            orderable: false,
            className: 'select-checkbox',
            targets: 0
        }],
        select: {
            style: 'multi',
            selector: 'td:first-child'
        },
        order: [[1, 'asc']]
    });

    $(".theme-switcher").on("click", function () {
        if (document.documentElement.hasAttribute('theme')) {
            document.documentElement.removeAttribute('theme')
            localStorage.removeItem('theme')
        } else {
            document.documentElement.setAttribute('theme', 'light')
            localStorage.setItem('theme', 'light')
        }
    })

    $("#send-msg").on("click", function () {
        let message = $("#message").val()
        $.ajax({
            type: "post",
            url: "/admin/send-message",
            data: {
                message: message,
            },
            success: function (response) {
                //     $(".msg-box").append().scrollTop(9999);
            },
            error: function (response) {

            }
        })
    })
    Echo.channel('chat').listen('.send.message', (e) => {
        $(".msg-box").html(e.message)
    });
    $(".msg-box").scrollTop(9999);

    $(".chat-clear-btn").on("click", function () {
        $.ajax({
            type: "post",
            url: "/admin/dashboard/chat-clear",

            success: function (result) {
                // $(".msg-box").reload()
            }
        })
    })

    $('.msg-box').on('scroll', function () {
        if ($(this).scrollTop() === 0) {
            let countChild = $(".msg-box").find(".msg-text-box").length
            let page = countChild/20+1
            console.log(page)
            $.ajax({
                type: "get",
                url: "/admin/messages?page="+page,

                success: function (response){
                    for (let i in response){
                        let divBox = document.createElement("div")
                        let spanImg = document.createElement("span")
                        let img = document.createElement('img')

                        img.src=(response[i].user.avatar)? "https://pworld/storage/"+ response[i].user.avatar: "/assets/debug/img/testava.png"
                        img.alt = "404 Not Found"
                        img.classList.add("avatar-img")
                        spanImg.classList.add("circle-image")
                        spanImg.classList.add("chat-avatar")
                        spanImg.appendChild(img)

                        let divBlock = document.createElement("div")
                        divBlock.className = "msg-text-block"

                        let spanFrom = document.createElement("span")
                        spanFrom.className = "msg-from"
                        spanFrom.textContent = "От: "+response[i].user.name

                        let spanText = document.createElement("span")
                        spanText.className = "msg-text"
                        spanText.textContent = response[i].message

                        divBlock.appendChild(spanFrom)
                        divBlock.appendChild(spanText)

                        divBox.className = "msg-text-box"
                        divBox.appendChild(spanImg)
                        divBox.appendChild(divBlock)

                        $(".msg-box").prepend(divBox)
                    }
                    console.log($(response[0]).scrollTop)
                    $(response[0]).scrollTop
                    // scrollTo(0, response[0])
                    // response[0].scrollTo()
                }
            })
        }
    })
})
