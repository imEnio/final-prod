$(document).ready(function (){
    $("#theme-switch").on("click", function () {
        $('*').css({"transition": "1s"});
        function delTranstion(){
            $('*').css({"transition": "null"});
        }
        setTimeout(delTranstion, 1000)

        const switchBox = document.querySelector(".switch")

        document.querySelector("input").addEventListener("change", (e) => {
            const { checked } = e.target;
            if (checked) {
                switchBox.classList.add("move")
            } else {
                switchBox.classList.remove("move")
            }
        });
        if (document.documentElement.hasAttribute('theme')){
            document.documentElement.removeAttribute('theme')
        }
        else{
            document.documentElement.setAttribute('theme', 'light')
        }
     })
})
