<?php
class Database {
  private $dbname;
  private $dbusername;
  private $dbpass;
  private $host;
  
  public function db() {
    $this->dbname = 'kemuri';
    $this->dbusername = 'root';
    $this->dbpass = '';
    $this->host = 'localhost';
    
    $pdo = new pdo("mysql:dbname=$this->dbname; host=$this->host; charset=utf8", $this->dbusername, $this->dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $pdo;
  }
}

class Stocks extends Database {
  private $result;

  public function stocks(){
    $stmt = $this->db()->prepare("SELECT * FROM stocks");
    $stmt-> execute();
    
    $this->result = [];

    foreach($stmt as $key => $val){
      $this->result['stock_name'][$val['stock_name']] = $val['id'];
      $this->result['price'][$val['price']] = $val['stock_name'];
      $this->result['date'][$val['date']] = $val['date'];
    }
    return $this->result;
  }
}

class Validations {
  public function checkEmpty($var, $fieldName){
    if(empty($var) || $var == '' || $var == null){
      echo json_encode(['status' => 'error', 'msg' => $fieldName." cannot be empty."]);
      exit;
    }
  }
 
  public function validPrice($var, $id){
    if(!is_numeric($var)){
      echo json_encode(array('status' => 'error', 'msg' => "Price must be either integer type or float type at id $id in CSV file."));
      exit;
    }
  }
}

$con = new Database;
$stocks = new Stocks;
$validations = new Validations;
