<?php
  $dbh = new PDO(
    'mysql:host=db;dbname=chats',
    'myuser',
    'password'
  );
  session_start();

  if($_SESSION['user_id'] == null){
    
    $user_name = $_POST['user_name'];
    $login_id = $_POST['login_id'];
    $password = $_POST['pass'];

    $stmt = $dbh->prepare('insert into users(name, login_id, password)'
                          . 'values(?, ?, ?)');

    $stmt->execute([$user_name, $login_id, $password]);

    echo '登録完了しました';
    echo '<a href="index.php">Topへ戻る</a>';
  } else {
    echo 'すでにログインしています';
    echo '<a href="index.php">戻る</a>';
    exit;
  }
