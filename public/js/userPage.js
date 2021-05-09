function addEventListeners() {
    let notificationButtons = document.querySelectorAll('.deleteNotificationButton');
    for(let notificationButton of notificationButtons)
    {
        notificationButton.addEventListener("click", seeNotification);
    }

    // let submitButton = document.getElementById("submitNewUsername");
    // submitButton.addEventListener("click",submitNewUsername);

    // let cancelButton = document.getElementById("cancelNewUsername");
    // submitButton.addEventListener("click",submitNewUsername);
}

function editUsernameForm(username, id){

    let doc = document.getElementById("userNameContent");

    let str = `<section id="userNameContent">
                    <form action="/userProfile/edit" method="post">

                        <textarea name="newUsername" class="w-100 h-50" required id="newUsername" rows=1 style="resize: none;" placeholder=` + username + `></textarea>
                        
                        <button id="submitNewUsername" data-id='` + id + `' type="class" class="btn btn-success"><i class="bi bi-check-circle-fill"></i> Submit</button>
                        <button id="cancelNewUsername" data-id='` + id + `'  type="class" class="btn btn-danger"><i class="bi bi-x-circle-fill"></i> Cancel</button></td>

                    </form>
                </section>`

    let parser = new DOMParser();
    let add = parser.parseFromString(str, 'text/html').body.firstChild;

    console.log(add);
    doc.replaceWith(add);

    //can't add in the beggining since these buttons do not exist
    let submitButton = document.getElementById("submitNewUsername");
    submitButton.addEventListener("click",submitNewUsername);

    let cancelButton = document.getElementById("cancelNewUsername");
    cancelButton.addEventListener("click",cancelNewUsername);
}

function submitNewUsername(){
    event.preventDefault();
    let doc = document.getElementById("userNameContent");
    let userId = this.getAttribute('data-id');

    let newUsername = document.getElementById("newUsername").value;

    if(newUsername == null || newUsername.length < 4)
        return;

    let data = {'username': newUsername};

    let url = "/userProfile/edit";

    sendAjaxRequest('PATCH', url, data, function () {
        console.log(this.response);
        if (this.status === 200) {

            let str = `<section id="userNameContent">
                    ` + newUsername + `
                    <button type="class" class="btn" onclick=editUsernameForm('` + newUsername + `',` + userId + `)>
                        <i class="bi bi-pencil-square" ></i>
                    </button>
                </section>`

            let parser = new DOMParser();
            let add = parser.parseFromString(str, 'text/html').body.firstChild;

            let navbarUsername = document.getElementById("navbarUsername");
            
            navbarUsername.innerHTML = newUsername + "&nbsp; |";

            doc.replaceWith(add);
        }});
}

function cancelNewUsername(event){
    event.preventDefault();

    let doc = document.getElementById("userNameContent");
    let userId = this.getAttribute('data-id');

    let username = document.getElementById("newUsername").getAttribute("placeholder");

    let str = `<section id="userNameContent">
                    ` + username + `
                    <button type="class" class="btn" onclick=editUsernameForm('` + username + `',` + userId + `)>
                        <i class="bi bi-pencil-square" ></i>
                    </button>
                </section>`

    let parser = new DOMParser();
    let add = parser.parseFromString(str, 'text/html').body.firstChild;

    doc.replaceWith(add);
        
}

function seeNotification(event) {
    event.preventDefault();
    let notificationId = this.getAttribute("data-id");

    let button = this;
    
    let url = "/notification/" + notificationId;

    let data = null;

    sendAjaxRequest('PATCH', url, data, function () {
        if (this.status === 200) {
            // console.log(jsonData);
            button.closest("li").remove();
        }});
}

function deleteAccount(id) {
    
    let url = "/userProfile/" + id;

    let data = null;

    sendAjaxRequest('DELETE', url, data, function () {
        if (this.status === 200) {
            window.location.replace('/');
        }});
}

addEventListeners();
