const removeElement = (e) => {
    const galleryContainer = document.getElementById("galleryContainer");
    if (confirm("are you sure want to remove this element ?")) {
        galleryContainer.removeChild(e);
    }
};
const addGallery = () => {
    const galleryContainer = document.getElementById("galleryContainer");

    let fieldset = document.createElement("fieldset");
    let inputText = document.createElement("input");
    let inputFile = document.createElement("input");
    let legend = document.createElement("legend");
    let textNode = document.createTextNode("Gallery");
    let formGroupText = document.createElement("div");
    let formGroupImage = document.createElement("div");
    let labelText = document.createElement("label");
    let labelTextNode = document.createTextNode("Title");
    let labelImage = document.createElement("label");
    let labelImageNode = document.createTextNode("Image");
    let buttonRemove = document.createElement("button");

    fieldset.setAttribute("class", "form-group border p-3");

    legend.setAttribute("class", "w-auto px-2");
    legend.innerHTML = "Gallery";

    buttonRemove.setAttribute("class", "btn btn-danger");
    buttonRemove.setAttribute("type", "button");
    buttonRemove.innerHTML = "Remove";
    buttonRemove.onclick = function () {
        removeElement(fieldset);
    };

    inputText.setAttribute("class", "form-control");
    inputText.setAttribute("id", "galleryTitle");
    labelText.setAttribute("for", "galleryTitle");
    formGroupText.setAttribute("class", "form-group");
    labelText.appendChild(labelTextNode);
    formGroupText.appendChild(labelText);
    formGroupText.appendChild(inputText);

    inputFile.type = "file";
    inputFile.setAttribute("class", "form-control");
    inputFile.setAttribute("id", "galleryImage");
    labelImage.setAttribute("for", "galleryImage");
    formGroupImage.setAttribute("class", "form-group");
    labelImage.appendChild(labelImageNode);
    formGroupImage.appendChild(labelImage);
    formGroupImage.appendChild(inputFile);

    fieldset.appendChild(legend);
    fieldset.appendChild(formGroupText);
    fieldset.appendChild(formGroupImage);
    fieldset.appendChild(buttonRemove);

    galleryContainer.appendChild(fieldset);
};

document.addEventListener("DOMContentLoaded", () => {
    const btnAddGallery = document.getElementById("btnAddGallery");
    btnAddGallery?.addEventListener("click", function () {
        addGallery();
    });
});
