?php
session_start();
session_destroy();
echo"<script type='text/javascript'>
	 alert('La sesi�n fu� cerrada correctamente');
	window.location='nueva_sesion.php';
	</script>";
?>


