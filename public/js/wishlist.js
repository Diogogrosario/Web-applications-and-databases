let isList = false;
let isWishlist = false;

function addEventListeners() {
    let wishListButton = document.querySelector('button.wishlist');
    if(wishListButton != null)
        wishListButton.addEventListener("click", wishlistRequest);

    let wishlistButtonsSearch = document.querySelectorAll('button.wishlist-search');
    for(let wishlistButtonSearch of wishlistButtonsSearch) {
        if(isList == false) isList = true;
        wishlistButtonSearch.addEventListener("click", wishlistRequest);
    }

    if(!isList) {
        let wishlistButtonsList = document.querySelectorAll('button.wishlist-list');
        for(let wishlistButtonList of wishlistButtonsList) {
            if(isWishlist == false) isWishlist = true;
            wishlistButtonList.addEventListener("click", wishlistRequest);
        }
    }
}

function wishlistRequest(e) {
    let url = '/wishlist';
    let item_id = this.getAttribute('data-id');
    let data = null;
    let type = "add";
    let method = "post";

    if(this.classList.contains("add-wishlist")) {
        data = {'item_id': item_id};
    } else {
        method = "delete";
        url += '/' + item_id;
        type = "remove";
    }

    if(!isWishlist) {
        switchWishlistButton(this, type);
        sendAjaxRequest(method, url, data, function() {
            console.log(this.response);
            if(this.status !== 200) {
                switchWishlistButton(this, type == "add" ? "remove" : "add");
            } 
        });
    } else {
        let oldItem = this.closest('.searchItem');

        oldItem.remove();
    
        sendAjaxRequest(method, url, data, function() {
            console.log(this.response);
            if(this.status !== 200) {
                document.querySelector('#wishItemsList').prepend(oldItem);
            } 
        });
    }

    
}

function switchWishlistButton(button, type) {
    if(type == "add") {
        button.innerHTML = '<i class="bi bi-heart-fill"' + (isList ? ' style="color:red;"' : '') + '></i>' + (!isList ? ' Remove from Wishlist' : '');
        button.classList.add("remove-wishlist");
        button.classList.remove("add-wishlist");
    } else {
        button.innerHTML = '<i class="bi bi-heart"' + (isList ? ' style="color:red;"' : '') + '></i>' + (!isList ? ' Add to Wishlist' : '');
        button.classList.remove("remove-wishlist");
        button.classList.add("add-wishlist");
    }
}

addEventListeners();