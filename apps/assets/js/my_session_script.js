
var URL_SERVER = 'http://localhost/hackathonficts2016/php/';
var username = localStorage.getItem("username");
var password = localStorage.getItem("password");
var loggedin = localStorage.getItem("loggedin");

if (loggedin == "false") {
    location.href = 'index.html';
}