var priceRangeList;
function addPriceFilterEventListeners() {
    priceRangeList = document.querySelector('#priceButtons');
    let priceRangeButtons = priceRangeList.querySelectorAll('li');
    for(let priceRangeCheckbox of priceRangeButtons)
    {
        priceRangeCheckbox.addEventListener("change", seeNotification);
    }
    /*let notificationButtons = document.querySelectorAll('.deleteNotificationButton');
    console.log(notificationButtons);
    for(let notificationButton of notificationButtons)
    {
        console.log(notificationButton.getAttribute("data-id"));
        notificationButton.addEventListener("click", seeNotification);
    }*/
}

function seeNotification(event) {
    
    let url = "searchResultsAjax";


    let category = findGetParameter("category");
    let search = findGetParameter("search");

    let selectedPriceRangeItems = priceRangeList.children;


    let priceRangeValues = [];

    for(let i = 0; i < selectedPriceRangeItems.length; i++){
        if(selectedPriceRangeItems[i].querySelector("input:checked") != null){
            let sameValue = false;
            if(priceRangeValues.length > 0){
                if(priceRangeValues[priceRangeValues.length - 1] == selectedPriceRangeItems[i].querySelector("input:checked").value.split("-")[0]){
                    priceRangeValues.pop();
                    priceRangeValues.push(selectedPriceRangeItems[i].querySelector("input:checked").value.split("-")[1]);
                    sameValue = true;
                }
            }
            if(!sameValue){
                priceRangeValues.push(selectedPriceRangeItems[i].querySelector("input:checked").value.split("-")[0]);
                priceRangeValues.push(selectedPriceRangeItems[i].querySelector("input:checked").value.split("-")[1]);
            }
            
        }
    }


    let data = {"priceRanges": priceRangeValues, "category": category, "search": search};


    sendAjaxRequest('POST', url, data, function () {
        if (this.status === 200) {
            let searchPage = document.querySelector("#searchPage");
            
            let parser = new DOMParser();
	        let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
            searchPage.replaceWith(add);
            
            
    }});
    
    

    //event.preventDefault();
    /*let notificationId = this.getAttribute("data-id");

    let button = this;
    
    let url = "/notification/" + notificationId;

    let data = null;

    sendAjaxRequest('PATCH', url, data, function () {
        console.log(this.response);
        if (this.status === 200) {
            // console.log(jsonData);
            button.closest("li").remove();
        }});*/
}

//https://stackoverflow.com/questions/5448545/how-to-retrieve-get-parameters-from-javascript
function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    var items = location.search.substr(1).split("&");
    for (var index = 0; index < items.length; index++) {
        tmp = items[index].split("=");
        if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
    }
    return result;
}

addPriceFilterEventListeners();
