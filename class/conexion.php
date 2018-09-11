<?php
class Conectar
{
	public static function con()
	{
		$conexion = mysql_connect("localhost","","");
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db("test");
		return $conexion;
	}
}
?>
