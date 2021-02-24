// for the buttton function in login and register
var s = document.getElementById("signin");
var r = document.getElementById("Register");
var b = document.getElementById("btn");


function Register() {
	s.style.left = "-400px";
	r.style.left = "50px";
	b.style.left = "110px";
}
function signin() {
	s.style.left = "50px";
	r.style.left = "450px";
	b.style.left = "0px";
}

// checking whether the password and confirm password are match
var password = document.getElementById("pass");
var confirm_password = document.getElementById("confirm_password");
function verifyPassword() {
	if (password.value != confirm_password.value) {
		confirm_password.setCustomValidity("Passwords are not match!");
	}
	else {
		confirm_password.setCustomValidity('');
	}
}
password.onchange = verifyPassword;
confirm_password.onkeyup = verifyPassword;
