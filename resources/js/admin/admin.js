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
        let month = today.getMonth()+1
        let hours = today.getHours()
        let minutes = today.getMinutes()
        let seconds = today.getSeconds()

        let day = ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб']

        if(month <= 9) month = "0" + month

        if(hours <= 9) hours = "0" + hours
        if(minutes <= 9) minutes = "0" + minutes
        if(seconds <= 9) seconds = "0" + seconds

        $('#today').html(day[today.getDay()]+ " " +date+"."+month+"."+today.getFullYear()+ " " +hours+ ":" +minutes+":"+seconds)
    }
    setInterval(date_time,1000);

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
})
