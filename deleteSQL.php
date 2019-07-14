<?php
$id = $_GET['Kistennummer'];
$sql = "delete from tbl_kisten where Kistennummer=$id";

$banane = new PDO('mysql:host=localhost;dbname=fc_stahl_kistenliste', 'root', '');
$banane->query($sql);
header("Location: showTable.php");
?>
<a href="showTable.php">Weiter</a>