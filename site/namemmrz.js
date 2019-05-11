function afficher_bouton() {
	var bouton = document.getElementById('hidden_bouton');
	
	bouton.innerHTML = '<input type="button" name="ajout_classe" value="AJOUT CLASSE">';
}
function ajout_classe(){
	var nom_classe = document.forms['formAddClasse'].nom_txt.value;
	var conteneur_classe = document.getElementById('conteneur_classe');
	var une_classe = '<div id="une_classe"><img src="classe2_miniature.png" id="miniature"><div id="nom_classe">'+nom_classe+'</div></div><br>';
	conteneur_classe.innerHTML = conteneur_classe.innerHTML + une_classe;
}
function ajout_miniature(){
	var miniature = document.getElementById('miniature');
}
function afficher_eleve(){
	var displayed = false;
	if (displayed == false){
		document.getElementById('liste_eleve').style.display = "block";
		display = true;
	}else{
		document.getElementById('liste_eleve').style.display = "none";
		display = false;
	}
}