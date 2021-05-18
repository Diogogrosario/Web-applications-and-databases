function addEventListeners() {
    let categories = document.getElementById("categoryDropdown");
    let addItemButton = document.getElementById("addItemButton");
    if(categories != null)
        categories.addEventListener("change", updateDetails);
    if(addItemButton != null)
        addItemButton.addEventListener("click",addNewItem);
}

function updateDetails(event){
    let selectedCategory = this.value;
    let detailDropdown = document.getElementById("productDetailsForms");
    
    let url = "/category/" + selectedCategory +"/details";
    sendAjaxRequest("GET", url, null, function() {
        console.log(this.responseText);

        if (this.status === 200) {
            let parser = new DOMParser();
            let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
            detailDropdown.replaceWith(add);
        }
    });

}

function addNewItem(event){
    event.preventDefault();

    let url = "/management/addItem";


    let name = document.getElementById("productName").value;
    let price = document.getElementById("inputPrice").value;
    let category = document.getElementById("categoryDropdown").value;
    let image = document.getElementById("formFileMultiple").value;
    let shortDescription = document.getElementById("productShortDescription").value;
    let description = document.getElementById("productDescription").value;
    let details = {};
    let finished = false;
    let counter = 0;
    while(!finished){
        let element = document.getElementById("detailForm"+counter);
        if(element == null){
            finished=true;
        }
        else{
            let detailName = element.getElementsByClassName("form-label")[0].id;
            let detailValue = document.getElementById("detailFull"+counter).value;
            details[detailName] = detailValue;
        }
        counter++;
    }

    console.log("name " + name);
    console.log("price " + price);
    console.log("category " + category);
    console.log("image " + image);
    console.log("shortDescription " + shortDescription);
    console.log("description " + description);
    console.log(details);


    let data = {"name":name, "price":price,"category":category, "image":image, "shortDescription":shortDescription, "description":description, "details":JSON.stringify(details)};

    sendAjaxRequest('POST', url, data, function () {
        console.log(this.response);
        if (this.status === 200) {
            window.location.replace('/item/'+this.response);
        }});
}


addEventListeners();
