<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table border=1>
<tr><th>Id</th><th>Nombre</th><th>Teléfono</th></tr>

<?php

 try {
$con = new PDO ("mysql:host=localhost;dbname=daw2dov;charset=utf8",'root', 'root');
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $con->prepare('SELECT * FROM empleados ORDER BY id'); 
$stmt->execute();

while ( $emp = $stmt->fetch(PDO::FETCH_ASSOC) ) {
	echo "<tr>";
	echo "<td>".$emp['id']."</td><td>".$emp['nombre']."</td><td>".$emp['telefono']."</td>"; 
	echo "</tr>";
}
echo "</table>";

} catch (PDOException $e) {
echo 'error: '. $e->getMessage();
}



//var_dump($stmt);

?>

</body>
</html>