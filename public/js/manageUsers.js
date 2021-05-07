function unbanUser(id) {

    console.log(id);
    
    let url = "/unban/" + id;

    let data = null;

    sendAjaxRequest('GET', url, data, function () {
        console.log(this.response);
        if (this.status === 200) {
            let buttons = document.getElementById("actionButtons" + id);
            let str =`
                    <section id="actionButtons` + id + `">
                        <button data-id=` + id + ` type="button" class="banButton btn btn-danger"><i class="bi bi-person-x-fill"></i>
                            <div class="d-none d-lg-inline">Ban &nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                        </button>
                        <button data-id=` + id + ` type="button" class="promoteButton btn btn-success" onclick="promoteUser(` + id + `)" }}><i class="bi bi-person-plus-fill"></i></i>
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

function promoteUser(id) {

    console.log(id);
    
    let url = "/promote/" + id;

    let data = null;
    
    sendAjaxRequest('GET', url, data, function () {
        console.log(this.response);
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
