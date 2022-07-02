<?php
include('../functions.php');

$stock = (!empty($_POST['stock']))?$_POST['stock']:'';
$start = (!empty($_POST['start']))?$_POST['start']:'';
$end = (!empty($_POST['end']))?$_POST['end']:'';

if($_POST){
  $validations->checkEmpty($stock, 'Stock');
  $validations->checkEmpty($start, 'Start Date');
  $validations->checkEmpty($end, 'End Date');

  $stmt = $con->db()->prepare("SELECT * FROM stocks WHERE stock_name = :name AND (date BETWEEN :start AND :end) ORDER BY date");
  $stmt-> bindValue(':name', $stock);
  $stmt-> bindValue(':start', $start);
  $stmt-> bindValue(':end', $end);
  $stmt-> execute();
  $count = $stmt->rowCount();

  if($count > 0){
    $data = [];
    foreach($stmt as $val){
      $data['price'][] = $val['price'];
      $data['date'][] = $val['date'];
    }
    
    $price = $data['price'];
    $date = $data['date'];
    $arrLength = count($price);

    if($arrLength > 0){
      $shares = 200;
      $average = round(array_sum($price)/$arrLength, 2);
      $variance = 0;
      $standardDeviation = 0;
      $keys = array_keys($price);
      $nearest = max($price)-min($price)+1;
      $profitArray = [];
      $lossArray = [];
      $profit = $price[1] - $price[0];
      
      for($i = 0; $i < $arrLength; $i++){
        for($j = $i+1; $j < $arrLength; $j++){ 
          // CALCULATING FOR MAXIMUM PROFIT
          if($i == 0 && $j == 1){
            $profitArray['buyPrice'] = $price[$i]; 
            $profitArray['sellPrice'] = $price[$j];
            $profitArray['buyDate'] = $date[$i];
            $profitArray['sellDate'] = $date[$j];
            $profitArray['profit'] = $price[$j] - $price[$i];
            $profitArray['totalProfit'] = $profitArray['profit']*$shares;
          }

          if(($price[$j] - $price[$i]) > $profit){
            $profit = $price[$j] - $price[$i];
            $profitArray['buyPrice'] = $price[$i]; 
            $profitArray['sellPrice'] = $price[$j];
            $profitArray['buyDate'] = $date[$i];
            $profitArray['sellDate'] = $date[$j];
            $profitArray['profit'] = $profit;
            $profitArray['totalProfit'] = $profitArray['profit']*$shares;
          }

          // CALCULATING FOR MINIMUM LOSS
          if($price[$keys[$j]] <= $price[$keys[$i]]){
            if(($diff = abs($price[$keys[$i]] - $price[$keys[$j]])) <= $nearest){
              $lossArray['buyPrice'] = $price[$keys[$i]]; 
              $lossArray['sellPrice'] = $price[$keys[$j]];
              $lossArray['buyDate'] = $date[$keys[$i]];
              $lossArray['sellDate'] = $date[$keys[$j]];
              $lossArray['loss'] = $price[$keys[$i]]- $price[$keys[$j]];
              $lossArray['totalLoss'] = $lossArray['loss']*$shares;
              $nearest = $lossArray['loss'];
            }
          }
        }
        $variance += pow(($price[$i] - $average), 2); 
      }

      $standardDeviation = round((float)sqrt($variance/$arrLength), 2);

      echo json_encode(array(
        'msg' => '',
        'shares' => $shares,
        'average' => $average,
        'variance' => round((float)$variance, 2),
        'standardDeviation' => $standardDeviation,
        'profitData' => [
          'buyPrice' => $profitArray['buyPrice'],
          'sellPrice' => $profitArray['sellPrice'],
          'buyDate' => date('jS M, Y', strtotime($profitArray['buyDate'])),
          'sellDate' => date('jS M, Y', strtotime($profitArray['sellDate'])),
          'perShare' => $profitArray['profit'],
          'total' => $profitArray['totalProfit']
        ],
        'lossData' => [
          'buyPrice' => $lossArray['buyPrice'],
          'sellPrice' => $lossArray['sellPrice'],
          'buyDate' => date('jS M, Y', strtotime($lossArray['buyDate'])),
          'sellDate' => date('jS M, Y', strtotime($lossArray['sellDate'])),
          'perShare' => $lossArray['loss'],
          'total' => $lossArray['totalLoss']
        ]
      ));
    }else{
      echo json_encode(['status' => 'error', 'msg' => "No Data Found"]);
    }
  }else{
    echo json_encode(['status' => 'error', 'msg' => "No data found within the given date range."]);
  }
}
?>