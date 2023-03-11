<?php
require 'oopfunction.php';

if(isset($_SESSION["iduser"])){
  header("Location: pocetna.php");
}

$login = new Connection();

if(isset($_POST["dugme"])){
  $result = $login->login($_POST["username"], $_POST["password"]);

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["iduser"] = $login->idUser();
    header("Location: pocetna.php");
  }
  elseif($result == 10){
    echo
    "<script> alert('Pogresna lozinka'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('Korisnik nije registrovan'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <h2>Uloguj se</h2>
    <form class="" action="" method="post" autocomplete="off">
      <label for="">Korisničko ime : </label>
      <input type="text" name="username" required value=""> <br>
      <label for="">Šifra</label>
      <input type="password" name="password" required value=""> <br>
      <button type="submit" name="dugme">Login</button>
    </form>
    <br>

  </body>
</html>