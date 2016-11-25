<?php
	//nusoap.php klasea gehitzen dugu
	require_once($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'nuSOAP'.DIRECTORY_SEPARATOR.'nusoap.php');
	require_once($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'nuSOAP'.DIRECTORY_SEPARATOR.'class.wsdlcache.php');
		
	//soap_server motako objektua sortzen dugu
	$ns="http://localhost:1234/argazklik/PHP/Balioztapenak/checkPasahitza-SOAPserver.php/egiaztatu"; //name of the service (localhost)
	//$ns="http://jferrero.esy.es/myquizz-master/PHP/egiaztatuPasahitza.php/egiaztatu"; //name of the service (hostinger)
	$server = new soap_server;
	$server->configureWSDL('egiaztatu',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;
	
	//inplementatu nahi dugun funtzioak erregistratzen ditugu
	$server->register('egiaztatuP',			//funtzioaren izena
		array('pasahitza'=>'xsd:string'),	//sarrerako parametroak
		array('erantzuna'=>'xsd:string'),	//irteerako parametroak
		$ns,								//namespace-a
		$ns,								//soapaction-a
		'rpc',								//style-a
		'encoded'							//erabilera
		);
	
	//funtzioa inplementatzen dugu
	function egiaztatuP($pasahitza){
		//Fitxategia irakurtzen da eta edukia aldagai batean gordetzen da
		$fitx = fopen('toppasswords.txt', "r");
		while (!feof($fitx)) {
			$lerroa = fgets($fitx);
			$lerroa = str_replace("\n", "", $lerroa);
			$lerroa = str_replace("\r", "", $lerroa);
			if($lerroa === $pasahitza){
				fclose($fitx);
				return "BALIOGABEA";
			}
		}
		fclose($fitx);		
		return "BALIOZKOA";
	}
	//nusoap klaseko service metodoari dei egiten diogu
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>
