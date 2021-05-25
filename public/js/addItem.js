function addEventListeners() {
    let categories = document.getElementById("categoryDropdown");
    let addItemButton = document.getElementById("addItemButton");
    if (categories != null)
        categories.addEventListener("change", updateDetails);
    if (addItemButton != null)
        addItemButton.addEventListener("click", addNewItem);


}

function updateTextBox(event) {
    let id = this.id.split("-")[1];
    let element = document.getElementById("detailFull" + id);
    element.value = this.value;
}

function updateDetails(event) {
    let selectedCategory = this.value;
    let detailDropdown = document.getElementById("productDetailsForms");

    let url = "/category/" + selectedCategory + "/details";
    sendAjaxRequest("GET", url, null, function () {
        console.log(this.responseText);

        if (this.status === 200) {
            let parser = new DOMParser();
            let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
            detailDropdown.replaceWith(add);
            addDropdownListeners();
        }
    });

}

function addDropdownListeners(){
    let counter = 0;
    let finished = false;
    while (!finished) {
        let element = document.getElementById("detail-" + counter);
        if (element == null) {
            finished = true;
        }
        else {
            element.addEventListener("change", updateTextBox);
        }
        counter++;
    }
}

function addNewItem(event) {
    event.preventDefault();

    let url = "/management/addItem";


    let name = document.getElementById("productName").value;
    let price = document.getElementById("inputPrice").value;
    let stock = document.getElementById("inputStock").value;
    let category = document.getElementById("categoryDropdown").value;
    let images = document.getElementById("formFileMultiple").files;
    let shortDescription = document.getElementById("productShortDescription").value;
    let description = document.getElementById("productDescription").value;
    let details = {};
    let finished = false;
    let counter = 0;

    let formData = new FormData();
    for (var i = 0; i < images.length; i++) {
        var file = images[i];
        formData.append("images[]", file, file.name);
    }

    while (!finished) {
        let element = document.getElementById("detailForm" + counter);
        if (element == null) {
            finished = true;
        }
        else {
            let detailName = element.getElementsByClassName("form-label")[0].id;
            let detailValue = document.getElementById("detailFull" + counter).value;
            details[detailName] = detailValue;
        }
        counter++;
    }


    // let data = {"name":name, "price":price,"category":category, "images":images, "shortDescription":shortDescription, "description":description, "details":JSON.stringify(details)};
    formData.append("name", name);
    formData.append("price", price);
    formData.append("stock", stock);
    formData.append("category", category);
    formData.append("shortDescription", shortDescription);
    formData.append("description", description);
    formData.append("details", JSON.stringify(details));

    for (var pair of formData.entries())
        console.log(pair[0] + ', ' + pair[1]);

    sendFileAjaxRequest('POST', url, formData, function () {
        console.log(this.response);
        if (this.status === 200) {
            window.location.replace('/item/' + this.response);
        }
        else if (this.status === 400) {
            alert('Invalid file. Max size: 10kb. Supported extensions: jpeg,jpg,png,gif');
        }
    }
    );
}


addEventListeners();
