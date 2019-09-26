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
    $sql = $pdo->prepare ( 'insert into post (name, comment) values (?, ?)' );
    if ($sql->execute([$name, $comment])) {
        echo 'データを追加しました。';
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
        
        <form method="POST">
    <label for="">
        名前
    </label>
    <input type="text" name="name"/>
    <label for="">
        コメント
    </label>
    <input type="textarea" name="comment"/>
    <input type="submit" value="投稿する"/>
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
         <?php foreach ( $pdo->query ( 'select * from post' ) as $row) :?>
        <tr>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['comment'] ?></td>
        </tr>
    <?php endforeach; ?>
        </table>
    </body>
</html>