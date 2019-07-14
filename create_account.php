<?php
  $dbh = new PDO(
    'mysql:host=db;dbname=chats',
    'myuser',
    'password'
  );
  session_start();

  if($_SESSION['user_id'] == null){

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Chats</title>
  <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</head>
<body>
  <div class='contentsWrap'>
    <h2>アカウント登録</h2>
    
    <div class='createAccount'>
      <form action='register.php' method='post'>
        <lavel>ユーザーネーム</lavel><input type='text' name='user_name'><br/>
        <lavel>ログインID</lavel><input type='text' name='login_id'><br/>
        <lavel>パスワード</lavel><input type='text' name='pass'><br/>
        <lavel>再確認</lavel><input type='text' name='rePass'><br/>
        <input type="submit" value="送信">
      </form>
    </div>

  </div>
</body>
</html>

<?php
  } else {
    echo 'すでにログインしています';
    echo '<a href="index.php">戻る</a>';
    exit;
  }
