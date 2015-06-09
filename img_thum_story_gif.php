<?php
session_start(); 
// extract($HTTP_POST_VARS, EXTR_PREFIX_SAME, "");
// extract($HTTP_GET_VARS, EXTR_PREFIX_SAME, "");
// extract($HTTP_SESSION_VARS, EXTR_PREFIX_SAME, "");
// extract($HTTP_COOKIE_VARS, EXTR_PREFIX_SAME, "");
// extract($HTTP_SERVER_VARS, EXTR_PREFIX_SAME, "");
// extract($HTTP_POST_FILES, EXTR_PREFIX_SAME,"");
if(!isset($_REQUEST['save_dir'])){$save_dir  ="";} else {$save_dir  = $_REQUEST['save_dir'];}
if(!isset($_REQUEST['passimage'])){$passimage  ="";} else {$passimage  = $_REQUEST['passimage'];}
$imagename=$save_dir."/".$passimage;
$s_img="s_".$save_dir."/".$passimage;
$size=GetImageSize("$imagename");
$src_im = ImageCreateFromGIF("$imagename");
$width=imagesx($src_im);
$height=imagesy($src_im);
$dst_im = ImageCreate(60, 45);

$white = ImageColorAllocate($dst_im, 0, 0, 0);

ImageCopyResampled($dst_im, $src_im, 0, 0, 0, 0, 60, 45, $width, $height);
ImageGIF($dst_im,$s_img);
ImageDestroy($src_im);
ImageDestroy($dst_im);
?>