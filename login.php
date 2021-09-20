<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"> 
	<link rel="stylesheet" type="text/css" href="styles/login.css">
	<title> Inicio de sesión </title>
</head>
<body>
	<form ACTION="<?php echo $_SERVER['PHP_SELF'];?>"METHOD="post">
	<table>
		<TR>
			<TD colspan=2 id="logo"> <img SRC="logo.png"> </TD>
		</TR>
		<TR>
			<TD> Usuario: </TD>
			<TD> <input type="text" name="user"> </TD>
		</TR>
		<TR>
			<TD> Contraseña: </TD>
			<TD> <input type="password" name="pwd"> </TD>
		</TR>
		<TR>
			<TD colspan=2> <BR> <input type="submit" value="Enviar"> </TD>
		</TR>
	</table>
	</form>
<?php
if(isset($_POST['pwd']) && isset($_POST['user'])){
	$user 	= $_POST['user'];
	$pwd	= $_POST['pwd'];
	
	// CONEXIÓN CON LA BASE DE DATOS:
	$DBuser 		= "root";
	$DBpwd 			= "1234";
	$servidor 		= "localhost";
	$basededatos 	= "hospital";

	$conexion = mysqli_connect( $servidor, $DBuser, $DBpwd ) 
			or die ("No se ha podido conectar al servidor de Base de datos");
	$db = mysqli_select_db( $conexion, $basededatos) 
	  or die ( "Error al conectar con la base de datos" );
	
	// CONSULTAS:
	$idsesion 	= "SELECT id_login FROM login WHERE user = '$user';";
	$idsesion	= mysqli_query($conexion, $idsesion);
	$idsesion 	= mysqli_fetch_row($idsesion);
	$realidsesion = $idsesion[0];
	
	$realpwd	= "SELECT pwd FROM login WHERE id_login ='$realidsesion';";
	$realpwd	= mysqli_query($conexion, $realpwd);
	$realpwd	= mysqli_fetch_row($realpwd);
	
	// VALIDACIÓN DE LA SESIÓN
	if($realidsesion != ''){
		if($pwd == $realpwd[0]){
			header("Location: form.php?sesion=$realidsesion");
		} else { echo "Contraseña incorrecta"; }
	}else{ echo "No se ha encontrado el usuario"; }
	
	mysqli_close($conexion);
}else{
	echo "Ingrese los datos requeridos";
}
?>
</body>
</html>