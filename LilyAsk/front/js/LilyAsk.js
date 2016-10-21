/**
 * Created by wyj on 2016/10/11.
 */

function showLog() {
    var show = document.getElementById("log");
    var hide = document.getElementById("regis");
    show.style.display="block";
    hide.style.display="none";
    var color = document.getElementById("loginbut");
    var gray = document.getElementById("regisbut");
    color.style.color="#53e3a6";
    gray.style.color="gray";
    var trans = document.getElementById("slider");
    trans.style.marginLeft="60px";
}

function showRegis() {
    var show = document.getElementById("regis");
    var hide = document.getElementById("log");
    show.style.display="block";
    hide.style.display="none";
    var color = document.getElementById("regisbut");
    var gray = document.getElementById("loginbut");
    color.style.color="#53e3a6";
    gray.style.color="gray";
    var trans = document.getElementById("slider");
    trans.style.marginLeft="190px";
}

function changeCanSee() {
    var notSee = document.getElementById("password");
    var see = document.getElementById("passwordSee");
    var pic = document.getElementById("see");
    if (notSee.style.display=="block"){
        notSee.style.display="none";
        see.style.display="block";
        see.value=notSee.value;
        pic.setAttribute("src", "../img/cansee.png");
    } else {
        notSee.style.display="block";
        notSee.value=see.value;
        see.style.display="none";
        pic.setAttribute("src", "../img/cannotsee.png");
    }
}

function changeRegCanSee() {
    var notSee = document.getElementById("chp");
    var see = document.getElementById("cht");
    var pic = document.getElementById("regisee");
    if (notSee.style.display=="block"){
        notSee.style.display="none";
        see.style.display="block";
        see.value=notSee.value;
        pic.setAttribute("src", "../img/cansee.png");
    } else {
        notSee.style.display="block";
        notSee.value=see.value;
        see.style.display="none";
        pic.setAttribute("src", "../img/cannotsee.png");
    }
}

function downUserInfo() {
    var show = document.getElementById("downBar");
    show.style.display="block";
    var backColor = document.getElementById("use");
    backColor.style.backgroundColor="#31ce79";
}
function upUserInfo() {
    var hide = document.getElementById("downBar");
    hide.style.display="none";
    var backColor = document.getElementById("use");
    backColor.style.backgroundColor="#53e3a6";
}

