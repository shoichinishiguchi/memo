<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

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
  try {
    $db = new PDO('mysql:dbname=mydb; host=localhost; charset=utf8','root','root');
  } catch (PDOException $e) {
    echo 'DB接続エラー: ' . $e->getMessage();
  }

  $records =  $db->query('SELECT COUNT(*) AS record_count FROM my_items');
  while ($record = $records->fetch()){
    echo $record['record_count']."件です\n";
  }
?>
</pre>
</main>
</body>
</html>
