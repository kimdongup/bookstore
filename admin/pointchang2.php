<?php
if(!isset($_REQUEST['mod'])){$mod2  ="";} else {$mod2  = $_REQUEST['mod'];}
if(!isset($_REQUEST['ordernum'])){$ordernum2  ="";} else {$ordernum2  = $_REQUEST['ordernum'];}
session_start();
$_SESSION['mod2']= $mod2 ;
$_SESSION['ordernum2']= $ordernum2 ;
?>
<meta http-equiv='Refresh' content='0; URL=pointchang.php'>