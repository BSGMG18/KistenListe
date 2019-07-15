<!DOCTYPE html>

<html lang="de">

    <head>

        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
              <!-- Bootstrap CSS -->
              <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" rel="stylesheet">
              <link rel="stylesheet" href="http://localhost/FC/mycss/style.css">
              <link rel="stylesheet" href="http://localhost/FC/mycss/showTable.css">
                      <title>FC Stahl Kistenliste</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://localhost/FC/js/jsfile.js"></script>
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
              <li class="nav-item">
                <a class="nav-link text-light nav-a-border nav-a-margin" href="http://localhost/FC/dropdown.php">FC Stahl - Kistenformular <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                 <a class="nav-link text-light active bg-primary nav-a-border nav-a-margin" href="#">Kistenliste</a>
              </li>
            </ul>
          </div>
        </nav>
<!-- Table -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$sql = "select b.Trikotnummer, b.Name, a.Grund, a.Datum_Grund, a.Datum_Erledigt, a.Kistennummer from tbl_kisten a inner join tbl_spieler b on a.Spieler_ID = b.ID order by a.Datum_Grund desc, b.Trikotnummer asc";
$sql_dropdown = "select b.Trikotnummer from tbl_kisten a inner join tbl_spieler b on a.Spieler_ID = b.ID group by Trikotnummer";
#print $sql;

$banane = new PDO('mysql:host=localhost;dbname=fc_stahl_kistenliste', 'root', '');
print "<div class='table-responsive-sm table-responsive-md div-table'><table id='KistenTable' class='table table-bordered table-light table-hover table-sm table-striped'><thead>
<tr><th scope='col'>";

print "<select multiple='' name='Trikotnummer[]' class='form-control' id='myInput1'>";
print "<option value='' disabled selected>T</option>";

foreach ($banane->query($sql_dropdown, PDO::FETCH_ASSOC) as $rows){
  $Trikotnummer = $rows['Trikotnummer'];
  print "<option value='$Trikotnummer'>$Trikotnummer</option>";
}

print"</select></th><th scope='col'>Name</th><th scope='col'>Grund</th><th scope='col'>Datum</th><th scope='col'>Status</th></tr></thead><tbody>\n";
$z = 0;
foreach ($banane->query($sql, PDO::FETCH_ASSOC) as $row) {
	print "<tr>";
	foreach ($row as $h => $f) {
		if ($h != 'Kistennummer') {
			if ($h == 'Datum_Erledigt') {
				if ($f != '0000-00-00') {
					print "<td id='erledigt'><img src='http://localhost/FC/img/outline-check_circle-18px-grün.svg' width='45' height='35' class='d-inline-block align-top' alt=''></td>";
					continue;
				}
				print "<td id='nichtErledigt'><img src='http://localhost/FC/img/outline-cancel-18px-rot.svg' width='45' height='35' class='d-inline-block align-top' alt=''></td>";
				continue;
				// elseif ($f != '0000-00-00') {
				//   print "<td id='testJa'>ja</td>";
				// }
			}
			print "<td>$f</td>";
			//	print "<td><img src='http://localhost/img/check.png' width='45' height='65' class='d-inline-block align-top' alt=''></td>";
		}
	}
/*
print "<td><button class='btn btn-outline-light'><a class='text-light' href=updateForm.php?Kistennummer=" . $row['Kistennummer'] . ">Edit</a></button></td>";
print "<td><button class='btn btn-outline-light'><a class='text-light' href=deleteSQL.php?Kistennummer=" . $row['Kistennummer'] . " onclick=\"return confirm('Wirklich entfernen');\">Delete</a></button></td>";
print "</tr>";*/
}
print "</tbody></table></div>";
?>


<!-- NavBarBottom-->
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

<script>
function filterTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#KistenTable tbody").rows;
    
    for (var i = 0; i < rows.length; i++) {
        var firstCol  = rows[i].cells[0].textContent.toUpperCase();
        var secondCol = rows[i].cells[1].textContent.toUpperCase();
        var thirdCol  = rows[i].cells[2].textContent.toUpperCase();
        var fourthCol = rows[i].cells[3].textContent.toUpperCase();
        var fifthCol  = rows[i].cells[4].textContent.toUpperCase();
        if (firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }      
    }
}

document.querySelector('#myInput1').addEventListener('keyup', filterTable, false);
document.querySelector('#myInput2').addEventListener('keyup', filterTable, false);
document.querySelector('#myInput3').addEventListener('keyup', filterTable, false);
document.querySelector('#myInput4').addEventListener('keyup', filterTable, false);
document.querySelector('#myInput5').addEventListener('keyup', filterTable, false);
</script>

</body>

</html>
