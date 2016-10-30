/**
 * Created by wyj on 2016/10/21.
 */
function show_login() {
    var change_to_login = document.getElementById("changeStateToLogin");
    var change_to_register = document.getElementById("changeStateToRegister");
    change_to_login.style.color = "#53e3a6";
    change_to_register.style.color = "gray";
    var showLogin = document.getElementById("loginState");
    var showRegister = document.getElementById("registerState");
    showLogin.style.display = "block";
    showRegister.style.display = "none";
}

function show_register() {
    var change_to_login = document.getElementById("changeStateToLogin");
    var change_to_register = document.getElementById("changeStateToRegister");
    change_to_login.style.color = "gray";
    change_to_register.style.color = "#53e3a6";
    var showLogin = document.getElementById("loginState");
    var showRegister = document.getElementById("registerState");
    showLogin.style.display = "none";
    showRegister.style.display = "block";
}

function canseelog() {
    var show = document.getElementById("log_notsee");
    var password = document.getElementById("log_notsee_password");
    var hide = document.getElementById("log_see");
    var text = document.getElementById("log_see_password");
    show.style.display = "none";
    hide.style.display = "block";
    text.value = password.value;
    password.value = "";
}

function cannotseelog() {
    var hide = document.getElementById("log_notsee");
    var password = document.getElementById("log_notsee_password");
    var show = document.getElementById("log_see");
    var text = document.getElementById("log_see_password");
    show.style.display = "none";
    hide.style.display = "block";
    password.value = text.value;
    text.value = "";
}

function canseereg() {
    var show = document.getElementById("reg_notsee");
    var password = document.getElementById("reg_notsee_password");
    var hide = document.getElementById("reg_see");
    var text = document.getElementById("reg_see_password");
    show.style.display = "none";
    hide.style.display = "block";
    text.value = password.value;
    password.value = "";
}

function cannotseereg() {
    var hide = document.getElementById("reg_notsee");
    var password = document.getElementById("reg_notsee_password");
    var show = document.getElementById("reg_see");
    var text = document.getElementById("reg_see_password");
    show.style.display = "none";
    hide.style.display = "block";
    password.value = text.value;
    text.value = "";
}


function showInfo() {
    var hide = document.getElementById("myhomeareaedit")
    var show = document.getElementById("myhomearea");
    hide.style.display = "none";
    show.style.display = "block";
}

function hideInfo() {
    var show = document.getElementById("myhomeareaedit");
    var hide = document.getElementById("myhomearea");
    hide.style.display = "none";
    show.style.display = "block";
}