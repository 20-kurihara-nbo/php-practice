<?php
//変数を初期化
$name = '';
$comment = '';
$comment = '';
$db_connect = false;//初期値
$data_exists = false;//初期値
$sql = null;//初期値

//data_existsがtrueになる条件
if (!empty($_POST['name']) && !empty($_POST['comment'])) {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $data_exists = true;
}

//db_connectがtrueになる条件と接続確認
try{
    $pdo = new PDO('mysql:dbneme=oneline_bbs;host=localhost;charaset=utf8','root','');
    $db_connect = true;
    echo '接続に成功しました';
    
    } catch ( PDOException $e) {
        print "接続エラー:{$e->getmessage()}";
    }

//データが入力されDBが接続されていた場合にデータを追加
if ($db_connect && $data_exists) {
    $sql = $pdo -> prepare("INSERT INTO post (name, comment) VALUES (:name, :comment)");
    $sql->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

    $name = '';
    if ($sql->execute();){
        echo 'データを追加しました';
    }
        else {
         echo 'データを追加できませんでした';
    }
}
    else {
        echo 'POSTデータが存在しません';
    }

?>

<!DOCTYPE html>
<html lang = "ja">
<html>
    <head>
       <meta charset="UTF-8">
        <title>ひとこと掲示板</title>
    </head>
    <body>
        <h1>ひとこと掲示板</h1>
        
        <form action="" method="post">
            名前：<input type="text" name="name"/><br />
            ひと言:<input type="text" name="comment" size="60" /><br />
            <input type="submit" name="submit" value="送信"/>
        </form>
        
       <h2>投稿されたデータ一覧</h2>
        <table style="border: 1px solid #000;">
        <tr>
            <th>
                投稿者
            </th>
            <th>
                コメント
            </th>
        </tr>
        <?php
        $sql = $pdo->query("SELECT * FROM post ORDER BY no ASC");
        while($row = $sql -> fetch(PDO::FETCH_ASSOC)) {
        $name = $row["name"];
        $comment = $row["comment"];
        $create_at = $row["create_at"];
echo<<<EOF

ヒアドキュメント内の表示部分

EOF;
}
?>
        </table>
    </body>
</html>