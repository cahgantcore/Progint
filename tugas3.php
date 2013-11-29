

<?php
$input = $_GET['uri'];

function parseXML($xml) { ?>
	<table border="1" bordercolor="black" style="margin:auto;">
	<caption><b><p style="color:black" class="header"><?php echo $xml->getName() . "<br>"; ?></b></caption>
	<tr>
		<?php foreach ($xml->children()->children() as $a) :?>
			<th><b><p style="color:black" class="text"><?php echo $a->getName(); ?></b></th>
		<?php endforeach;?> 
	</tr>
	<?php 
	$n = 0;
	foreach ($xml->children() as $p) : ?>
		<tr>
		<?php foreach ($p->children() as $r[$n]) :?>
	    	<td><p style="color:black" class="text"><?php echo $r[$n] . "<br>"; ?></td>
		<?php endforeach;?> 
		</tr>
	<?php $n++; endforeach; ?>
	<br>
	<?php
}

$path = $input;
$xmlnow = simplexml_load_file($path);
parseXML($xmlnow);

?>

<a href="index.php">Kembali ke Home</a>
