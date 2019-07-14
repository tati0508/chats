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
		<meta charset="UFT-8">  
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="ajax.js"></script>
	</head>
	<body>
		<div class='contentsWrap'>

<?php
    if($_SESSION['user_id'] == null) {
        
?>

		<form action='login.php' method='post'>
				<input type='text' name='login_id'><br />
				<input type="text" name='password'>
				<input type='submit' value='ログイン'>
		</form>

<?php
    }else{
        $user_id = $_SESSION['user_id'];
        $name = $_SESSION['name'];
?>

		<h1>chat</h1>

		<iframe src="form.html" width='250' height="50" id='iframe'></iframe>
		
		<div class="messagesWrap">
			<h2>messages</h2>

			<!-- DBから持ってきたメッセージを表示させるdiv -->
			<div id='result'></div> 
		</div>
		
<?php
	}
	
?>
		</div>
	</body>
</html>
