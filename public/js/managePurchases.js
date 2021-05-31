function addEventListeners() {
    let changeButtons = document.querySelectorAll("input.change-status-submit");
    for(changeButton of changeButtons) {
        changeButton.addEventListener("click", changeStatus);
    }
}

function changeStatus(event) {
    event.preventDefault();
    let purchase_id = this.getAttribute("data-id");
    let purchase_status = document.querySelector("select#status_" + purchase_id).value; 

    if(purchase_status != "Processing" && purchase_status != "Sent" && purchase_status != "Arrived") {
        console.log("Invalid status " + purchase_status);
        return;
    }

    let url = "/management/managePurchases/" + purchase_id + "/status";
    let data = {'status' : purchase_status};

    sendAjaxRequest("PATCH", url, data, function() {

        if(this.status == 200) {
            let responseJson = JSON.parse(this.responseText);
            let status = responseJson['status'];

            let badgeEntry = document.querySelector("span#status-purchase-" + purchase_id);
            let badgeModal = document.querySelector("span#status-modal-" + purchase_id);

            badgeEntry.innerHTML = status;
            badgeModal.innerHTML = status;

            let badgeColor = status == "Processing" ? "info" : (status == "Sent" ? "primary" : "success");

            badgeEntry.className = "badge bg-" + badgeColor + " purchase-status-badge";
            badgeModal.className = "badge bg-" + badgeColor + " d-flex flex-column justify-content-center";
        }
    });

}

addEventListeners();