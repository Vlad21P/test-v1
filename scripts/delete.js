function sendDelRequest()
{
    let xhr = new XMLHttpRequest();
    let requestData = {
        del : document.getElementById("del").value
    };
    xhr.open("POST", "../php/actions.php", true);
    xhr.setRequestHeader("Content-Type", "aplication/javascript");
    xhr.send(requestData);     
} 

