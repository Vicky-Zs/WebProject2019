 console.log('ok');
 var previousAnswer = 0;
 // Cache
var cache = {};
 function loadJSONDoc(){

	// Create XMLHttpRequest object (Check browser)
	var xmlhttp;
	if (window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else{
		// code for IE5 and IE6
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	// URL for the AJAX call
	var AJAXurl = 'student.php';

	// Things to do when a response arrives
	xmlhttp.onreadystatechange = function(){

		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			// Parse the response
			var resp = JSON.parse(xmlhttp.responseText);

			// Process the parsed content
			insert(resp);

			// Update the cache
			cache[AJAXurl] = resp;
					console.log("zbim");

		}else{
					console.log("zbra");

		}
	};

	// Is the corresponding JSON response already in cache?
	if (cache && cache[AJAXurl]){
		// Build the table from the cached content
		insert(cache[AJAXurl]);
		console.log("Loaded from cache.");
	}
	else{
		// AJAX call
		xmlhttp.open("GET", AJAXurl, true);
		xmlhttp.send();

	}	

	// Update the history
	var state = {previousAnswer: previousAnswer, AJAXurl: AJAXurl};
	history.pushState(state, null, null);
}
 loadJSONDoc();

 /*function processContent(resp){
	// Get the table
	var choix = document.getElementById("reponse");


	// Put the new content
	insert(resp, choix);
}*/
 function insert(content){
 	var students = content.students;
	var choix = document.getElementById("choix1");
	console.log(students);
	//choix.value=students[0].lastname;
 	/*for (var i = 0; i < movies.length; i++){
 		var tr = document.createElement("tr");
 		table.tBodies[0].appendChild(tr);

		// Image
		var tdImage = document.createElement("td");
		tr.appendChild(tdImage);
		var img = document.createElement("img");
		img.setAttribute('src', movies[i].image);
		img.setAttribute('alt', 'poster');
		img.className = "imageCell";
		tdImage.appendChild(img);
		
		// Name
		var tdName = document.createElement("td");
		tr.appendChild(tdName);
		var nameTextNode = document.createTextNode(movies[i].name);
		tdName.appendChild(nameTextNode);
		
		// Rating
		var tdRating = document.createElement("td");
		tr.appendChild(tdRating);
		var ratingTextNode = document.createTextNode(movies[i].rating);
		tdRating.appendChild(ratingTextNode);
	}*/
}
