var nickOna;
var epostaOna;
var passOna;
var pass2Ona;

function irudiAurrekarga(irudia){
	document.getElementById('argazkiAurrekarga').style.display = 'inline';
	document.getElementById('argazkiAurrekarga').src = window.URL.createObjectURL(irudia);
}

function checkNickname(){
	var nick = document.getElementById("nick").value;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200 )){
			if(xhttp.responseText=='ona'){
				nickOna = true;
			}
			else if(xhttp.responseText=='txarra'){
				alert("Nickname hori erabilpenean dago. Aukeratu beste bat, mesedez.");
				nickOna = false;
			}
		}
	};
	xhttp.open("GET","./Balioztapenak/checkNickname.php?nick="+nick, true);
	xhttp.send();
}

function checkEposta(eposta){	
	var eposta = document.getElementById("eposta").value;
	if(eposta.value.indexOf("@")===-1 || 
			eposta.value.substring(0,eposta.value.indexOf("@")).length===0 ||
			eposta.value.substring(eposta.value.indexOf("@"),eposta.value.length).indexOf(".")===-1 ||
			eposta.value.substring(eposta.value.indexOf("."),eposta.value.length).length<3){
		alert("Epostaren formatua okerra da");
		epostaOna = false;
	}
	else
	{
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if ((xhttp.readyState==4)&&(xhttp.status==200 )){
				if(xhttp.responseText=='ona'){
					epostaOna = true;
				}
				else if(xhttp.responseText=='txarra'){
					alert("Eposta hori erabilpenean dago. Aukeratu beste bat, mesedez.");
					epostaOna = false;
				}
			}
		};
		xhttp.open("GET","Balioztapenak/chekEposta.php?eposta="+eposta, true);
		xhttp.send();
	}				
}

function checkPasahitza(){
	var pasahitza = document.getElementById("pasahitza").value;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200)){
			if(xhttp.responseText == "BALIOZKOA"){
				passOna = true;
			}
			else if(xhttp.responseText == "BALIOGABEA"){
				alert("Pasahitza ahula");
				passOna = false;
			}
		}
	};
	xhttp.open("POST","../PHP/checkPasahitza-SOAPclient.php", true);
	xhttp.send(pasahitza);
}
function checkPassErrepikatua(){
	var pass = document.getElementById("pasahitza").value;
    var passBaieztatu = document.getElementById("pasahitzaErrepikatu").value; 
    if(pass != passBaieztatu){
        alert("Pasahitzak ez du kointziditzen");
        pass2Ona = false;
    }
	else{
		pass2Ona = true;
	}
}
function checkAll(){
	checkNickname();
	checkEposta();
	checkPasahitza();
	checkPassErrepikatua();
	return (nickOna && epostaOna && passOna && pass2Ona);
}