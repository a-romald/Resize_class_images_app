<?php
$db = new PDO('mysql:host=localhost;dbname=db1','user','password');
$stmt = $db->query("SELECT * FROM images");
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta charset="utf-8" />
	<meta name="author" content="romanus" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/image_window.js"></script>
	<!-- [if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
     <![endif]-->
	<title>Images</title>
</head>

<body>

<table>
<tr>
<?php 
$i=0;
foreach($images as $image) : ?>

<td style="padding:2px;">
<a class="prod_images" href="render.php?id=<?=$image['id'];?>&size=b"><img src="render.php?id=<?=$image['id'];?>&size=s" height=80 /></a>
</td>

<?php 
$i++;
if($i%7==0) { ?>
</tr><tr>
<?php }
else {} endforeach; ?>
</tr></table>

</body>
</html>