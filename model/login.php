<?php 
require_once '../class/class_user.php'; 

include_once "clear.php";
$usuario = new usuario(clear($_POST['nom']), clear($_POST['pass']));
echo $usuario->checklog();
?>