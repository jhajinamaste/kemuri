<?php
include('../functions.php');

if(!empty($_FILES["file"]["name"])){
  $fileMimes = array(
    'text/x-comma-separated-values',
    'text/comma-separated-values',
    'application/octet-stream',
    'application/vnd.ms-excel',
    'application/x-csv',
    'text/x-csv',
    'text/csv',
    'application/csv',
    'application/excel',
    'application/vnd.msexcel',
    'text/plain'
  );
 
  if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)){
    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
    $getFileKeys = fgetcsv($csvFile);

    $keys = [];
    for($i = 0; $i < count($getFileKeys); $i++){
      if($getFileKeys[$i] == 'id'){
        $keys['id'] = $i;
      }else if($getFileKeys[$i] == 'date'){
        $keys['date'] = $i;
      }else if($getFileKeys[$i] == 'stock_name'){
        $keys['stock'] = $i;
      }else if($getFileKeys[$i] == 'price'){
        $keys['price'] = $i;
      }
    }

    while($getData = fgetcsv($csvFile, 100, ",")){
      $validations->validPrice($getData[$keys['price']], $getData[$keys['id']]);
      
      $arr['date'] = date('Y-m-d', strtotime($getData[$keys['date']]));
      $arr['stock'] = trim($getData[$keys['stock']]);
      $arr['price'] = $getData[$keys['price']];
      $ar[] = $arr;
    }

    foreach($ar as $key => $val){
      $stmt = $con->db()->prepare("SELECT count(*) as cnt FROM stocks WHERE stock_name = :name AND price = :price AND date = :date");
      $stmt-> bindValue('name', $val['stock']);
      $stmt-> bindValue('price', $val['price']);
      $stmt-> bindValue('date', $val['date']);
      $stmt-> execute();
      $f = $stmt->fetch(PDO::FETCH_ASSOC);

      if($f['cnt'] == 0){
        $stmt = $con->db()->prepare("INSERT INTO stocks(stock_name, price, date)VALUES(:name, :price, :date)");
        $stmt-> bindValue(':name', $val['stock']);
        $stmt-> bindValue(':price', $val['price']);
        $stmt-> bindValue(':date', $val['date']);
        $stmt-> execute();
      }
    }

    fclose($csvFile);
    echo json_encode(array('status' => 'success', 'msg' => 'File uploaded successfully.'));
  }else{
    echo json_encode(array('status' => 'error', 'msg' => 'Invalid file type. Please choose a .csv file only.'));
  }
}else{
  echo json_encode(array('status' => 'error', 'msg' => 'Please select a file.'));
}
?>