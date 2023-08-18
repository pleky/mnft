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
          everydropdown.addEventListener("hidden.bs.dropdown", function () {
            // after dropdown is hidden, then find all submenus
            this.querySelectorAll(".submenu").forEach(function (everysubmenu) {
              // hide every submenu as well
              everysubmenu.style.display = "none";
            });
          });
        });
  
      document.querySelectorAll(".dropdown-menu a").forEach(function (element) {
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
  
    const secondNavPanel = document.getElementById("second-nav-panel");
    const secondNavItems = document.querySelectorAll(".second-nav-item");
    const body = document.querySelector("body");
    secondNavItems.forEach((item) => {
      item.addEventListener("mouseenter", function () {
        secondNavPanel.style.visibility = "visible";
      });
    });
  
    body.addEventListener("click", function (e) {
      if (
        e.target.id !== "second-nav-panel" &&
        e.target.id !== "menu" &&
        e.target.id !== "second-nav-item"
      ) {
        secondNavPanel.style.visibility = "hidden";
      }
    });
  });