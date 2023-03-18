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
    <script type="text/javascript" src="search.js"></script>
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="stylePocetna.css">
    

</head>
<body>
    <div class="divdiv">
      <h1 class="link-slova">Zdravo, <?php echo $user["name"]; ?></h1>
    
      <div class="link">
        <a href="knjiga.php" class="link-slova">Dodaj novu knjigu</a>
        <a href="logout.php"class="link-slova">[Odjavi se]</a>
      </div>
      
   
      <?php
      $ucenik = new Connection();
      $result = $ucenik->insert();
      ?>
      
      <div class="forma-ucenik">
      <h2>Dodaj učenika:</h2>
        <form action="" method="post" autocomlete = "off" class="input-ucenik">
        <input type="text" name="ime" value="" placeholder="Ime ucenika. . ."> <br>
        
        <?php
        $conn =  mysqli_connect("localhost", "root", "","biblioteka");
        $sql = "SELECT idknjiga FROM knjige";
        $res = mysqli_query($conn, $sql);
        ?>
        <table class="table-insert">
            <tr>
             <td>Izaberi sifru: </td>
             <td>
             <select class="" id="sifra" name="sifra" onchange ="autofill()">
             <option class="option"></option>
                
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
        <button type="submit" class="dugme" name="sacuvaj">Sačuvaj</button>
       </form>
      </div>
      
      <div class="search-box"  >
      <input type="text" id="myInput" onkeyup="myFunction()" 
      placeholder="Pretrazi...">
      </div>
 


    <table id="grid" class="table-ucenik">
        <thead>
            <tr id='tableHeader'  >
            <th data-type="number"  >ID korisnika</th>
                   <th data-type="string" >Ime</th>
                   <th data-type="number">ID knjige </th>
                   <th data-type="string" >Naziv knjige</th>
                   
                   <th data-type="string">Email</th>
        
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
                 <a class="a1" href="obrisi.php?id=<?php echo $row['id'];?>"
                 onclick = "return confirm ('Da li ste sigurni da želite da obrišete ovaj podatak?')">Obriši</a>
                 <a class="a1" href="update.php?id=<?php echo $row['id'];?>">Uredi</a>
                </td>
            </tr>
            <?php  
                }
            }
            ?>
    <script type="text/javascript">
    grid.onclick = function(e) {
    if (e.target.tagName != 'TH') return;
      let th = e.target;
      sortGrid(th.cellIndex, th.dataset.type);
    };

    function sortGrid(colNum, type) {
      let tbody = grid.querySelector('tbody');
      let rowsArray = Array.from(tbody.rows);
      let compare;

      switch (type) {
        case 'number':
          compare = function(rowA, rowB) {
            return rowA.cells[colNum].innerHTML - rowB.cells[colNum].innerHTML;
          };
          break;
        case 'string':
          compare = function(rowA, rowB) {
            return rowA.cells[colNum].innerHTML > rowB.cells[colNum].innerHTML ? 1 : -1;
          };
          break;
      }
      rowsArray.sort(compare);
      tbody.append(...rowsArray);
    }
        </script>
        </tbody>
    </table>



    </div>
</body>
</html>