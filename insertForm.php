<!DOCTYPE html>

<html lang="de">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <!-- Bootstrap CSS -->
  <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" rel="stylesheet">
  <link rel="stylesheet" href="http://localhost/FC/mycss/style.css">
  <title>FC Stahl Kistenliste</title>
</head>

<body class="bg-light">
  <!-- Navbar -->
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="http://localhost/FC/img/logo.png" width="45" height="65" class="d-inline-block align-top" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
      <ul class="nav nav-pills">
        <li class="nav-item active">
        </li>
        <li class="nav-item">
          <a class="nav-link text-light active bg-primary nav-a-border nav-a-margin" href="#">FC Stahl - Kistenformular <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light nav-a-border nav-a-margin" href="http://localhost/FC/z_showtable2.php">Kistenliste</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Container -->
  <div class="container">
    <div class="row justify-content-center div-container-height1 align-items-center">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-4">
        <form class="form-group" action="newSQL.php">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Spieler:</label>
            <?php
            $mysqli = new mysqli('localhost', 'root', '', 'fc_stahl_kistenliste');
            $resultSet = $mysqli->query("select ID, Trikotnummer, Name from tbl_spieler order by Trikotnummer");
            ?>

            <select multiple="multiple" name="Spieler_ID[]" class="form-control bg-dark text-light" id="exampleFormControlSelect1">

    <?php
    while ($rows = $resultSet->fetch_assoc()) {
      $Spieler_ID = $rows['ID'];
      $Trikotnummer = $rows['Trikotnummer'];
      $Name = $rows['Name'];

      echo "<option value='$Spieler_ID'>$Trikotnummer $Name</option>";
    }
    ?>
            </select>
            </div>
                            <!--<label>Spieler_ID:</label>
                            <input name=" Spieler_ID" class="form-control bg-dark text-light"><br>//!-->
              <label>Grund:</label>
              <input name="Grund" class="form-control bg-dark text-light"><br>
              <label>Datum_Grund:</label>
              <input name="Datum_Grund" type="date" class="form-control bg-dark text-light"><br>
              <label>Datum_Erledigt:</label>
              <input name="Datum_Erledigt" type="date" class="form-control bg-dark text-light"><br>
              <input class="btn btn-outline-dark" type="submit" name="submit" value="submit">
        </form>
      </div>
      <!--                    <div class="col-md-2">
                    </div>
                    <div class="col-sm-4 hr-margin hr-hide">
                        <hr class="my-4">
                    </div>
                    <div class="col-md-6 col-sm-4">
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$sql = "select ID, Trikotnummer, Name, Vorname from tbl_spieler order by Trikotnummer";
#print $sql;
$banane = new PDO('mysql:host=localhost;dbname=fc_stahl_kistenliste', 'root', '');
print "<table class='table table-sm table-hover table-dark'><tr><th scope='col'>ID</th><th scope='col'>Trikotnummer</th><th scope='col'>Name</th><th scope='col'>Vorname</th></tr>\n";
$z = 0;
foreach ($banane->query($sql, PDO::FETCH_ASSOC) as $row) {
  print "<tr>";
  foreach ($row as $h => $f) {
    if ($h != 'Spieler_ID') {
      print "<td>$f</td>";
    }
  }
}
print "</table>";
?>
                    </div>-->
    </div>
  </div>
  <nav class="navbar justify-content-center fixed-bottom navbar-expand-lg navbar-dark bg-dark">
    <div id="navbarNavBottom">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <img src="http://localhost/FC/img/baseline-copyright-24px.svg" width="20" height="12" class="d-inline-block" alt="">
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-muted nav-link-bottom-margin" href="#">2019 Copyright: <span class="text-light"> Maximilian Glomm</span></a>
        </li>
      </ul>
    </div>
  </nav>
</body>

</html>
