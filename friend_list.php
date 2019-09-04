<?php
	$dbh = new PDO(
    'mysql:host=db;dbname=chats',
    'myuser',
    'password'
  );
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>友達一覧</title>
  <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
  <script src="main.js"></script>
</head>
<body>
  
</body>
</html>



<?php

  $stmt = $dbh->prepare('select * from users');

  $stmt->execute();

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
  <div class="fried_list">
    <p><?=$row['name']?></p>
  </div>

<?php
  }