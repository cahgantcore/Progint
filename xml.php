<?php 
	$file = file_get_contents('./data/xml/1.xml');
?>
	<div>
		<textarea cols="50" rows="30">
			<?php 
				echo "\n";
				echo $file; 
			?>
		</textarea>
	</div>

	<a href="xmlmore.php">Pencarian Informasi Lanjut</a>
	<br>
	<a href="index.php">Kembali ke Home</a>
	
