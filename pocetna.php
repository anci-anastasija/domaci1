<?php
require 'oopfunction.php';

$select = new Connection();

if(isset($_SESSION["iduser"])){
  $user = $select->selectUserById($_SESSION["iduser"]);
}
else{
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja biblioteka</title>
    <script type="text/javascript" src="autofill.js">   ></script>
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
<h1>Zdravo, <?php echo $user["name"]; ?></h1>
    <a href="logout.php">Odjavi se</a>

    <a href="knjiga.php">Dodaj novu knjigu</a>
    <h2>Dodaj učenika:</h2>

    <?php
    
    $ucenik = new Connection();
    $result = $ucenik->insert();
    ?>
  

    <form action="" method="post" autocomlete = "off">
        <input type="text" name="ime" value="" placeholder="Ime ucenika. . ."> <br>
        
        <?php
        $conn =  mysqli_connect("localhost", "root", "","biblioteka");
        $sql = "SELECT idknjiga FROM knjige";
        $res = mysqli_query($conn, $sql);
        ?>
        <table>
            <tr>
             <td>Izaberi sifru: </td>
             <td>
             <select class="" id="sifra" name="sifra" onchange ="autofill()">
             <option></option>
                
             <?php while ($rows = mysqli_fetch_array($res)){
             echo '<option value='.$rows["idknjiga"].'>'.$rows["idknjiga"].'</option>';
             } ?>
             </select>
             </td>
            </tr>
            
            <tr >
                <td> Naziv knjige: </td>
                <td  id="knjigaNaziv"></td>
            </tr>
        </table>

        <input type="text" name="email" value="" placeholder="Email. . ."> <br>
        <input type="text" name="telefon" value="" placeholder="Telefon. . ."> <br>
        <button type="submit" name="sacuvaj">Sačuvaj</button>
    </form>
 
    <table>
        <thead>
            <tr>
                <th>ID korisnika</th>
                <th>Ime</th>
                <th>ID knjige </th>
                <th>Naziv knjige</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Opcije</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $record = new Connection();
            $result = $record->select();
            if($result){
                foreach($result as $row){
            ?>
            <tr>
                <td> <?php echo $row["id"];?> </td>
                <td> <?php echo $row['ime'];?> </td>
                <td> <?php echo $row['id_knjiga'];?> </td>
                <td> <?php echo $row['nazivknjiga'];?> </td>
                <td> <?php echo $row['email'];?> </td>
                <td> <?php echo $row['telefon'];?> </td>
                <td>
                 <a href="obrisi.php?id=<?php echo $row['id'];?>"
                 onclick = "return confirm ('Da li ste sigurni da želite da obrišete ovaj podatak?')">Obriši</a>
                 <a href="update.php?id=<?php echo $row['id'];?>">Uredi</a>
                </td>
            </tr>
            <?php  
                }
            }
            ?>

        </tbody>
    </table>
</body>
</html>