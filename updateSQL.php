<?php
$Spieler_ID = $_GET['Spieler_ID'];
$Grund = $_GET['Grund'];
$Datum_Grund = $_GET['Datum_Grund'];
$Datum_Erledigt = $_GET['Datum_Erledigt'];
$Kistennummer = $_GET['Kistennummer'];

$sql = "update tbl_kisten set Spieler_ID='$Spieler_ID',
Grund='$Grund',Datum_Grund='$Datum_Grund',Datum_Erledigt='$Datum_Erledigt' where Kistennummer=$Kistennummer";

print $sql;

$banane = new PDO('mysql:host=localhost;dbname=fc_stahl_kistenliste', 'root', '');
$banane->query($sql);
header("Location: showTable.php");
?>
<a href="showTable.php">Weiter</a>