function signUp() {
	var signUpForm = document.getElementsByClassName("sign-up-form")[0];
	var formData = new FormData(signUpForm);
	var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
		if(xml.readyState == 4 && xml.status == 200) {
			alert(xml.responseText);
			if(xml.responseText == "registered") {
				window.location = "../pages/site.php";
			}
		}
	}
	xml.open("POST", "../php/backend.php");
	xml.send(formData);
}



function signIn() {
	var signInForm = document.getElementsByClassName("sign-in-form")[0];
	var formData = new FormData(signInForm);
	var xml = new XMLHttpRequest();
	xml.onreadystatechange = function() {
		if(xml.readyState == 4 && xml.status == 200) {
			alert(xml.responseText);
			if(xml.responseText == "logged") {
				window.location = "pages/site.php";
			} else {
				alert("wrong email or passsword");
			}
		}
	}
	xml.open("POST", "php/backend.php");
	xml.send(formData);
}