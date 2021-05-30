function addEventListeners(){
    let filterType = document.getElementById("filterType");
    filterType.addEventListener("change",filterUser);

    let filterText = document.getElementById("filterText");
    filterText.addEventListener("input",filterUser);
}

function unbanUser(id) {    
    let url = "/unban/" + id;

    let data = null;

    sendAjaxRequest('GET', url, data, function () {
        if (this.status === 200) {
            let buttons = document.getElementById("actionButtons" + id);
            let parser = new DOMParser();
            let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
            buttons.replaceWith(add);
        }});
}

function promoteUser(id) {    
    let url = "/promote/" + id;

    let data = null;
    
    sendAjaxRequest('GET', url, data, function () {
        if (this.status === 200) {
            let buttons = document.getElementById("actionButtons" + id);
            let str=`<section id="actionButtons` + id + `">
                        <button data-id=` + id + ` type="button" class="banButton btn btn-success"><i class="bi bi-check-circle-fill"></i>
                            <div class="d-none d-lg-inline">Promoted Successfully &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                        </button>
                    </section>
                    `;
                    
            let parser = new DOMParser();
            let add = parser.parseFromString(str, 'text/html').body.childNodes[0];
            buttons.replaceWith(add);
        }});
}

function banUser(id) {
    
    let reason = document.getElementById("banReason" + id).value;

    if(reason=="")
        reason = "No Reason Was Given"
    
    let url = "/ban/" + id + "?reason=" + reason;

    let data = null;

    sendAjaxRequest('GET', url, data, function () {
        if (this.status === 200) {
            let buttons = document.getElementById("actionButtons" + id);
            let parser = new DOMParser();
            let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
            buttons.replaceWith(add);
        }});
}

function filterUser(event) {
    

    let text = document.getElementById("filterText").value;
    let type = document.getElementById("filterType").value;
    let filterBy = "";

    if(type == 1)
    {
        filterBy = "username";
    }
    else if(type == 2){
        filterBy = "first_name";
    }

    let url = "/management/manageUsers/filter";

    let data = { "text": text, "filterBy": filterBy };

    sendAjaxRequest('POST', url, data, function () {
        if (this.status === 200) {            
            let table = document.getElementById("table");
            let parser = new DOMParser();
            let add = parser.parseFromString(this.response, 'text/html').body.childNodes[0];
            table.innerHTML = "";
            table.appendChild(add);
        }});

}

addEventListeners();