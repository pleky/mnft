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
    
    let arry = [];
    const body = document.querySelector("body");
    const secondNavPanel = document.querySelectorAll(".second-nav-panel");
    const secondNavPanelOnView = document.querySelectorAll(".second-nav-panel-on-view");
    const secondNavItems = document.querySelectorAll(".second-nav-item");
    
    secondNavItems.forEach((item) => {
      item.addEventListener("mouseenter", function () {
        const getValue = this.getAttribute("data-target");
        arry.push(getValue);
        const zindex = arry.lastIndexOf(getValue);
        
        document.getElementById(getValue).style.visibility = "visible";
        document.getElementById(getValue).style.zIndex = zindex+1;
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
          arry = [];
        }
      });
    });

    const list = document.getElementById("list");
    const listChildren = list?.children;

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

    const listOnView = document.getElementById("list-on-view");
    const listChildrenOnView = listOnView?.children;

    if (listChildrenOnView.length) {
      for (let i = 0; i < listChildrenOnView.length; i++) {
        // save the id to the localstorage
        listChildrenOnView[i].addEventListener("click", function () {
          // get the data target of element
          const getValue = this.getAttribute("data-target");

          // show the element that has the same id with the data target
          document.getElementById(getValue).classList.remove("d-none");

          // hide the other element
          for (let j = 0; j < listChildrenOnView.length; j++) {
            if (listChildrenOnView[j].getAttribute("data-target") !== getValue) {
              document
                .getElementById(listChildrenOnView[j].getAttribute("data-target"))
                .classList.add("d-none");
            }
          }
        });
      }
    }
  });