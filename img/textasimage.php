<?php
/*Script permettant d'afficher un email sous forme d'image, pour éviter aux scanner de découvrir trop facilement les adresses mail

* http://cornerstone.local/wp-content/themes/cornerstone-child-theme/img/textasimage.php?ad=pharmacaluire2&do=gmail.com
*/


$adresse=$_GET['ad'];
$domaine=$_GET['do'];
$text = $adresse.'@'.$domaine;

header("Content-type: image/png");
$im = @imagecreate(200, 20)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 255, 255, 255);
$text_color = imagecolorallocate($im, 15, 15, 15);
imagestring($im, 2, 5, 5,  $text, $text_color);
imagepng($im);
imagedestroy($im);