import "bootstrap";
import "animate.css";
import "./admin/contents";

document.addEventListener("DOMContentLoaded", function () {
    // make it as accordion for smaller screens
    if (window.innerWidth < 992) {
        // close all inner dropdowns when parent is closed
        document
            .querySelectorAll(".navbar .dropdown")
            .forEach(function (everydropdown) {
                everydropdown.addEventListener(
                    "hidden.bs.dropdown",
                    function () {
                        // after dropdown is hidden, then find all submenus
                        this.querySelectorAll(".submenu").forEach(function (
                            everysubmenu
                        ) {
                            // hide every submenu as well
                            everysubmenu.style.display = "none";
                        });
                    }
                );
            });

        document
            .querySelectorAll(".dropdown-menu a")
            .forEach(function (element) {
                element.addEventListener("click", function (e) {
                    let nextEl = this.nextElementSibling;
                    if (nextEl && nextEl.classList.contains("submenu")) {
                        // prevent opening link if link needs to open dropdown
                        e.preventDefault();
                        if (nextEl.style.display == "block") {
                            nextEl.style.display = "none";
                        } else {
                            nextEl.style.display = "block";
                        }
                    }
                });
            });
    }
    // end if innerWidth

    let anchorE = document.getElementsByTagName("a");
    let arrayOfAnchorE = Array.from(anchorE);
    let getAnchorEContact = arrayOfAnchorE.filter((element) =>
        element.href.includes("contact")
    );
    let contactEl = document.getElementById("contact-us");

    getAnchorEContact.forEach(function (element) {
        element.addEventListener("click", function (e) {
            e.preventDefault();

            const y =
                contactEl.getBoundingClientRect().top + window.scrollY - 100;
            window.scroll({
                top: y,
                behavior: "smooth",
            });
        });
    });
    // for (let i in anchorE) {
    //     console.log(i.);
    // }
});
