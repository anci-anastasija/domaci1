<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moja biblioteka</title>
</head>
<body>
   
    <?php
    include 'oopfunction.php';
    ?>

    <table>
        <thead>
            <tr>
                <th>ID korisnika</th>
                <th>Ime</th>
                <th>ID knjige </th>
                <th>Naziv knjige</th>
                <th>Email</th>
                <th>Telefon</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select = new Connection();
            $result = $select->select();
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
            </tr>
            <?php  
                }
            }
            ?>

        </tbody>
    </table>
</body>
</html>