function sendAuthData()
{
    let xhr = new XMLHttpRequest();
    let requestData = {
        login : document.getElementById("auth_login").value,
        pass : document.getElementById("auth_pass").value
    };
    xhr.open('POST', '../php/actions.php', true);
    xhr.setRequestHeader('Content-Type', 'application/javascript');
    xhr.send(requestData); 
}
