
<div style="float:left">
	<form method="get" action="others.php">
		<input type="radio" name="uri" value="../BernadetteVina/DataXML.xml">Bernadette Vina <br>
		<input type="radio" name="uri" value="../ConvertXML/test.xml">ConvertXML <br>
		<input type="radio" name="uri" value="../II3190-Pemrograman-Integratif/progin.xml">II3190-Pemrograman-Integratif <br>
		<input type="radio" name="uri" value="../IPT-Assignments/data1.xml">IPT-Assignments <br>
		<input type="radio" name="uri" value="../progin-raosanfady/data.xml">progin-raosanfady <br>

		<input type="radio" name="uri" value="../II3160-Tugas1-Tugas2/csvoutput.xml">II3160-Tugas1-Tugas2 <br>
		<input type="radio" name="uri" value="../II3160--Pemrograman-Integratif-/DaftarIdol.xml">II3160--Pemrograman-Integratif- <br>
		<input type="radio" name="uri" value="../II3190-Pemrograman-Integratif/progin.xml">II3190-Pemrograman-Integratif <br>
		<input type="radio" name="uri" value="../progin/contoh.xml">progin <br>
		<input type="radio" name="uri" value="../tugas-2-pemrograman-integratif/data3.xml">tugas-2-pemrograman-integratif <br>
		<input type="submit">	
	</form>
</div>

<div>
	<textarea cols="75" rows="40" style="float:left">
		<?php
			$URI = $_GET['uri'];
			echo "\n";
			echo file_get_contents($URI);
		?>
	</textarea>
</div>

<br>
<a href="index.php">Kembali ke Home</a>
