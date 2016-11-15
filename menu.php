
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
session_start();
if ( isset($_SESSION['usuario']) ) {
	$user=$_SESSION['usuario'];
	


	echo 'Bienvenido a la página de prueba: '. $user.'<br>';



	    
	    if (!isset($_COOKIE[$user])) {
	    	echo 'Primer acceso a la página con este usuario';
	    	setcookie($user, 1, time()+3600);
	    	

	    }
	    else {

			
			setcookie($user, $_COOKIE[$user]+1, time()+3600);
			echo "Ha entrado en la página: ". $_COOKIE[$user] . " veces";
		}

	echo'<ul>';
		echo'<li>Consulta</li>';
		include "consulta.php";

}

/*session_unset();	
session_destroy();
echo '<br>';
echo 'Prueba cierre sesion: '.$_SESSION['usuario'];*/


?>
	<br>
	<li>Alta</li>
	<?php include "alta.php" ?>
	<li>Baja</li>
	<?php include "baja.php" ?>
	<li>Modificación</li>
	<?php include "modificacion.php" ?>
	<br>
	<a href="index.php"><li>Ir a inicio</li></a>

</ol>
</body>
</html>