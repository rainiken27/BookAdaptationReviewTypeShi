//makes the login form visible to the user 
function openLoginForm() {
	document.getElementById("loginOverlay").style.display="block";
}

//login form disappears when user clicks on the x button in the corner
function closeLoginForm() {
	document.getElementById("loginOverlay").style.display="none";
}
