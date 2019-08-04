<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
              <!-- Bootstrap CSS -->
              <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" rel="stylesheet">
              <link rel="stylesheet" href="http://localhost/FC/mycss/style.css">
                      <title>FC Stahl Kistenliste</title>
                </link>
            </meta>
        </meta>
</head>
<body>
<!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
            <ul class="nav nav-pills">
              <li class="nav-item active">
                <a class="navbar-brand" href="#">
                <img src="http://localhost/FC/img/logo.png" width="45" height="65" class="d-inline-block align-top" alt="">
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark active bg-primary nav-a-border nav-a-margin" href="http://localhost/FC/dropdown.php">FC Stahl - Kistenformular <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                 <a class="nav-link text-dark nav-a-border nav-a-margin" href="http://localhost/FC/showtable.php">Kistenliste</a>
              </li>
            </ul>
          </div>
        </nav>
<?php
$id = $_GET['Kistennummer'];
$sql = "select Spieler_ID, Grund, Datum_Grund, Datum_Erledigt from tbl_kisten where Kistennummer=$id";
#print $sql;
$conn = new PDO('mysql:host=localhost;dbname=fc_stahl_kistenliste', 'root', '');
foreach ($conn->query($sql, PDO::FETCH_ASSOC) as $row) {
	#print_r($row);
	$Spieler_ID = $row['Spieler_ID'];
	$Grund = $row['Grund'];
	$Datum_Grund = $row['Datum_Grund'];
	$Datum_Erledigt = $row['Datum_Erledigt'];
}
?>
<form action="updateSQL.php">
Spieler_ID:<br><input name="Spieler_ID"  value="<?php print $Spieler_ID;?>"><br>
Grund:<br><input name="Grund" value="<?php print $Grund;?>"><br>
Datum_Grund:<br><input name="Datum_Grund" value="<?php print $Datum_Grund;?>"><br>
Datum_Erledigt:<br><input name="Datum_Erledigt" value="<?php print $Datum_Erledigt;?>"><br>
<br><input type="hidden" name="Kistennummer" value="<?php print $id;?>"><br>
<input type="submit">
</form>

</body>
</html>
