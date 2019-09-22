<?php
$link = mysqli_connect('localhost','root','','oneline_bbs');
if(!$link){
    die('データベースに接続できません:'.mysqli_error());
}

mysqli_select_db($link,'oneline_bbs');

$errors = array();

if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $name = null;
    if (!isset($_POST['name'])||!strlen($_POST['name'])) {
        $errors['name'] = '名前を入力してください';
    }else if (strlen($_POST['name'])>40) {
        $errors['name'] = '名前は４０文字以内で入力してください';
    }else {
        $name = $_POST['name'];
    }
    
    $comment = null;
    if(!isset($_POST['comment']) || !strlen($_POST['comment'])){
        $errors['comment'] = 'ひと言を入力してください';
    } else if (strlen($_POST['comment']) > 200) {
        $errors['comment'] = 'ひと言は２００文字以内で入力してください';
    } else {
        $comment = $_POST['comment'];
    }
    
    if (count($errors) === 0) {
        
        $sql = "INSERT INTO `post`(`name`,`comment`,`created_at`)VALUES('"
            .mysqli_real_escape_string($name)."','"
            .mysqli_real_escape_string($comment)."','"
            .date('Y-m-d H:i:s') . "')";
            
        mysqli_query($link,$sql);
        
        mysqli_close($link);
        
        header('Location: http://' .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
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
        
        <form action="onelinebbs.php" method="post">
            <?php if (count($errors)): ?>
            <ul class="error_list">
                <?php foreach ($errors as $error): ?>
                <li>
                    <?php echo htmlspecialchars($error,ENT_QUOTES,'UTF-8') ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            
            名前：<input type="text" name="name"/><br />
            ひと言:<input type="text" name="comment" size="60" /><br />
            <input type="submit" name="submit" value="送信"/>
        </form>
        
        <?php
        $sql = "SELECT * FROM `post` ORDER BY 'created_at` DESC";
        $result = mysqli_query($link,$sql);
        ?>
        
        <?php if ($result !== false && mysqli_num_rows($result)): ?>
        <ul>
            <?php while($post = mysqli_fetch_assoc($result)): ?>
            <li>
                <?php echo htmlspecialchars($post['name'],ENT_QUOTES,'UTF-8'); ?>:
                <?php echo htmlspecialchars($post['comment'],ENT_QUOTES,'UTF-8'); ?>
                -  <?php echo htmlspecialchars($post['created_at'],ENT_QUOTES,'UTF-8'); ?>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
        
        <?php
        mysqli_free_result($result);
        mysqli_close($link);
        ?>
        
    </body>
</html>