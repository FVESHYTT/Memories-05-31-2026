document.addEventListener("DOMContentLoaded", function () {

    /* ---------- click-to-enlarge photos ---------- */
    const box = document.createElement("div");
    box.className = "bg-lightbox";
    box.innerHTML = '<button type="button" aria-label="Close">×</button><img alt=""><p></p>';
    document.body.appendChild(box);

    const boxImg = box.querySelector("img");
    const boxCap = box.querySelector("p");

    function closeBox() { box.classList.remove("open"); }

    document.addEventListener("click", function (e) {
        const zoom = e.target.closest(".bg-zoom");
        if (!zoom) return;
        const img = zoom.querySelector("img");
        if (!img || img.style.display === "none") return;
        boxImg.src = img.currentSrc || img.src;
        boxImg.alt = img.alt;
        boxCap.textContent = zoom.dataset.cap || "";
        box.classList.add("open");
    });

    box.addEventListener("click", closeBox);
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") closeBox();
    });

    /* ---------- clickable love letter ---------- */
    const letter = document.getElementById("bgLetterButton");
    const hint = document.getElementById("bgLetterHint");

    if (letter) {
        letter.addEventListener("click", function () {
            const isOpen = letter.classList.toggle("open");
            letter.setAttribute("aria-expanded", isOpen);
            if (hint) {
                hint.textContent = isOpen ? "Close the letter ♡" : "Click the letter ♡";
            }
        });
    }

});
