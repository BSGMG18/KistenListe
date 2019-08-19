<!DOCTYPE html>

<html lang="de">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" rel="stylesheet">
  <link rel="stylesheet" href="../Kistenliste/mycss/style.css">
  <title>FC Stahl Kistenliste</title>
  
</head>

<body class="bg-light">
  <!-- DBConnection -->
  <?php 
  require ("../Kistenliste/connection.php");
  
  ?>

  <!-- Navbar -->
  <?php
  include ("../Kistenliste/template/header.html");
  ?>

  <!-- Container -->
  <div class="container">
    <div class="row justify-content-center div-container-height1 align-items-center">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-4">
        <form class="form-group" action="newSQL.php">
          <div class="form-group">
            <?php

              $sql="select Trikotnummer, Name, ID from mg_kl_spieler order by Name";
              $stmt = $conn->query($sql);

            print("<table> <thead> <tr> <th> Name </th> <th> Trikotnummer </th> </thead>");
              foreach ($stmt->fetchall(PDO::FETCH_ASSOC) as $row) {
                print("<tr>");
                  foreach($row as $key => $value){
                    if($key == "Name" || $key == "Trikotnummer"){
                      echo "<td> $value </td>";
                    }
                    else{
                      echo"";
                    }
                  }
                  print("</tr>");
              }
              print("</table>");

              foreach ($conn->query($sql, PDO::FETCH_OBJ) as $row) {
                print_r($row);
              }

              ?>
            <label for="exampleFormControlSelect1">Spieler:</label>
            <select multiple="multiple" name="Spieler_ID[]" class="form-control bg-dark text-light" id="exampleFormControlSelect1">

            <?php
             
            $sql = "select ID, Trikotnummer, Name from mg_kl_spieler order by Trikotnummer";
            foreach ($conn->query($sql) as $row) {
              $Spieler_ID = $row['ID'];
              $Trikotnummer = $row['Trikotnummer'];
              $Name = $row['Name'];
              echo "<option value='$Spieler_ID'>$Trikotnummer $Name</option>";
            }
            ?>

            </select>
          </div>
              <label>Grund:</label>
              <input name="Grund" class="form-control bg-dark text-light"><br>
              <label>Datum_Grund:</label>
              <input name="Datum_Grund" type="date" class="form-control bg-dark text-light"><br>
              <label>Datum_Erledigt:</label>
              <input name="Datum_Erledigt" type="date" class="form-control bg-dark text-light"><br>
              <input class="btn btn-outline-dark" type="submit" name="submit" value="submit">
        </form>
      </div>

      <!-- Tabelle auskommentieren, Code Beispiel trotzdem behalten6t5555555555555555555555555555555555555555555555555lwe,  
      <?php
      error_reporting(E_ALL);
      ini_set('display_errors', '1');

      $sql = "select ID, Trikotnummer, Name, Vorname from mg_kl_spieler order by Trikotnummer";
      print "<table class='table table-sm table-hover table-dark'><tr><th scope='col'>ID</th><th scope='col'>Trikotnummer</th><th scope='col'>Name</th><th scope='col'>Vorname</th></tr>\n";
      foreach ($conn->query($sql, PDO::FETCH_ASSOC) as $row) {
        print "<tr>";
        foreach ($row as $h => $f) {
          if ($h != 'Spieler_ID') {
            print "<td>$f</td>";
          }
        }
      }
      print "</table>";
      ?>
      -->
                    
    </div>
  </div>

<!-- Footer -->
  <?php 
  include ("../Kistenliste/template/footer.html");
  ?>

</body>

</html>