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
		<title>Chats</title>
		<meta charset="UFT-8">  
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class='contentsWrap'>

<?php
    if($_SESSION['user_id'] == null) {
        
?>
	<div class='loginWrap'>
		<h2>ログイン</h2>
		<form action='login.php' method='post'>
				<input type='text' name='login_id'><br />
				<input type="text" name='password'>
				<input type='submit' value='ログイン'>
		</form>
		<a href='create_account.php'>新規登録はこちら</a>
	</div>

<?php
    }else{
        $user_id = $_SESSION['user_id'];
        $name = $_SESSION['name'];
?>
		<script type="text/javascript" src="ajax.js"></script>
		
		<h1>Chats</h1>

		<iframe src="form.html" width='250' height="50" id='iframe'></iframe>
		
		<div class="messagesWrap">
			<h2>messages</h2>

			<!-- DBから持ってきたメッセージを表示させるdiv -->
			<div id='result'>

<?php
	$stmt = $dbh->prepare('select messages.id,  messages.message, users.name as user_name from messages join users on messages.user_id = users.id order by messages.id');
	$stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
		<span><?=($row['user_name'] . " : " . $row['message'] . "<br/>");?></span>
<?php
	}

?>
			</div> 
		</div>
		
<?php
	}
	
?>
		</div>
	</body>
</html>
