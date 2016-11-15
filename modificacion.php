<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

 try {
$con = new PDO ("mysql:host=localhost;dbname=daw2dov;charset=utf8",'root', 'root');
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $con->prepare('SELECT id FROM empleados'); 
$stmt->execute();
echo '<form name="lista" action="" method="POST">';
echo "<select name='eleccion'>";

while ( $emp = $stmt->fetch(PDO::FETCH_ASSOC) ) {
	
	
	echo "<option value=".$emp['id'].">".$emp['id']."</option>";
	//echo $emp['id'];
	

}
echo "</select>";
//echo "probando".$select;
echo '<input type="submit" name="validar" id="validar">';
echo '</form>';

} catch (PDOException $e) {
echo 'error: '. $e->getMessage();
}


if (isset($_POST['validar'])) { 
	$vid = isset($_POST['eleccion']) ? $_POST['eleccion'] : ''; 
	
	$stmt2 = $con->prepare('SELECT * FROM empleados WHERE id=:vid'); 
	$stmt2->execute(array(':vid'=>$vid));

	while ( $emp = $stmt2->fetch(PDO::FETCH_ASSOC) ) {

		echo '<form name="prueba" action="modificacion2.php" method="POST">';

		echo'<h3>Datos</h3>';
		echo '<table border=1>';
		echo '<tr><th>Id</th><th>Nombre</th><th>Teléfono</th></tr>';
		//echo '<tr><td>'.$_POST["eleccion"].'</td>';
		//echo '<tr><td>'.$vid.'</td>';
		echo '<td><input type="text" name="id" value='.$vid.'></td>';
		echo '<td><input type="text" name="nombre" value='.$emp['nombre'].'></td>';
		echo '<td><input type="text" name="telefono" value='.$emp['telefono'].'></td></tr>';
		//echo '<br>';
		
		echo "</table>";

		echo '<tr><td><input type="submit" name="modifivalidar" id="modifivalidar"></td></tr>';
		echo '</form>';
		
	}
		
}




?>


</body>
</html>