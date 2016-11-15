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
echo '<form name="listabaja" action="" method="POST">';
echo "<select name='eleccionbaja'>";

while ( $emp = $stmt->fetch(PDO::FETCH_ASSOC) ) {
	
	
	echo "<option value=".$emp['id'].">".$emp['id']."</option>";
	//echo $emp['id'];
	

}
echo "</select>";
//echo "probando".$select;
echo '<input type="submit" name="validarbaja" id="validarbaja">';
echo '</form>';

} catch (PDOException $e) {
echo 'error: '. $e->getMessage();
}


if (isset($_POST['validarbaja'])) { 
	$vid = isset($_POST['eleccionbaja']) ? $_POST['eleccionbaja'] : ''; 
	
	$stmtbaja = $con->prepare('DELETE FROM empleados WHERE id=:vid'); 
	$stmtbaja->execute(array(':vid'=>$vid));
	header("location:menu.php");
}

?>


</body>
</html>