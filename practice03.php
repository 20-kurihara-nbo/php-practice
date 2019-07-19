<?php
$name = "nbo";
if ($name = "nbo") {
    echo "私はあなたの名前です";
}else {
    echo "あなたの名前ではありません";
}

$total = 0;
echo $total;
for($x = 0; $x <= 10000; $x++) {
    $total += $x;
}
echo $total;

$fruits = array("apple","lemon","grape","melon","peach");
foreach($fruits as $fruits){
   echo $fruits; 
}

/* for文の始めの値を定義する */
$start = 1;
/* for文の終わりの値を定義する */
$end = 100;

for($i = $start; $i <= $end; $i++){

  // 5で割り切れたら{}内を実行する
  if($i % 5 == 0){
    echo $i;
  }
}