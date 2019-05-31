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
<?php
  $counts = $db -> query('SELECT COUNT(*) as cnt FROM memos');
  $count = $counts -> fetch();
  $max_page = floor($count['cnt']/5) + 1;
  if (isset($_GET['page'])&& is_numeric($_GET['page'])){
    $page = $_GET['page'];
  } else{
    $page = 1;
  }
  $start = 5 * ($page - 1);
  $memos = $db->prepare('SELECT * FROM memos ORDER BY id DESC LIMIT ?,5');
  $memos -> bindParam(1, $start, PDO::PARAM_INT);
  $memos -> execute();
?>
<article>
<?php while ( $memo = $memos -> fetch()): ?>
  <p><a href="memo.php?id=<?php echo $memo['id'];?>">
    <?php $security_memo=htmlspecialchars($memo['memo']); ?>
    <?php echo mb_substr($security_memo, 0 , 50); ?>
    <?php echo (mb_strlen($security_memo) > 50? '...': ''); ?>
  </a></p>
  <time><?php echo $memo['created_at']; ?></time>
  <hr>
<?php endwhile; ?>
<?php if ($page >= 2): ?>
<a href="index.php?page=<?php echo ($page-1); ?>"><?php echo ($page-1) ?>ページ目へ</a>
<?php endif; ?>
<span><?php echo $page."ページ"; ?></span>
<?php if($page < $max_page): ?>
<a href="index.php?page=<?php echo ($page+1); ?>"><?php echo ($page+1) ?>ページ目へ</a>
<?php endif; ?>
</article>
<a href="input.html">メモする！！</a>
</main>
</body>
</html>
