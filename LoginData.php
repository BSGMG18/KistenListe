<?php

if(isset($_GET['submit'])){

    require("../FC/DBConnection/connection.php");

    $Voranme = $_GET['vorname'];
    $Name = $_GET['name'];
    $Email = $_GET['email'];
    $Passwort = $_GET['passwort'];

    $sql = "insert into users (email, passwort, vorname, nachname, created_at, updated_at, passwortcode, passwortcode_time) values('$Email', '$Passwort', '$Vorname', '$Nachname', '1', '1', '1', '1')";
    $conn->query($sql);
}

?>