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
  require ("connection.php");
  require ("Spieler.php"); 
  ?>

<!-- Navbar -->

  <?php
  include ("../Kistenliste/template/header.html");
  ?>

<!-- Container -->

  <div class="container">
  <?php
            $Tabelle = new Spieler();
            $Tabelle->printTableSpielerDaten();
            ?>
    <div class="row justify-content-center div-container-height1 align-items-center">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-4">
        <form class="form-group" action="newSQL.php">
          <div class="form-group">

            <label for="exampleFormControlSelect1">Spieler:</label>
            <select multiple="multiple" name="Spieler_ID[]" class="form-control bg-dark text-light" id="exampleFormControlSelect1">

            <?php
             #printSelectSpielerDaten();
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

<!-- Footer -->

  <?php 
  include ("../Kistenliste/template/footer.html");
  ?>

</body>

</html>