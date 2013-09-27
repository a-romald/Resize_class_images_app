<?php 
require_once 'resize.class.php';

$db = new PDO('mysql:host=localhost;dbname=db1','user','password');

if (isset($_POST['submit'])) {
    
    $title = $_POST['title'];
    
    $resize = new Resize();
    // Working with images
    if (!empty($_FILES['images']['tmp_name'][0]))
    {
        $file = array();
        $i = 0;
        $images = array();
        foreach ($_FILES['images']['name'] as $img)
        {
            $ext = strrchr($img, "."); 
            $image = 'images/big/'.substr($img, 0, -4)."-".date("YmdHis",time())."$ext";
            $small_image = 'images/thumb/'.substr($img, 0, -4)."-".date("YmdHis",time())."_s$ext";
            $file['tmp_name'] = $_FILES['images']['tmp_name'][$i];
            
            if (copy($file['tmp_name'], $image)) {
                // Change rights to file
                chmod($image, 0644);
            }
            $resize->resizeimg($image, $small_image, 120, 120);
            
            $images[$i]['image_big'] = $image;
            $images[$i]['image_small'] = $small_image;
            
            $i++;
        }
        //Fill table images with links to images
        $row = $db->prepare("INSERT INTO images (title, image_big, image_small) VALUES (:title, :image_big, :image_small)");
        $row->bindParam('title', $title);
        $row->bindParam('image_big', $image_big);
        $row->bindParam('image_small', $image_small);
        foreach ($images as $key => $pict) {
            //$title = $pict['title'];
            $image_big = $pict['image_big'];
            $image_small = $pict['image_small'];
            $row->execute();
        }
        //Unlink temporary files
        foreach ($_FILES['images']['tmp_name'] as $f) {
            unlink($f);
        }
        echo 'Images are successfully uploaded.<br><a href="form_upload.php">Back to form</a>'; 
        
    }
    
    
}

?>