document.addEventListener("DOMContentLoaded", () => {
    const themeSwitch = document.getElementById("themeSwitch");
    const modeText = document.getElementById("modeText");
    const sidebar = document.getElementById("sidebar");
    const menuToggle = document.getElementById("menu-toggle");
    const menuClose = document.querySelector(".menu-close");
    // Check if dark mode is enabled in localStorage
    if (localStorage.getItem("dark-mode") === "enabled") {
        document.body.classList.add("dark-mode");
        modeText.textContent = "Dark Mode";
        themeSwitch.checked = true;
    }

    // Toggle dark/light mode
    themeSwitch.addEventListener("change", () => {
        if (themeSwitch.checked) {
            document.body.classList.add("dark-mode");
            modeText.textContent = "Dark Mode";
            localStorage.setItem("dark-mode", "enabled");
        } else {
            document.body.classList.remove("dark-mode");
            modeText.textContent = "Light Mode";
            localStorage.setItem("dark-mode", "disabled");
        }
    });

    // Toggle sidebar visibility
    menuToggle.addEventListener("click", () => {
        sidebar.classList.toggle("show");
    });
    menuClose.addEventListener("click", () => {
        sidebar.classList.toggle("show");
    });
});
