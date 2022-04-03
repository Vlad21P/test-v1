function sendUpdate()
{
    let xhr = new XMLHttpRequest();
    let requestData = {
        login : document.getElementById("new_login").value,
        username : document.getElementById("new_name").value,
        email: document.getElementById("new_email").value,
        password : document.getElementById("new_pass").value,
        confirm_password : document.getElementById("new_pass").value
    };
    xhr.open("POST", "../php/actions.php", true);
    xhr.setRequestHeader("Content-Type", "aplication/javascript");
    xhr.send(requestData);     
} 


