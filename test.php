<?php
// $price = [143, 308, 313, 1, 307, 312, 330];
// $buyPrice = PHP_INT_MAX;
// $sellPrice = 0;
// $profit = 0;
// $buyPriceIndex = 0;
// $sellPriceIndex = 0;

// // METHOD 1 - UING LOOP
for($i = 0; $i < count($price); $i++){
  if($price[$i] < $buyPrice){
    $buyPrice = $price[$i];
    $buyPriceIndex = $i;
  }else if(($price[$i] - $buyPrice) > $profit){
    $profit = $price[$i] - $buyPrice;
    $sellPriceIndex = $i;
    $sellPrice = $price[$i];
  }
}

// // // METHOD 2 - USING INBUILT ARRAY FUNCTIONS ( WITHOUT USING LOOP )
// // $buyPrice = min($price);
// // $buyPriceIndex = array_search($buyPrice, $price);
// // $sliced = array_slice($price, $buyPriceIndex);
// // $sellPrice = max($sliced);
// // $sellPriceIndex = array_search($sellPrice, $price);
// // $profit = $sellPrice - $buyPrice;



// echo "<h1>FOR MAXIMUM PROFIT</h1>";
// echo "&#x2022; Buy Array Index: ".$buyPriceIndex."<br>";
// echo "&#x2022; Buy Price: Rs.".$buyPrice." per unit<br>";
// echo "&#x2022; Sell Price Array Index: ".$sellPriceIndex."<br>";
// echo "&#x2022; Sell Price: Rs.".$sellPrice."<br>";
// echo "&#x2022; Profit: Rs.".$profit." per unit sold<br><br>";


// // $price = [310, 305, 308, 295, 314, 313, 302];

// // $keys = array_keys($price);
// // $nearest = max($price)-min($price)+1;
// // $result = [];
// // $arrLength = count($price);

// // for($i = 0; $i < $arrLength; $i++){
// //   for($j = $i+1; $j < $arrLength; $j++){
// //     if($price[$keys[$j]] <= $price[$keys[$i]]){
// //       if(($diff = abs($price[$keys[$i]] - $price[$keys[$j]])) <= $nearest){
// //         $result['buyPrice'] = $price[$keys[$i]]; 
// //         $result['sellPrice'] = $price[$keys[$j]];
// //         $result['buyKeyIndex'] = $keys[$i];
// //         $result['sellKeyIndex'] = $keys[$j];
// //         $nearest = $diff;
// //       }
// //     }
// //   }
// // }

// // echo "<h1>FOR MINIMUM LOSS</h1>";
// // echo "&#x2022; Buy Array Index: ".$result['buyKeyIndex']."<br>";
// // echo "&#x2022; Buy Price: Rs.".$result['buyPrice']." per unit<br>";
// // echo "&#x2022; Sell Price Array Index: ".$result['sellKeyIndex']."<br>";
// // echo "&#x2022; Sell Price: Rs.".$result['sellPrice']."<br>";
// // echo "&#x2022; Minimum Loss: Rs.".$result['buyPrice']-$result['sellPrice']." per unit sold<br>";


// $arr = [143, 308, 313, 3, 307, 12, 1];;
// $arrLength = count($arr);
  
// $max_diff = $arr[1] - $arr[0];
// $result = [];
// for($i = 0; $i < $arrLength; $i++){
//   for($j = $i+1; $j < $arrLength; $j++){ 
//     if($arr[$j] - $arr[$i] > $max_diff){
//       $result['profit'] = $arr[$j] - $arr[$i];
//       $result['buyPrice'] = $arr[$i];
//       $result['sellPrice'] = $arr[$j];
//       $result['buyKeyIndex'] = $i;
//       $result['sellKeyIndex'] = $j;
//     }
//   } 
// }
  
// // Function calling
// echo "<h1>FOR MAXIMUM PROFIT</h1>";
// echo "&#x2022; Buy Array Index: ".$result['buyKeyIndex']."<br>";
// echo "&#x2022; Buy Price: Rs.".$result['buyPrice']." per unit<br>";
// echo "&#x2022; Sell Price Array Index: ".$result['sellKeyIndex']."<br>";
// echo "&#x2022; Sell Price: Rs.".$result['sellPrice']."<br>";
// echo "&#x2022; Maximum Profit: Rs.".$result['sellPrice']-$result['buyPrice']." per unit sold<br>";

// function Stand_Deviation($arr){
//   $num_of_elements = count($arr);
//   $variance = 0.0;
//   $average = array_sum($arr)/$num_of_elements;
    
//   // foreach($arr as $i){
//   //   $variance += pow(($i - $average), 2);
//   // }

//   for($i = 0; $i < count($arr); $i++){
//     $variance += pow(($arr[$i] - $average), 2);
//   }
    
//   return (float)sqrt($variance/$num_of_elements);
// }

// $arr = array(324, 319, 319, 323, 313);  
// print_r(Stand_Deviation($arr));


$arr = array(320, 324, 319, 319, 323, 313);
$arr_size = count($arr);
$max_diff = $arr[1] - $arr[0];
$min_element = $arr[0]; // Minimum number visited so far 

for($i = 1; $i < $arr_size; $i++){
  if($arr[$i] - $min_element > $max_diff){
    $max_diff = $arr[$i] - $min_element;
  }

  if($arr[$i] < $min_element){
    $min_element = $arr[$i];
  }
}

// Function calling
echo "Maximum difference is ".$max_diff;