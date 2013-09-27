<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="Description" content="" />
		<meta name="Keywords" content="" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>        
        <script type="text/javascript" src="js/jquery.MultiFile.pack.js"></script>
        <link type="text/css" href="css/forms.css" rel="stylesheet" />		
        <link type="text/css" href="css/multiFile.css" rel="stylesheet" />
		<title>Upload images</title>
	</head>
	<body>
    <h3>Upload images</h3>

<div>

<form action="upload_images.php" method="post" enctype="multipart/form-data">
<label for="title">Title of images:</label><input type="text" name="title" value="" /><br /><br />
<label for="images">Upload images</label><input type="file" name="images[]" maxlength="5" accept="jpg|gif|png" class="multi" /><br /><br />
<input type="submit" name="submit" value="Upload" /><br />

</form>
<br />
<a href="catalog.php">Catalog</a>
</div>	
</body>
</html>