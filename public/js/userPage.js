function addEventListeners() {
    let notificationButtons = document.querySelectorAll('.deleteNotificationButton');
    for(let notificationButton of notificationButtons)
    {
        notificationButton.addEventListener("click", seeNotification);
    }
}

function seeNotification(event) {
    event.preventDefault();
    let notificationId = this.getAttribute("data-id");

    let button = this;
    
    let url = "/notification/" + notificationId;

    let data = null;

    sendAjaxRequest('PATCH', url, data, function () {
        console.log(this.response);
        if (this.status === 200) {
            // console.log(jsonData);
            button.closest("li").remove();
        }});
}

function deleteAccount(id) {
    
    let url = "/userProfile/" + id;

    let data = null;

    sendAjaxRequest('DELETE', url, data, function () {
        console.log(this.response);
        if (this.status === 200) {
            window.location.replace('/');
        }});
}

addEventListeners();
