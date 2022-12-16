<?php 

class Connection {
  private $host = "localhost";
  private $user = "root";
  private $password = "";
  private $db_name = "biblioteka";
  public $conn;

  public function __construct (){
    $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
  }

  public function select(){
    $selectQuery = "SELECT * FROM podaci INNER JOIN knjige ON podaci.id_knjiga=knjige.idknjiga ";
    $result = $this->conn->query($selectQuery);
    if($result->num_rows>0) {
      return $result;
    }
    else{
      return false;
    }
  }
  
  public function insert(){
    if(isset($_POST['sacuvaj'])) {
      if(isset($_POST['id_knjiga'])
      && isset($_POST['ime']) 
      && isset($_POST['email'])
      && isset($_POST['telefon'])) {
        if(!empty($_POST['id_knjiga'])
        && !empty($_POST['ime'])
        && !empty($_POST['email'])
        && !empty($_POST['telefon'])) {
          $id_knjiga=$_POST['id_knjiga'];
          $ime=$_POST['ime'];
          $email=$_POST['email'];
          $telefon=$_POST['telefon'];
          
          $query = "INSERT INTO podaci (id_knjiga, ime, email, telefon) VALUES
          ('$id_knjiga','$ime','$email', '$telefon')";
          
          if($upit = $this->conn->query($query)) {
            echo "<script>window.location.href = 'pocetna.php';</script>";
          }
          else {
            echo "<script>alert('Greška');</script>";
            echo "<script>window.location.href = 'pocetna.php';</script>";
          }
        }
        else {   
          echo "<script>alert('Prazna polja');</script>";
          echo "<script>window.location.href = 'pocetna.php';</script>";
        }
      }
    }
  }

  public function delete($id) {
    $query = "DELETE FROM podaci WHERE id = '$id'";
    if($sql = $this->conn->query($query)) {
      return true;
    }
    else {
      return false;
    }
  }

  public function edit($id) {
    $data = null;
    $query = "SELECT * FROM podaci WHERE id = '$id'";
    if($sql = $this->conn->query($query)) {
      while($row = $sql->fetch_assoc()) {
        $data = $row;
      }
    }
    return $data;
  }

  public function update($data) {
    $query = "UPDATE podaci SET id='$data[id]' , id_knjiga ='$data[id_knjiga]',
    email='$data[email]', telefon='$data[telefon]' WHERE id='$data[id]'";
    if($sql = $this->conn->query($query)) {
      return true;
    }
    else {
      return false;
    }
  }
}
?>



 
  
     







    
