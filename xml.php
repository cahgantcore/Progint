<?php 
	$file = file_get_contents('./data/xml/1.xml');
	header('Content-type: application/xml');
	$xmlDoc = new DOMDocument();
	$xmlDoc->load("./data/xml/1.xml");
	print $xmlDoc->saveXML();
?>
	
