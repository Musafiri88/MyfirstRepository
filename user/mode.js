const mode_btn = document.querySelector(".mode_btn");
const btn_circle = document.querySelector(".btn_circle");
const body_bg = document.querySelector("body");
const mode_btn_title = document.querySelector(".mode_btn_title");

btn_circle.addEventListener('click', () => {
    body_bg.classList.toggle("body_bg");
    mode_btn.classList.toggle("mode_btn_display");
    mode_btn_title.textContent = "Mode Sombre"
    // event.stopPropagation();
});