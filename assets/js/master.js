feather.replace();

function logout(){
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.addEventListener("readystatechange", function() {
        if(this.readyState === 4) {
            var response = JSON.parse(this.responseText);
            if(response.code == 200){
                location.replace("login.php");
            }else{
                alert(response.msg);
            }
        }
    });
    xhr.open("POST", "backend/logout.php");
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send();
}