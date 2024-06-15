document.addEventListener("DOMContentLoaded", function() {
    var sidebarLinks = document.querySelectorAll(".a");

    sidebarLinks.forEach(function(link) {
        link.addEventListener("click", function(e) {
            e.preventDefault();
            var dropdown = this.nextElementSibling;
            var dropdownIcon = this.querySelector(".fa-user-group");

            dropdown.classList.toggle("collapse");
            dropdownIcon.classList.toggle("collapsed");
        });
    });
});