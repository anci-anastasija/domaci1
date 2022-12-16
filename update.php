<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
   
<?php
  require 'oopfunction.php';
  $azuriraj = new Connection();
  $id = $_REQUEST['id'];
  $row = $azuriraj->edit($id);
  if(isset($_POST['update'])) {
    if(isset($_POST['id_knjiga']) && isset($_POST['email']) && isset($_POST['telefon'])) {
      $data['id'] = $id;
      $data['id_knjiga'] = $_POST['id_knjiga'];
      $data['email'] = $_POST['email'];
      $data['telefon'] = $_POST['telefon'];
      $update = $azuriraj->update($data);
      if($update) {
        echo "<script>alert('Uspešan update');</script>";
        echo "<script>window.location.href = 'pocetna.php';</script>";
      }
      else {
        echo "<script>alert('Greška');</script>";
        echo "<script>window.location.href = 'pocetna.php';</script>";
      }
    }
  }

?>
<form action="" method="post" autocomlete = "off">
  <label>Ime</label> 
  <input type="text" name="ime" value="<?=$row['ime']?>"> <br>
  <label>Šifra knjige</label> 
  <input type="text" name="id_knjiga" value="<?=$row['id_knjiga']?>"> <br>
  <label>Email:</label>
  <input type="text" name="email" value="<?=$row['email']?>"> <br>
  <label>Telefon:</label>
  <input type="text" name="telefon" value="<?=$row['telefon']?>"> <br>
  <button type="submit" name="update">Sačuvaj</button>
</form>
     
</body>
</html>