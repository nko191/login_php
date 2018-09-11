<?php 
require_once '../class/class_user.php'; 
$reg = new usuario;
include_once "clear.php";
$reg->register(clear($_POST['username']), clear($_POST['password']), clear($_POST['repeatpassword']), clear($_POST['email']), clear($_POST['fullname']));
echo $reg->checkreg();
?>