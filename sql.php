<?php

	$dbh = new PDO('mysql:host=localhost;dbname=progint','root','');

	$sxe = new SimpleXMLElement('<daftar_buku></daftar_buku>');
	// $sxe_crs = $sxe->addChild('contentResponses');

	function array_walk_simplexml(&$value, $key, &$sx) {
	    $sx->addChild($key, $value);
	}

	$stmt = $dbh->query('SELECT * FROM buku');

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	    $sx_cr = $sxe->addChild('buku');
	    array_walk($row, 'array_walk_simplexml', $sx_cr);
	}

	$sxe->asXML();

	$dom_sxe = dom_import_simplexml($sxe);
	$dom = new DOMDocument('1.0','UTF-8');
	$dom->formatOutput = true;
	$dom_sxe = $dom->importNode($dom_sxe, true);
	$dom_sxe = $dom->appendChild($dom_sxe);

	$sqltoxml = $dom->saveXML();
	$dom->save("./data/sqltoxml.xml"); 
?>
	<div>
		<textarea cols="50" rows="30">
			<?php 
				echo "\n";
				echo file_get_contents("./data/sqltoxml.xml");
			?>
		</textarea>
	</div>

	<a href="sqlmore.php">Pencarian Informasi Lanjut</a>
	<br>
	<a href="index.php">Kembali ke Home</a>

	
