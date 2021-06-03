function addEventListeners() {
    let categories = document.getElementById("categoryDropdown");
    let addItemButton = document.getElementById("addItemButton");
    let imageForm = document.getElementById("formFileMultiple");
    if (categories != null)
        categories.addEventListener("change", updateDetails);
    if (addItemButton != null)
        addItemButton.addEventListener("click", addNewItem);
    if(imageForm != null)
        imageForm.addEventListener("change",imagePreview);


}

function imagePreview(event){
    let carousel = document.getElementById("carouselAddItemImages");
    let images = document.getElementById("formFileMultiple").files;

    let add = '';
    for(let i = 0; i<images.length;i++){
        if(i == 0)
            add += '<button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>'
        else
            add += '<button type="button" data-bs-target="#carouselProductImages" data-bs-slide-to='+i+' aria-label="Slide'+(i+1)+'"></button>';
    }

    let add2 = '';
    for(let i = 0; i<images.length; i++){
        if(i==0)
            add2 += '<div class="carousel-item active text-center">';
        else
            add2 += '<div class="carousel-item text-center"> ';
        add2 += '<img src="'+URL.createObjectURL(images[i])+'" class="card-img-top  mx-auto" alt="'+images[i].name+'" style="max-height:40vh;height:auto;width:auto;max-width:80%;display:block;">';
        add2 += '</div>';
    }
    
    let str = `<section id="carousel-indicators">
                <div class="carousel-indicators">`+add+
                `</div>
                <div class="carousel-inner d-flex align-items-center" style="width:100%; height:40vh">`+add2+
                `</div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselAddItemImages" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselAddItemImages" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </section>` ;

    let parser = new DOMParser();
    let newHTML = parser.parseFromString(str, 'text/html').body.firstChild;

    let carousel_indicator = document.getElementById("carousel-indicators");
    if( carousel_indicator == null)
        carousel.appendChild(newHTML);
    else
        carousel_indicator.replaceWith(newHTML);
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
