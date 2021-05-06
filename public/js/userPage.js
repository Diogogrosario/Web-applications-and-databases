function addEventListeners() {
    let notificationButtons = document.querySelectorAll('.deleteNotificationButton');
    console.log(notificationButtons);
    for(let notificationButton of notificationButtons)
    {
        console.log(notificationButton.getAttribute("data-id"));
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

addEventListeners();
