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
  
    const secondNavPanel = document.querySelectorAll(".second-nav-panel");
    const secondNavItems = document.querySelectorAll(".second-nav-item");
    console.log(secondNavPanel);
    const body = document.querySelector("body");
    secondNavItems.forEach((item) => {
      item.addEventListener("mouseenter", function () {
        const getValue = this.getAttribute("data-target");
        console.log(getValue);
        document.getElementById(getValue).style.visibility = "visible";

        // secondNavPanel.forEach((item) => {
        //   if(document.getElementById("list") != getValue)
        //   item.style.visibility = "hidden";
        // });
      });
    });
  
    body.addEventListener("click", function (e) {
      secondNavPanel.forEach((item) => {
        if (
          e.target.id !== "second-nav-panel" &&
          e.target.id !== "menu" &&
          e.target.id !== "second-nav-item"
        ) {
          item.style.visibility = "hidden";
        }
      });
    });

    const list = document.getElementById("list");
    const listChildren = list?.children;

    console.log(listChildren);

    if (listChildren.length) {
      for (let i = 0; i < listChildren.length; i++) {
        // save the id to the localstorage
        listChildren[i].addEventListener("click", function () {
          // get the data target of element
          const getValue = this.getAttribute("data-target");

          // show the element that has the same id with the data target
          document.getElementById(getValue).classList.remove("d-none");

          // hide the other element
          for (let j = 0; j < listChildren.length; j++) {
            if (listChildren[j].getAttribute("data-target") !== getValue) {
              document
                .getElementById(listChildren[j].getAttribute("data-target"))
                .classList.add("d-none");
            }
          }
        });
      }
    }
  });