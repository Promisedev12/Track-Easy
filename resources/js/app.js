import "./bootstrap";
const toogleButton = document.querySelector(".clBtn");

const dropDown = document.querySelector(".clContent");

toogleButton.addEventListener("click", () => {
    const dropDown = document.querySelector(".clContent");

    dropDown.classList.toggle("collapse");
});
