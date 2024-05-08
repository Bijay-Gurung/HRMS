function fetchTotalUsers() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('numOfUser').textContent = this.responseText;
        }
    };
    xhttp.open("GET", "fetchTotalUsers.php", true);
    xhttp.send();
}

fetchTotalUsers();
