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
    <link rel="stylesheet" href="styleLogin.css">
  </head>
  <body>
  <div class="okvir-prijava">
  <h2>Moja Biblioteka</h2>
    <div class="forma-prijava">
   
    <h1>Uloguj se</h1>
      
        <form class="input-form" action="" method="post" autocomplete="off">
          
          <input class="input-field" type="text" name="username" required value="" placeholder="Korisnicko ime. . . "> <br>
          
          <input class="input-field" type="password" name="password" required value=""  placeholder="Sifra. . . " > <br>
          <button type="submit" name="dugme" class="dugme">Login</button>
        </form>
      
    </div>
  </div>
  </body>
</html>