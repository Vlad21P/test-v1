let check = function() {
    if (document.getElementById('pass').value !==
        document.getElementById('confirm_pass').value) {
        document.getElementById('error').style.color = 'red';
        document.getElementById('error').innerHTML = 'несовпадение паролей';
    } else {
        document.getElementById('error').replace('несовпадение паролей', '');
    }
};


