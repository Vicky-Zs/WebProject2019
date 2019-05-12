function displayClass(){var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  }

xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		document.getElementById('conteneur_classe').innerHTML=xmlhttp.responseText;
	}
}
   xmlhttp.open("GET", 'displayclass.php',true);
   xmlhttp.send();

}
displayClass();
function deleteClass(i){
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  }

xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		console.log(xmlhttp.responseText);
	}
}
   xmlhttp.open("GET", 'deleteclass.php?class='+i,true);
   xmlhttp.send();
   displayClass();

}
function deleteStudent(i,j){
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  }

xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		console.log(xmlhttp.responseText);
	}
}
   xmlhttp.open("GET", 'deletestudent.php?class='+i+'&student='+j,true);
   xmlhttp.send();
   displayClass();

}
function displayAddStudent(class_name)
{
		if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  }

xmlhttp.onreadystatechange = function() {
	console.log(xmlhttp.status);
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		document.getElementById('formAddStudent').innerHTML=xmlhttp.responseText;

	}
}
   xmlhttp.open("GET",'../importation/import.php',true);
   xmlhttp.send();
}
//displayAddStudent('L2 MIASHS');

function displayMyData(){
		if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  }

xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		document.getElementById('formIns').innerHTML=xmlhttp.responseText;
	}
}
   xmlhttp.open("GET",'../profile/modify-user-data.php',true);
   xmlhttp.send();
}
displayMyData();
