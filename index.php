

<?php
  $link = mysqli_connect('localhost','root','YJ674700','fav');
  $query = "SELECT * FROM music";
  $result = mysqli_query($link, $query);
  $list ='';
  while ($row = mysqli_fetch_array($result)) {
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => 'Welcome',
    'mood' => '이 노래의 분위기는 ...'
  );

  if( isset($_GET['id'])) {
    $query = "SELECT * FROM music WHERE id={$_GET['id']}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
      'title' => $row['title'],
      'mood' => $row['mood']
    );
  }

 ?>

 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MY PLAYLIST</title>
  </head>
  <body>
    <h1><a href="index.php">MY FAVOURITE SONG</a></h1>
    <ol><?= $list ?></ol>
    <a href="create.php">create</a>
    <h2><?= $article['title'] ?></h2>
    <?= $article['mood'] ?>
  </body>
</html>
