<?php require('dbconnect.php'); ?>
<?php require('dbconnect.php'); ?>
<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="style.css">

<title>よくわかるPHPの教科書</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">よくわかるPHPの教科書</h1>
</header>

<main>
<h2>Practice</h2>
<pre>
<?php

  $statment = $db -> prepare('INSERT INTO memos SET memo=?, created_at=NOW()');
  $statment -> bindParam(1, $_POST['memo']);
  $statment -> execute();
  echo 'メッセージが登録されました。'
?>
<a href="input.html">戻る</a>
</pre>
</main>
</body>
</html>
