<?php
$nadjiPoNazivu = $_POST['id'];
    $conn =  mysqli_connect("localhost", "root", "","biblioteka");
    $sql = "SELECT nazivknjiga FROM knjige WHERE idknjiga = '$nadjiPoNazivu'";
    $res = mysqli_query($conn, $sql);
    while ($rows = mysqli_fetch_array($res)){
    echo '<option value='.$rows["nazivknjiga"].'>'.$rows["nazivknjiga"].'</option>';
}
       
?>