<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

if (isset($_POST['modifivalidar'])) { 
		$modid = isset($_POST['id']) ? $_POST['id'] : ''; 
   		$modnombre = isset($_POST['nombre']) ? $_POST['nombre'] : ''; 
   		$modtlf = isset($_POST['telefono']) ? $_POST['telefono'] : ''; 
		echo "AAAA".$modnombre;
		echo "BBBB".$modtlf;
		echo "ddddd".$modid;
		

	try {

		$conmod = new PDO ("mysql:host=localhost;dbname=daw2dov;charset=utf8",'root', 'root');
		$conmod->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$modifi = $conmod->prepare('UPDATE empleados SET nombre=:nombre, telefono=:telefono WHERE id=:id'); 
		$modifi->execute(array(':id'=>$modid, ':nombre'=>$modnombre,':telefono'=>$modtlf)); 
		header("location:menu.php");

	} catch (PDOException $e) {
	echo 'error: '. $e->getMessage();
		
	}
}

?>





</body>
</html>