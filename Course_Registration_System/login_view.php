
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Course Registration</title>
<link href="styles.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div >
<img class="loginhead" src="images/login_header.png" alt="header"></div>

<div class="bg"></div>
<div id="divToChange" class='OuterLogin'>
<p>
<table>
<tr>
<td class="floatLeft">Student Username:</td> <td class="floatLeft"><input id='username' required></td>
</tr>
<tr>
<td class="floatLeft">Student Password:</td> <td class="floatRight"><input id='password' required></td>
</tr>
</table>
<div>
<input type="button" name="login" value="login" onclick="fnclog()">

<input type="button" name="register" value="register" onclick="fncreg()"></div>
<p>
</div>

<div id="divo">

</div>

<script>
function fnclog(){
	//alert("shoo");
	var divv = document.getElementById("divToChange");
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	if (username.length<1 || password.length<1){
		alert("Please fill out both text fields.")
	}
	else{
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "controller.php?type=login&user="+username+"&pass="+password, true); // Arguments Method, url, async
	ajax.send();
	// This anonymous callback will execute when the server responds
	ajax.onreadystatechange = function() {
		//console.log("State: " + ajax.readyState);
		if (ajax.readyState == 4 && ajax.status == 200) {
			//var array = JSON.parse(ajax.responseText);
			
 			if (ajax.responseText=='usernameinvalid'){
 				alert("username not found.");
 			}
 			else if(ajax.responseText=='notvalid'){
					alert("password wrong");

	 				console.log(ajax.responseText);
					divv.innerHTML = ajax.responseText;
 			}
 			else{
 				var str ="";
 				console.log(ajax.responseText);
					divv.innerHTML = "Verification Complete:<br><a href='logged.php'>Click here to be redirected.</a>";
 	 			}
 					}
			}
		}
	}
	


function fncreg(){
	var divToChange = document.getElementById("divToChange");
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	if (username.length<1 || password.length<1){
		alert("Please fill out both text fields.")
	}
	else{
		var ajax = new XMLHttpRequest();
		ajax.open("GET", "controller.php?type=register&user="+username+"&pass="+password, true); // Arguments Method, url, async
		ajax.send();
		// This anonymous callback will execute when the server responds
		ajax.onreadystatechange = function() {
			if (ajax.readyState == 4 && ajax.status == 200) {
			if (ajax.responseText=='found'){
				alert('Username taken, please enter different username');
			}
			else{
				divToChange.innerHTML = "Registration is complete<br><a href='logged.php'>Click to login</a>"
			}
}
			}
		}
	}


</script>

</body>
</html>