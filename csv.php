<?php
	error_reporting(E_ALL | E_STRICT);
	ini_set('display_errors', true);
	ini_set('auto_detect_line_endings', true);

	$inputFilename    = './data/csv/1.csv';
	$outputFilename   = 'output.xml';

	// Open csv to read
	$inputFile  = fopen($inputFilename, 'rt');

	// Get the headers of the file
	$headers = fgetcsv($inputFile);

	// Create a new dom document with pretty formatting
	$doc  = new DomDocument('1.0','UTF-8');
	$doc->formatOutput   = true;

	// Add a root node to the document
	$root = $doc->createElement('daftar_majalah');
	$root = $doc->appendChild($root);

	// Loop through each row creating a <row> node with the correct data
	while (($row = fgetcsv($inputFile)) !== FALSE)
	{
	 $container = $doc->createElement('majalah');

	 foreach ($headers as $i => $header)
	 {
	  $child = $doc->createElement($header);
	  $child = $container->appendChild($child);
	     $value = $doc->createTextNode($row[$i]);
	     $value = $child->appendChild($value);
	 }

	 $root->appendChild($container);
	}

	$csvtoxml = $doc->saveXML();

	$doc->save("./data/csvtoxml.xml");
?>
	<div>
		<textarea cols="50" rows="30">
			<?php
				echo "\n"; 
				echo file_get_contents("./data/csvtoxml.xml"); 
			?>
		</textarea>
	</div>
	
	<a href="csvmore.php">Pencarian Informasi Lanjut</a>
	<br>
	<a href="index.php">Kembali ke Home</a>
