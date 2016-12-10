function argazkiaIkusi(argazkiID){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			document.getElementById("argazkiHandiaPantailaOsoa").style = "visibility: visible";
			document.getElementById("argazkiHandia").innerHTML = xhttp.responseText;
		}
	};
	xhttp.open("GET","../PHP/argazkiaIkusiQuery.php?ID="+argazkiID, true);
	xhttp.send();
}

function argazkiHandiaPantailaOsoaItxi(){
	document.getElementById("argazkiHandiaPantailaOsoa").style = "visibility: hidden";
}

function argazkiaEtiketatu(){
	
}