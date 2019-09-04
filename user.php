<?php

$comment=$_POST['comment'];
$money=$_POST['money'];

if(empty($comment)) {
echo '';
} elseif(strlen($comment) > 20) {
    echo '文字数がオーバーしています。';
} else{
    echo $comment;
}

if(empty($money)) {
            echo '';
    }elseif(is_numeric($money) && $money <= 10000) {
        echo '投げ銭が'.$money.'円あります。'."<br>".'ありがとうございます。';
    }else{ 
        echo '投げ銭を受け付けられません';
        }

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
         <meta charset="UTF-8">
        <title>user</title>
    </head>
    <body>
        <h1>twitterっぽいアプリ</h1>
        <form action"" method="post">
            <input type="text" name="comment" maxlength="20" value="">
            <input type="submit" value="発言"><br>
            <input type="nambar" name="money" max="10000">
            <input type="submit" value="投げ銭">
        </form>
    </body>
</html>