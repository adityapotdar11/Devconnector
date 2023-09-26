document.getElementById("login-form").addEventListener("submit", function (event) {
    event.preventDefault();
    submit_form();
});

function submit_form(){
    let payload = {};
    let form = document.getElementById("login-form");
    let form_data = new FormData(form);
    form_data.forEach((value, key) => {
        payload[key] = value;
    });
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.addEventListener("readystatechange", function() {
        if(this.readyState === 4) {
            var response = JSON.parse(this.responseText);
            if(response.code == 200){
                location.replace("dashboard.php");
            }else{
                alert(response.msg);
            }
        }
    });
    xhr.open("POST", "backend/login.php");
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(JSON.stringify(payload));
}