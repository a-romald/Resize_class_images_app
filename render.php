<?php

$id = $_GET['id'];
$size = $_GET['size'];

$db = new PDO('mysql:host=localhost;dbname=db1','user','password');
$sth = $db->prepare("SELECT * FROM images WHERE id = ?");
$sth->execute(array($id));
$image = $sth->fetch(PDO::FETCH_ASSOC);

if ($size = 'b') $link = $image['image_big'];
else $link = $image['image_small'];

header("Content-type: image/png");
readfile($link);

?>