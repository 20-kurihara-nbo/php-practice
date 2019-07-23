<?php
function sum($max){
    $result = 0;
    for($i = 1; $i <= 100; $i++){
        $result += $i;
    }
    return $result;
}
echo sum(100);
?>

<?php
$string="abcdefghij";
echo strlen($string);
?>

<?php
$string="I love Rudy!";
$new_string=str_replace("Rudy","php", $string);
echo $new_string;
?>

<?php
$array=array(2,5,9,7,3,1,8,6,4);
asort($array);
print_r($array);
arsort($array);
print_r($array);
?>

<?php
//以下はphp04 課題提出部分
?>

<?php
function double($double){
    echo($double*2);
}
echo double(4);
?>

<?php
function f($a,$b){
    echo ($a + $b);
}
echo f(4,8);
?>

<?php
function product($arr){
     $array = array_product($arr);
     return $array;
}
echo product (array(1,3,5,7,9));
?>


<?php
//strip_tags関数の使い方
$html = '<h1>テスト</h1><br><strong>テキスト</strong>';
$html = strip_tags($html,'<br>');
echo $html;
?>

<?php
//array_push関数で要素を追加する
$fruits = array("apple","lemon","grape","melon","peach");
array_push($fruits,"banana");
print_r ($fruits);
?>

<?php
//array_merge関数で配列を結合する
$fruits  = array("apple","lemon","grape","melon","peach");
$array1 = array("cherry","strawberry");
$array2 = array("berry","watermelon");

$fruits_marge = array_merge($fruits,$array1,$array2);
print_r ($fruits_marge);
?>

<?php
//時間を取得する
echo time();
echo "\n";
echo mktime();
echo "\n";
echo mktime(0,0,0,12,29,2017);
echo "\n";
echo date("y/m/d", time());
echo "\n";
echo date("y年/m月/d日", mktime(0,0,0,12,29,2017))
?>

<?php
//配列の中で一番大きい値を返す
function max_array($arr){
// とりあえず配列の最初の要素を一番大きい値とする
 $max_number = $arr[0];
    foreach($arr as $a){
        if ($max_number < $a) {
            $max_number = $a;
        }
    }
 
 return $max_number;
}

echo max_array([1,3,7,34,72,9,14,88,5]);
?>