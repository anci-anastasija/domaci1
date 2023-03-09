<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja biblioteka</title>
</head>
<body>
    <a href="knjiga.php">Dodaj novu knjigu</a>
    <p>Dodaj učenika:</p>
    
    <?php
    include 'oopfunction.php';
    $ucenik = new Connection();
    $result = $ucenik->insert();
    ?>

    <form action="" method="post" autocomlete = "off">
        <input type="text" name="ime" value="" placeholder="Ime ucenika. . ."> <br>
        <input type="text" name="id_knjiga" value="" placeholder="Šifra knjige. . ."> <br>
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