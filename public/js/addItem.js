function addEventListeners() {
    let categories = document.getElementById("categoryDropdown");
    console.log(categories);
    if(categories != null)
        categories.addEventListener("change", updateDetails);
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

addEventListeners();
