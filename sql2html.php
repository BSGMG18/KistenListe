<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8" />
  <title>sql2html</title>
</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
$history = $_SESSION['history'];

print "DB-Zugriff von Höding<br>";

print "
<form>
 <input name='query' size=80><br>
</form>
";

$sql = $_GET['query'];
$history[] = $sql;
foreach ($history as $e) {
	print "$e<br>\n";
}

$_SESSION['history'] = $history;

print "<h3>SQl-Anfrage:$sql</h3>\n";

$conn = new PDO('mysql:host=localhost;dbname=fc_stahl_kistenliste', 'root', '');

print "<table border=1>";
$z = 0;
foreach ($conn->query($sql, PDO::FETCH_ASSOC) as $row) {
	if ($z == 0) {
		print "<tr>";
		foreach ($row as $h => $f) {
			print "<th>$h</th>";
		}

		print "</tr>";
		$z++;
	}
	print "<tr>";
	foreach ($row as $h => $f) {
		print "<td>$f</td>";
	}

	print "</tr>";
}
print "</table>";
?>
</body>
</html>
