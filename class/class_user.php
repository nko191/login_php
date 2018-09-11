<?php
session_start();
require_once("conexion.php");
class usuario
{


	public function nueva_sesion()
	{
		$nombre = $_POST['nom'];
		$password = $_POST['pass'];
	    $query = "SELECT * FROM username WHERE username='".strip_tags($nombre)."' AND password='".strip_tags($password)."';";
		$resultado = mysql_query($query,Conectar::con());

		if ($reg=mysql_num_rows($resultado) == 0)
		{
			header("Location:index.php?usuario=no_existe");
		}else{
			
		}
			if($reg=mysql_fetch_array($resultado))
				{
					$_SESSION['nick'] = $reg['username'];	
					header("Location:../../index.php");
				}
	}
}
?>
