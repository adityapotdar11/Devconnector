jQuery(function (){ 
    jQuery("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
        submitSuccess: function ($form, event) {
            if(event.target.id == "profile-form"){
                submit_form();
            }
        }
    });
});

document.getElementById("profile-form").addEventListener("submit", function (event) {
    event.preventDefault();
});

function submit_form(){
    let payload = {};
    let form = document.getElementById("profile-form");
    let form_data = new FormData(form);
    form_data.forEach((value, key) => {
        payload[key] = value;
    });
    console.log(payload)
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
    xhr.open("POST", "backend/save_profile.php");
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.send(JSON.stringify(payload));
}