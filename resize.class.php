<?php

class Resize
{
  /**
   * 
   * Method creates a smaller copy of the image $big that places into
   * file $small. This smaller copy has width and height equal to
   * $width и $height pixels respectively. These are maximal possible
   * values. They will be recounted to save proportions of the
   * scaled image.
   * 
   * Scaling image with function imagecopyresampled() 
   * $dest_img - reduced copy 
   * $src_img - original image 
   * $width - width of reduced copy
   * $height - height of reduced copy         
   * $size_img[0] - width of original image 
   * $size_img[1] - height of original image 
   *  
   */
  function resizeimg($big, $small, $width, $height) 
  { 
    // Define rate of compression of image that will be generated 
    $ratio = $width / $height; 
    // Get size of the origin image 
    $size_img = getimagesize($big); 
    list($width_src, $height_src) = getimagesize($big); 
    // If size smaller, scale not needed 
    if (($width_src<$width) && ($height_src<$height))
    {
      copy($big, $small);
      return true; 
    }
    // Get rate of compression of the original image
    $src_ratio=$width_src/$height_src; 

    // Calculate size of the smaller copy to preserve proportions 
    // of the original image when scaling 
    if ($ratio<$src_ratio) 
    { 
      $height = $width/$src_ratio; 
    } 
    else 
    { 
      $width = $height*$src_ratio; 
    } 
    // Create empty image with defined size 
    $dest_img = imagecreatetruecolor($width, $height);   
    $white = imagecolorallocate($dest_img, 255, 255, 255);        
    if ($size_img[2]==2)  $src_img = imagecreatefromjpeg($big);                       
    else if ($size_img[2]==1) $src_img = imagecreatefromgif($big);                       
    else if ($size_img[2]==3) $src_img = imagecreatefrompng($big); 

    imagecopyresampled($dest_img, 
                       $src_img, 
                       0, 
                       0, 
                       0, 
                       0, 
                       $width, 
                       $height, 
                       $width_src, 
                       $height_src);
    // Save reduced cope to file 
    if ($size_img[2]==2)  imagejpeg($dest_img, $small);                       
    else if ($size_img[2]==1) imagegif($dest_img, $small);                       
    else if ($size_img[2]==3) imagepng($dest_img, $small); 
    // Clear memory from created images
    imagedestroy($dest_img); 
    imagedestroy($src_img); 
    return true;          
  }
  
  
}   
?>