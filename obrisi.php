<?php

   include 'oopfunction.php';
   $delete = new Connection();
   $id = $_REQUEST['id'];
   $obrisi = $delete->delete($id);
   
   if($obrisi) {
        echo "<script>alert('Uspešno ste obrisali podatke');</script>";
        echo "<script>window.location.href = 'pocetna.php';</script>";
    }

?>
