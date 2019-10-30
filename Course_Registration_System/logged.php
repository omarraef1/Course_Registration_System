
<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link href="styles.css" type="text/css" rel="stylesheet" />
</head>
<body>

<img class='loginhead' src='images/login_header.png'><br>
<div class="cart" id="divCartCount">
Course Count: Empty
<br>
Courses:
</div>
<br>

<div class='buttondiv'>
<h3 class="classtitle">Fields of Study</h3>
<button onclick="fncnature()" class='buttons button1' id="nature">Nature</button>
<button onclick="fnctech()" class='buttons button1' id="tech">Technology</button>
<button onclick="fnchealth()" class='buttons button1' id="health">Health</button>
</div>
<div class="buttondivi">
<div class="cart" id="enrollmentcart">
You are now enrolled in:
</div></div><br>
<button class='nexus' id="next" onclick="nextButt()">Next</button><br>
<hr><br>
<div id="divToChange">
<h3 class='alignmentl'><i><font color='#003fbb'>Choose area of study from above<br>Click on either of the Courses below 
to Add To Cart<br>Then click next to proceed</font></i></h3>
</div>
<hr>

<!-- Array keeps track of what classes are clicked. -->

<script>

var shoppingCart = [];

function nextButt(){
	var divToChangeAgain = document.getElementById("enrollmentcart");
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "controller.php?type=enroll&courses="+shoppingCart, true); // Arguments Method, url, async
	ajax.send();
	// This anonymous callback will execute when the server responds
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			var str = "";
			var array = JSON.parse(ajax.responseText);
			for (var i=0; i<array.length;i++){
				str+=array[i]['username']+": (courses)->"+array[i]['enrolls'];
				}
			divToChangeAgain.innerHTML = str;
			}
		}
	}

function checked(classCode){
	alert(classCode);
	var divvo = document.getElementById("divCartCount");
	if(shoppingCart.includes(classCode)){
		alert("Class already in cart.");
	}
	else{
		shoppingCart.push(classCode);
		var count = shoppingCart.length;
		divvo.innerHTML = "Course Count: "+count+"<br>Courses: "+shoppingCart;
	}
	//var shoppingCart = []; //empty array to be appended to
	//when button is clicked, append course name and description to shoppingCart
	
}
function fncnature(){
	var divToChange = document.getElementById("divToChange");
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "controller.php?type=getclass&class=nature", true); // Arguments Method, url, async
	ajax.send();
	// This anonymous callback will execute when the server responds
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			var str = "";
			var array = JSON.parse(ajax.responseText);
			for (var i=0; i<array.length;i++){
				str= "<div class='alignmentl'><h3><i><font color='#003fbb'>Click on either of the Courses below to Add To Cart<br>Then click next to proceed</font></i></h3><div class='alignment'><div class='mainclasses'><table><tr><td><button onclick='checked(this.value)' value='AED 150C1' id='button1' class='mainclassesbuttons'><b>"+array[0]['course_code']+": "+array[0]['course_name']+". <i><br><hr>Class Description;</i> "+array[0]['course_description']+"</b></button></td>  <td><button onclick='checked(this.value)' value='AED 210' id='button2' class='mainclassesbuttons'><b>"+array[1]['course_code']+": "+array[1]['course_name']+". <i><br><hr>Class Description;</i> "+array[1]['course_description']+"</b></button></td></tr></div><br><div class='mainclasses'><tr><td><button onclick='checked(this.value)' value='ACBS 195D' id='button3' class='mainclassesbuttons'><b>"+array[2]['course_code']+": "+array[2]['course_name']+". <i><br><hr>Class Description;</i> "+array[2]['course_description']+"</b></button></td><td><button onclick='checked(this.value)' value='ACBS 220' id='button4' class='mainclassesbuttons'><b>"+array[3]['course_code']+": "+array[3]['course_name']+". <i><br><hr>Class Description;</i> "+array[3]['course_description']+"</b></button></td></tr></div></div></div>";
			
			divToChange.innerHTML = str;
			}
		}
	}}

function fnctech(){
	var divToChange = document.getElementById("divToChange");
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "controller.php?type=getclass&class=tech", true); // Arguments Method, url, async
	ajax.send();
	// This anonymous callback will execute when the server responds
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			var str = "";
			var array = JSON.parse(ajax.responseText);
			for (var i=0; i<array.length;i++){
				str= "<div class='alignmentl'><h3><i><font color='#003fbb'>Click on either of the Courses below to Add To Cart<br>Then click next to proceed</font></i></h3><div class='alignment'><div class='mainclasses'><table><tr><td><button onclick='checked(this.value)' value='ECE 175' id='button1' class='mainclassesbuttons'><b>"+array[0]['course_code']+": "+array[0]['course_name']+". <i><br><hr>Class Description;</i> "+array[0]['course_description']+"</b></button></td>  <td><button onclick='checked(this.value)' value='ECE 413' id='button2' class='mainclassesbuttons'><b>"+array[1]['course_code']+": "+array[1]['course_name']+". <i><br><hr>Class Description;</i> "+array[1]['course_description']+"</b></button></td></tr></div><br><div class='mainclasses'><tr><td><button onclick='checked(this.value)' value='CSC 576' id='button3' class='mainclassesbuttons'><b>"+array[2]['course_code']+": "+array[2]['course_name']+". <i><br><hr>Class Description;</i> "+array[2]['course_description']+"</b></button></td><td><button onclick='checked(this.value)' value='CSC 337' id='button4' class='mainclassesbuttons'><b>"+array[3]['course_code']+": "+array[3]['course_name']+". <i><br><hr>Class Description;</i> "+array[3]['course_description']+"</b></button></td></tr></div></div></div>";
				
			divToChange.innerHTML = str;
			}
		}
	}}

function fnchealth(){
	var divToChange = document.getElementById("divToChange");
	
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "controller.php?type=getclass&class=health", true); // Arguments Method, url, async
	ajax.send();
	// This anonymous callback will execute when the server responds
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			var str = "";
			var array = JSON.parse(ajax.responseText);
			alert(array[0]['course_code']);
			str= "<div class='alignmentl'><h3><i><font color='#003fbb'>Click on either of the Courses below to Add To Cart<br>Then click next to proceed</font></i></h3><div class='alignment'><div class='mainclasses'><table><tr><td><button onclick='checked(this.value)' value='PHP 590' id='button1' class='mainclassesbuttons'><b>"+array[0]['course_code']+": "+array[0]['course_name']+". <i><br><hr>Class Description;</i> "+array[0]['course_description']+"</b></button></td>  <td><button onclick='checked(this.value)' value='PHP 493C' id='button2' class='mainclassesbuttons'><b>"+array[1]['course_code']+": "+array[1]['course_name']+". <i><br><hr>Class Description;</i> "+array[1]['course_description']+"</b></button></td></tr></div><br><div class='mainclasses'><tr><td><button onclick='checked(this.value)' value='PHPR 507A' id='button3' class='mainclassesbuttons'><b>"+array[2]['course_code']+": "+array[2]['course_name']+". <i><br><hr>Class Description;</i> "+array[2]['course_description']+"</b></button></td><td><button onclick='checked(this.value)' value='PHPR 802' id='button4' class='mainclassesbuttons'><b>"+array[3]['course_code']+": "+array[3]['course_name']+". <i><br><hr>Class Description;</i> "+array[3]['course_description']+"</b></button></td></tr></div></div></div>";
				
			divToChange.innerHTML = str;
			}
		}}
</script>

</body>
</html>

