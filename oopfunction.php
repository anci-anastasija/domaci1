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
 
  
     







    
}




?>