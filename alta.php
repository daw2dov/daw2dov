<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

if (isset($_POST['altavalidar'])) {  // controla pulsado del botón validar del formulario
		

		$altaid = isset($_POST['vid']) ? $_POST['vid'] : ''; 
   		$altanombre = isset($_POST['vnombre']) ? $_POST['vnombre'] : ''; 
   		$altatlf = isset($_POST['vtelefono']) ? $_POST['vtelefono'] : ''; 
try {

	$alta = new PDO ("mysql:host=localhost;dbname=daw2dov;charset=utf8",'root', 'root');
	$alta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmtalta = $alta->prepare('INSERT INTO empleados (id, nombre, telefono) VALUES (:id, :nombre, :telefono)');
	$stmtalta->execute(array(':id'=>$altaid, ':nombre'=>$altanombre,':telefono'=>$altatlf)); 
	header("location:menu.php");

} catch (PDOException $e) {
echo 'error: '. $e->getMessage();
	
}
}
?>

		<form name="prueba" action="" method="POST">
		<table border=1>
		<tr><th>Id</th><th>Nombre</th><th>Teléfono</th></tr>
		<tr><td><input type="text" name="vid" value='id'.'></td>
		<td><input type="text" name="vnombre" value='nombre'></td>
		<td><input type="text" name="vtelefono" value='telefono'></td></tr>
		<br>
		<tr><td><input type="submit" name="altavalidar" id="altavalidar"></td></tr>
		</table>

		</form>

</body>
</html>