<?php
$conn = mysqli_connect("localhost", "root", "", "biblioteka");


if(isset($_POST["done"])){
  global $conn;
  $ime = $_POST["naziv"];
  $query = "INSERT INTO knjige VALUES('','$ime')";
  $result=mysqli_query($conn, $query);
}

if(isset($_POST["action"])){
  if($_POST["action"] == "delete"){
  delete();
  }
}
  
function delete(){
  global $conn;
  $idknjiga = $_POST["idknjiga"];
  mysqli_query($conn, "DELETE FROM knjige WHERE idknjiga = $idknjiga");
  echo 1;

}

if(isset($_POST["display"])){
  $query = "SELECT *FROM knjige";
  $result=mysqli_query($conn, $query);
?>

<div id = "prikaz">
  
  <table cellpadding="10">
    <tr id="<?php echo $row["idknjiga"]; ?>">
    <th>ID</th>
    <th>Ime knjige</th>
    <th>Brisanje</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC )) { ?>
    <tr>
      <td><?php echo $row["idknjiga"]; ?></td>
      <td><?php echo $row["nazivknjiga"]; ?></td>
      <td> <button class="dugme"type="button" name="button" onclick = "obrisiRecord(<?php echo $row['idknjiga']; ?>)">Obrisi</button> </td>
    </tr>
    <?php } ?>
  </table>  
       
</div>
<?php } ?>
