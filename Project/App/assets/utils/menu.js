document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".menu-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            const dropdown = btn.nextElementSibling;
            dropdown.classList.toggle("show");

            document.querySelectorAll(".dropdown").forEach(d => {
                if (d !== dropdown) d.classList.remove("show");
            });
        });
    });

    document.addEventListener("click", e => {
        if (!e.target.closest(".action-menu")) {
            document.querySelectorAll(".dropdown").forEach(d => d.classList.remove("show"));
        }
    });
});
