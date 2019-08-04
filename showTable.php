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
          <a class="nav-link text-dark nav-a-border nav-a-margin" href="http://localhost/FC/dropdown.php">FC Stahl - Kistenformular <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark active bg-primary nav-a-border nav-a-margin" href="#">Kistenliste</a>
        </li>
      </ul>
    </div>
  </nav>
  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');

  $sql = "select b.Vorname, b.Name, a.Grund, a.Datum_Grund, a.Datum_Erledigt, a.Kistennummer from tbl_kisten a inner join tbl_spieler b on a.Spieler_ID = b.ID order by a.Kistennummer desc";
  #print $sql;
  $conn = new PDO('mysql:host=localhost;dbname=fc_stahl_kistenliste', 'root', '');
  print "<div class='container my-container table-responsive-sm'><table class='table table-sm table-hover table-dark'>
<tr><th scope='col'>Vorname</th><th scope='col'>Name</th><th scope='col'>Grund</th><th scope='col'>Datum_Grund</th><th scope='col'>Datum_Erledigt</th></tr>\n";
  $z = 0;
  foreach ($conn->query($sql, PDO::FETCH_ASSOC) as $row) {
    print "<tr>";
    foreach ($row as $h => $f) {
      if ($h != 'Kistennummer') {
        print "<td>$f</td>";
      }
    }

    print "<td><button class='btn btn-outline-light'><a class='text-light' href=updateForm.php?Kistennummer=" . $row['Kistennummer'] . ">Edit</a></button></td>";
    print "<td><button class='btn btn-outline-light'><a class='text-light' href=deleteSQL.php?Kistennummer=" . $row['Kistennummer'] . " onclick=\"return confirm('Wirklich entfernen');\">Delete</a></button></td>";
    print "</tr>";
  }
  print "</table></div>";
  ?>
</body>

</html>