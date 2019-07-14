<?php

if (isset($_GET['submit'])) {

	$SpielerIDs = $_GET['Spieler_ID'];
	$Grund = $_GET['Grund'];
	$Datum_Grund = $_GET['Datum_Grund'];
	$Datum_Erledigt = $_GET['Datum_Erledigt'];

	#print_r($SpielerIDs);
	#$SpielerIDs2 = implode(',', $SpielerIDs);

	foreach ($SpielerIDs as $Spieler_IDr) {
		#$stmt = $banane->prepare("insert into tbl_kisten (Spieler_ID,Grund,Datum_Grund,Datum_Erledigt)) values(:SpielerIDs, $Grund, $Datum_Grund, $Datum_Erledigt)");
		#$stmt->bindParam(":SpielerIDs", $Spieler_IDr);
		#$stmt->execute();

		$sql = "insert into tbl_kisten (Spieler_ID,Grund,Datum_Grund,Datum_Erledigt) values('$Spieler_IDr', '$Grund', '$Datum_Grund', '$Datum_Erledigt')";
		#$sql->bindParam(":SpielerIDs", $Spieler_IDr);
		$banane = new PDO('mysql:host=localhost;dbname=fc_stahl_kistenliste', 'root', '');
		$banane->query($sql);
		print $sql;
	}
}
header("Location: http://localhost/FC/showTable.php/");
?>
<a href="showTable.php">Weiter</a>
