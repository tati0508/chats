<?php
  session_start();
  $user_id = $_SESSION['user_id'];
  $name = $_SESSION['name'];
  $message = $_POST['send'];

  $dbh = new PDO(
    'mysql:host=db;dbname=chats',
    'myuser',
    'password'
  );

  $stmt = $dbh->prepare(
      'insert into messages(message, user_id)' .
      'values(?, ?)'
  );

  $stmt->execute([$message, $user_id]);

  header('location: form.html');