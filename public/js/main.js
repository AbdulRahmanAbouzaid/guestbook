function showUpdateForm(msg_id) {
    var message = document.getElementById("message" + msg_id);
    var updateForm = document.getElementById("update-form" + msg_id);
    message.style.display = "none";
    updateForm.style.display = "block";
}

function cancel(msg_id){
    var message = document.getElementById("message" + msg_id);
    var updateForm = document.getElementById("update-form" + msg_id);
    updateForm.style.display = "none";
    message.style.display = "block";
}