<?php
	if (empty($_GET)) {
    // no data passed by get
	} else {
		$kriteria = $_GET['kriteria']; $input = $_GET['input'];
	}
?>
	<div>
		<textarea cols="50" rows="30" style="float:left">
			<?php
				echo "\n"; 
				echo file_get_contents("./data/csvtoxml.xml"); 
			?>
		</textarea>
		<textarea cols="50" rows="30" style="float:left">
			<?php
				if (empty($_GET)) {
			    // no data passed by get
				} else {
					echo "\n";

					$xml = simplexml_load_file('./data/csvtoxml.xml');

					$path = '//majalah/'.$kriteria.'[.='.'"'.$input.'"'.']/parent::*';

					$nodes = $xml->xpath($path);

					foreach($nodes as $node)
					{
					    foreach($node as $name => $prop) {
					        printf("%s: %s\n", $name, $prop);
					    }
					    echo "\n";
					}
				}
			?>
		</textarea>
		<br>
		<form name="query" action="csvmore.php" method="get">
			<select name="kriteria">
				<option value="Judul">Judul</option>
				<option value="Halaman">Halaman</option>
			</select>
			<input type="text" name="input">
			<input type="submit" value="Submit">
		</form>
	</div>
	
	<a href="index.php">Kembali ke Home</a>
