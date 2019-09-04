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
    <meta charset="utf-8" />
    <title>Chats</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
  </head>
  <body>
    <div class='contentsWrap'>
      <h1>Chats</h1>

      <div class="messagesWrap">
        <h2>rooms</h2>
          <div id='result'>

          </div>
        </div>
    </div>
    
  </body>
  </html>