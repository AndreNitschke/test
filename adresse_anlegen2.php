<?php

//Verbindung zur Datenbank aufbauen
include "db.inc.php";

class adresse{
 public $vorname;
 public $nachname;
 public $strasse;
 public $ort;
 public $telefon;
 public $email;

  function setadresse($nvorname, $nnachname, $nstrasse, $nort, $ntelefon, $nemail) {
 include "db.inc.php";
  $anix_query = "INSERT INTO adressliste (vorname, nachname, strasse, ort, telefon, email) VALUES ('$nvorname', '$nnachname', '$nstrasse', '$nort', '$ntelefon', '$nemail')";
  $anix_result = mysqli_query($db, $anix_query);

  }
	

function searchadresse($suchen) {
 include "db.inc.php";

  $anix_query = "SELECT * FROM adressliste WHERE nachname = '".$suchen."'";
  $anix_result = mysqli_query($db, $anix_query);
  

while($row = $anix_result->fetch_assoc()) 
    {
     echo $row["vorname"];
     echo " - "; 
     echo $row["nachame"];
     echo " - "; 
     echo $row["strasse"];
     echo " - "; 
     echo $row["ort"];
     echo " - "; 
     echo $row["telefon"];
     echo " - "; 
     echo $row["email"];
     echo " <br> "; 

    }
  }


 }


 $ziel = $_POST["target"];
 if ($ziel == 'eingeben')
 {
  $ergebnis = new adresse();
  $ergebnis->setadresse($_POST["vorname"], $_POST["nachname"], $_POST["strasse"], $_POST["ort"], $_POST["telefon"],   $_POST["email"]);
 }
 
if ($ziel == 'suchen')
 {
  $ergebnis = new adresse();
  $ergebnis->searchadresse($_POST["suchen"]);
 }
?>
