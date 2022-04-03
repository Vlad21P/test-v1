function sendRequest()
{
    let xhr = new XMLHttpRequest();
    let requestData = {
        login : document.getElementById("login").value,
        username : document.getElementById("name").value,
        email: document.getElementById("email").value,
        password : document.getElementById("pass").value,
        confirm_password : document.getElementById("confirm_pass").value
    };
    if(requestData.password === requestData.confirm_password) {
        xhr.open("POST", "../php/actions.php", true);
        xhr.setRequestHeader("Content-Type", "aplication/javascript");
        xhr.send(requestData);     
    }
} 


