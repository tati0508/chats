<?php
	$dbh = new PDO(
		'mysql:host=db;dbname=chats',
		'myuser',
		'password'
		);
	
	session_start();

	$old_num = $_SESSION['old'];

	$stmt = $dbh->prepare(
		'select messages.id,  messages.message, users.name as user_name from messages join users on messages.user_id = users.id order by messages.id'
  	);
  $stmt->execute();

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		// print($row['user_name']. " : " . $row['message'] . "<br />");
		$messages[] = $row['message'];
		$numbers[] = $row['id'];
	}

	// print_r($messages);
	// print_r($numbers);
	// print_r($_SESSION['old']);

	if(isset($_SESSION['old'])){
		// print('okay<br/>');
		$old_num = $_SESSION['old'];
    $newItems = array_diff($numbers, $old_num);
    $_SESSION['old'] = $numbers;
    foreach($newItems as $key){
			$stmt = $dbh->prepare(' select messages.message, users.name as user_name from messages join users on messages.user_id = users.id where messages.id = ?;');
			$stmt->execute([$key]);
			while($rowM = $stmt->fetch(PDO::FETCH_ASSOC)){
				print($rowM['user_name'] . " : " . $rowM['message'] . "<br/>");
			}
    }
  } else {
		// print("not okay" . "<br/>");
		if(isset($numbers)){
			foreach($numbers as $key){
				$stmt = $dbh->prepare(' select messages.message, users.name as user_name from messages join users on messages.user_id = users.id where messages.id = ?;');
				$stmt->execute([$key]);
				while($rowM = $stmt->fetch(PDO::FETCH_ASSOC)){
					print($rowM['user_name'] . " : " . $rowM['message'] . "<br/>");
				}
				$_SESSION['old'] = $numbers;
			}
		} else {

			$stmt = $dbh->prepare(
							'insert into messages(message, user_id)' .
							'values("さぁChatsを始めましょう！", 1)'
						);
	
			$stmt->execute();
		}
  }