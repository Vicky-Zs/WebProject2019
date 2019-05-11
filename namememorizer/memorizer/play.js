var students = {};
var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", 'students.php', true);
xmlhttp.onreadystatechange = function () {
  if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
    students = JSON.parse(xmlhttp.responseText);
	students=students.students;
	insertStudents();
  }
};
xmlhttp.send(null);
var answer=0;
var score =0
var nbessais=0
$(".choice").click(function testIfRight(){
	if ($(this).val() == students[answer]["firstname"]+" "+students[answer]["lastname"])
	{
		score++;
	}
	nbessais++;
		$("#score").text(score+"/"+nbessais);
		insertStudents();	
});
function insertStudents(){
	var tab=[Math.floor(Math.random()*students.length),Math.floor(Math.random()*students.length),Math.floor(Math.random()*students.length),Math.floor(Math.random()*students.length)];
	$("#choix1").val(students[tab[0]]["firstname"]+" "+students[tab[0]]["lastname"]);
	$("#choix2").val(students[tab[1]]["firstname"]+" "+students[tab[1]]["lastname"]);
	$("#choix3").val(students[tab[2]]["firstname"]+" "+students[tab[2]]["lastname"]);
	$("#choix4").val(students[tab[3]]["firstname"]+" "+students[tab[3]]["lastname"]);
	answer =tab[Math.floor(Math.random()*4)];
	document.getElementById("photo_eleve").src='../memoriseur/data/'+students[answer]['photo'];
}