<?php
    session_start();

    $dbh = new PDO(
        'mysql:host=db;dbname=chats',
        'myuser',
        'password'
    );

    $login_id = $_POST['login_id'];
    $pass = $_POST['password'];

    $stmt = $dbh->prepare(
        'select * from users'
    );

    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        if($row['login_id'] == $login_id){
            if($row['password'] == $pass){
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                header('location:index.php');
            } else {
                echo 'パスワードが間違っています';
                echo '<a href="index.php">topへ戻る</a>';
                exit;
            }
        }
    }

    echo 'ログインIDが間違っています';
    echo '<a href="index.php">topへ戻る</a>';