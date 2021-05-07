function unbanUser(id) {    
    let url = "/unban/" + id;

    let data = null;

    sendAjaxRequest('GET', url, data, function () {
        console.log(this.response);
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
