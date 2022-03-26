var showAlerts = 0;
function sendRequst() {
    deleteEmail();
    var alerts = document.getElementById('alerts');
    var email = document.getElementById('email');
    var title = document.getElementById('title');
    var showmessage = document.getElementById('show');
    const Requst = new XMLHttpRequest();
    Requst.onreadystatechange = function () {
        if (Requst.readyState == 4) {
            if (Requst.status === 200) {
                if (Requst.response.indexOf('tr') !== -1) {
                    if (showAlerts == 0) {
                        title.innerHTML = 'Your fake mail <svg class="mb-2 text-primary" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" /></svg>'
                        alerts.innerHTML += '<div class="alert alert-danger alert-dismissible fade show me-1" role="alert">If the page reloads , you can no longer read the sent messages<a type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a></div>';
                    }
                    showAlerts++;
                    email.textContent = Requst.response.slice(3);
                    showmessage.style.display = 'block';
                } else {
                    alert("An error occurred while performing the operation");
                }
            } else {
                alert('connection error!');
            }
        }
    }
    Requst.open("GET", "webService/config.php?request=newmail", true);
    Requst.send();
}
function showmessage() {
    var modal = document.getElementById('modalBody');
    var loader = document.getElementById('loader');
    var showmessage = document.getElementById('messages');
    const re = new XMLHttpRequest();
    re.onreadystatechange = function () {
        if (re.readyState != 4) {
            modal.classList.add('d-sm-flex')
            modal.classList.add('align-items-center')
            modal.classList.add('justify-content-center')
        } else {
            
                if (re.response != 'error') {
                    loader.style.display = 'none';
                    showmessage.classList.add('container')
                    if (re.response.length > 0) {
                    showmessage.innerHTML = '<div>' + re.response + '</div>';
                    }else{
                        showmessage.innerHTML = '<p>you dont have any message</p>';
                    }
                } else {
                    history.go();
                }
        }
    }
    re.open("GET", "webService/config.php?request=showMessages", true);
    re.send();
}
function deleteEmail() {
    const de = new XMLHttpRequest();
    de.open("GET", "webService/config.php?request=deleteEmail", true);
    de.send();
}
deleteEmail()