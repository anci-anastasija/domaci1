<?php
require 'ajax.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjige</title>
</head>

<body>

<div>
<a href="pocetna.php">Vrati se na početnu</a>
</div>

<div>
  <label >Ime knjige:</label>
  <input type="text"  id="imeknjige">
  <input type= "submit" id="dodaj" value="Dodaj">
</div>

<div id="prikaz">

</div>
  
</body>
</html>

<script type="text/javascript" src="jquery.js"></script>
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>

