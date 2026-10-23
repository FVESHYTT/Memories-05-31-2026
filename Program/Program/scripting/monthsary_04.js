document.addEventListener("DOMContentLoaded", function () {

    const loveLetter = document.getElementById("loveLetterButton");

    if (loveLetter) {

        loveLetter.addEventListener("click", function () {

            loveLetter.classList.toggle("open");

        });

    }

});