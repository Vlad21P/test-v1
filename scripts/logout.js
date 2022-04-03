function logOut()
{
    let xhr = new XMLHttpRequest();
    let requestData = {
        out : document.getElementById("out").value
    };
    xhr.open("POST", "../php/actions.php", true);
    xhr.setRequestHeader("Content-Type", "aplication/javascript");
    xhr.send(requestData);
}