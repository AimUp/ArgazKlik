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

function tagHitzaSartuDivIkusi(){
	document.getElementById("tagHitzaSartu").style="display:inline-block";
	document.getElementById("tagHitzaSartuBotoia").style="display:none";
}
function tagHitzaDBnSartu(argazkiID,hitza){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			if(xhttp.responseText=="ondo"){
				alert("Etiketa ondo sartu da");
				document.getElementById("tagHitzaSartu").style="display:none";
				document.getElementById("tagHitzaSartuBotoia").style="display:inline-block";
			}
			else{
				document.getElementById("hErantzuna").innerHTML = xhttp.responseText;
			}
		}
	};
	xhttp.open("GET","../PHP/tagHitzaSartuQuery.php?ID="+argazkiID+"&hitza="+hitza, true);
	xhttp.send();
	return false;
}

function tagLekuaSartuDivIkusi(){
	document.getElementById("tagLekuaSartu").style="display:inline-block";
	document.getElementById("tagLekuaSartuBotoia").style="display:none";
}
function tagLekuaDBnSartu(argazkiID,latit,longit){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			if(xhttp.responseText=="ondo"){
				alert("Etiketa ondo sartu da");
				document.getElementById("tagLekuaSartu").style="display:none";
				document.getElementById("tagLekuaSartuBotoia").style="display:inline-block";
			}
			else{
				document.getElementById("lErantzuna").innerHTML = xhttp.responseText;
			}
		}
	};
	xhttp.open("GET","../PHP/tagLekuaSartuQuery.php?ID="+argazkiID+"&latit="+latit+"&longit="+longit, true);
	xhttp.send();
	return false;
}

function tagPertsonaSartuDivIkusi(){
	document.getElementById("tagPertsonaSartu").style="display:inline-block";
	document.getElementById("tagPertsonaSartuBotoia").style="display:none";
}
function tagPertsonaDBnSartu(argazkiID,nick){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			if(xhttp.responseText=="ondo"){
				alert("Etiketa ondo sartu da");
				document.getElementById("tagPertsonaSartu").style="display:none";
				document.getElementById("tagPertsonaSartuBotoia").style="display:inline-block";
			}
			else{
				document.getElementById("nErantzuna").innerHTML = xhttp.responseText;
			}
		}
	};
	xhttp.open("GET","../PHP/tagPertsonaSartuQuery.php?ID="+argazkiID+"&nick="+nick, true);
	xhttp.send();
	return false;
}
