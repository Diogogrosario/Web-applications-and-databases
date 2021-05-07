function addEventListeners() {
    let banButtons = document.querySelectorAll('.banButton');
    for(let banButton of banButtons)
    {
        banButton.addEventListener("click", banUser);
    }

    let promoteButtons = document.querySelectorAll('.promoteButton');
    for(let promoteButton of promoteButtons)
    {
        promoteButton.addEventListener("click", promoteUser);
    }

    // let unbanButtons = document.querySelectorAll('.unbanButton');
    // for(let unbanButton of unbanButtons)
    // {
    //     unbanButton.addEventListener("click", unbanUser);
    // }
}

function unbanUser(id) {

    console.log(id);
    
    let url = "/unban/" + id;

    let data = null;

    sendAjaxRequest('GET', url, data, function () {
        console.log(this.response);
        if (this.status === 200) {
            let buttons = document.getElementById("actionButtons" + id);
            let str =`
                    <section class="actionButtons` + id + `">
                        <button data-id=` + id + ` type="button" class="banButton btn btn-danger"><i class="bi bi-person-x-fill"></i>
                            <div class="d-none d-lg-inline">Ban &nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                        </button>
                        <button data-id=` + id + ` type="button" class="promoteButton btn btn-success"><i class="bi bi-person-plus-fill"></i></i>
                            <div class="d-none d-lg-inline"> Promote to Admin
                            </div>
                        </button>
                    </section>
                    `;
            let parser = new DOMParser();
            let add = parser.parseFromString(str, 'text/html').body.childNodes[0];
            buttons.replaceWith(add);
        }});
}

function promoteUser(event) {
    event.preventDefault();
    let userId = this.getAttribute("data-id");

    console.log(userId)
    // let button = this;
    
    // let url = "/ban/" + notificationId;

    // let data = null;

    // sendAjaxRequest('GET', url, data, function () {
    //     console.log(this.response);
    //     if (this.status === 200) {
    //         // console.log(jsonData);
    //         button.closest("tr").remove();
    //     }});
}

function banUser(event) {
    event.preventDefault();
    let userId = this.getAttribute("data-id");

    console.log(userId)
    // let button = this;
    
    // let url = "/ban/" + notificationId;

    // let data = null;

    // sendAjaxRequest('GET', url, data, function () {
    //     console.log(this.response);
    //     if (this.status === 200) {
    //         // console.log(jsonData);
    //         button.closest("tr").remove();
    //     }});
}

addEventListeners();
