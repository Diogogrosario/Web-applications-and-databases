var priceRangeList;
var starList;
var categoryList;
function addPriceFilterEventListeners() {
    priceRangeList = document.querySelector('#priceButtons');
    let priceRangeButtons = priceRangeList.querySelectorAll('li');
    for(let priceRangeCheckbox of priceRangeButtons)
    {
        priceRangeCheckbox.addEventListener("change", filterItems);
    }
}

function addStarFilterEventListeners() {
    starList = document.querySelector('#starButtons');
    let priceRangeButtons = starList.querySelectorAll('li');
    for(let priceRangeCheckbox of priceRangeButtons)
    {
        priceRangeCheckbox.addEventListener("change", filterItems);
    }
}

function addCategoryFilterEventListeners() {
    categoryList = document.querySelector('#categoryButtons');
    let catRangeButtons = categoryList.querySelectorAll('li');
    for(let catRangeCheckbox of catRangeButtons)
    {
        catRangeCheckbox.addEventListener("change", filterItems);
    }
}

function checkSelectedCategory(){
    let category = findGetParameter("category");
    if(category != -1 && category != null){
        let tmp = document.getElementById(category);
        if(tmp != null){
            tmp.checked = true;
        }
    }
}

function checkSelectedCategories(){
    let categoryString = findGetParameter("categories");
    
    if(categoryString != null && categoryString != ""){
        let categories = categoryString.split("+");
        for(let category of categories){
            if(category != "-1" && category != null && category != ""){
                let tmp = document.getElementById(category);
                if(tmp != null){
                    tmp.checked = true;
                }
            }
        }
    }
}

function checkSelectedPrices(){
    let categoryString = findGetParameter("priceRanges");
    
    if(categoryString != null && categoryString != ""){
        let categories = categoryString.split("+");
        for(let category of categories){
            if(category != "" && category != null){
                let tmp = document.getElementById(category);
                if(tmp != null){
                    tmp.checked = true;
                }
            }
        }
    }
}

function checkSelectedRatings(){
    let categoryString = findGetParameter("starRatings");
    
    if(categoryString != null && categoryString != ""){
        let categories = categoryString.split("+");
        for(let category of categories){
            if(category != "" && category != null){
                let tmp = document.getElementById(category + "starFilter");
                if(tmp != null){
                    tmp.checked = true;
                }
            }
        }
    }
}


function filterItems(event) {
    let url = "searchResultsAjax";

    //let category = findGetParameter("category");
    let search = findGetParameter("search");


    //Fill categories
    let catItems = categoryList.children;
    let category = [];

    for(let i = 0; i < catItems.length; i++){
        if(catItems[i].querySelector("input:checked") != null){
            category.push(catItems[i].querySelector("input").value);
        }
    }


    //Fill prices
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

    //Fill star list
    let starListItems = starList.children;
    let reversedStarListItems = [];
    for(let i = 0; i < starListItems.length; i++){
        reversedStarListItems.push(starListItems[starListItems.length - 1 - i]);
    }
    let starRatingValues = [];

    for(let i = 0; i < reversedStarListItems.length; i++){
        if(reversedStarListItems[i].querySelector("input:checked") != null){
            let sameValue = false;
            if(starRatingValues.length > 0){
                if(starRatingValues[starRatingValues.length - 1] == reversedStarListItems[i].querySelector("input").value - 1){
                    starRatingValues.pop();
                    starRatingValues.push(reversedStarListItems[i].querySelector("input").value);
                    sameValue = true;
                }
            }
            if(!sameValue){
                starRatingValues.push(reversedStarListItems[i].querySelector("input").value - 1);
                starRatingValues.push(reversedStarListItems[i].querySelector("input").value);
            }
        }
    }

    
    let data = {};

    if(search != null){
        data["search"] = search;
    }
    if(category.length > 0){
        data["category"] = category;
    }

    if(priceRangeValues.length > 0){
        data["priceRanges"] = priceRangeValues;
    }
    if(starRatingValues.length > 0){
        data["starRatings"] = starRatingValues;
    }

    let state = {};
    state["search"] = search;
    state["category"] = category[0];
    state["priceRange"] = priceRangeValues[0];
    if(search == null){
        search = "";
    }
    
    let urlString = createURLString(search, category, priceRangeValues, starRatingValues);
    window.history.pushState(state , "Search Results", urlString);

    sendAjaxRequest('POST', url, data, function () {
        //console.log(this.response);
        if (this.status === 200) {
            let searchPage = document.querySelector("#searchPage");
            
            let parser = new DOMParser();
	        let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
            searchPage.replaceWith(add);
            
            
    }});
}

function createURLString(search, categories, priceRanges, starRatings){
    var urlString = "searchResults?";

    urlString += "categories=";
    for(let index = 0; index < categories.length; index++){
        urlString += categories[index];
        if(index != categories.length - 1){
            urlString += "+";
        }
    }

    urlString += "&search=" + search;

    urlString += "&priceRanges=";
    let plist = [];
    let priceItems = priceRangeList.children;
    for(let i = 0; i < priceItems.length; i++){
        if(priceItems[i].querySelector("input:checked") != null){
            plist.push(priceItems[i].querySelector("input").value);
        }
    }
    for(let index = 0; index < plist.length; index++){
        urlString += plist[index];
        if(index != plist.length - 1){
            urlString += "+";
        }
    }
    /*
    for(let index = 0; index < priceRanges.length; index++){
        urlString += priceRanges[index];
        if(index != priceRanges.length - 1){
            if(index % 2 == 0)
                urlString += "-"
            else
                urlString += "+";
        }
    }*/
    
    urlString += "&starRatings=";

    let slist = [];
    let starItems = starList.children;
    for(let i = 0; i < starItems.length; i++){
        if(starItems[i].querySelector("input:checked") != null){
            slist.push(starItems[i].querySelector("input").value);
        }
    }
    for(let index = 0; index < slist.length; index++){
        urlString += slist[index];
        if(index != slist.length - 1){
            urlString += "+";
        }
    }

    /*
    for(let index = 0; index < starRatings.length; index++){
        urlString += starRatings[index];
        if(index != starRatings.length - 1){
            if(index % 2 == 0)
                urlString += "-"
            else
                urlString += "+";
        }
    }*/

    return urlString;
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
addStarFilterEventListeners();
addCategoryFilterEventListeners();
checkSelectedCategories();
checkSelectedPrices();
checkSelectedRatings();
//filterItems();