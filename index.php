<?php


//session_destroy('usuario');
session_start();
session_unset();

$user ='';
$pass ='';

	if (isset($_POST['validar'])) {  // controla pulsado del botón validar del formulario
		

		$user = isset($_POST['user']) ? $_POST['user'] : ''; 
   		$pass = isset($_POST['pass']) ? $_POST['pass'] : ''; 

   		if (empty($user)){
   			echo "No has introducido usuario <br>"; 
   		}
   		if (empty($pass)){
   			echo "No has introducido contraseña <br>"; 
   		}

	
			//función con sólo un array para un sólo usuario

			/*function validacion ($user, $pass){
				echo "validando";
				$entrar = array ('usuario'=> 'david', 'contra'=>'9b3ad7d3ded8f31a7155caaf67a437b6');
				if ($user == $entrar['usuario'] && md5($pass) == $entrar['contra']){
					echo 'acceso correcto';
				}
				else {
					echo 'contraseña incorrecta';
				}

			}*/

			function validacion ($user, $pass){
				//echo md5($pass);
				$entrar = array ( 
					'david' => array ('usuario'=> 'david', 'contra'=> '9b3ad7d3ded8f31a7155caaf67a437b6'), //ovejero
					'root' => array ('usuario'=> 'root', 'contra'=> '63a9f0ea7bb98050796b649e85481845') //root
				);
				foreach ($entrar as $key => $value) {

					//echo $value['usuario'];
					//echo $value['contra'];

					if ($user == $value['usuario'] && md5($pass) == $value['contra']){
						
						$logado=true;
						break;
						//echo 'entra en si';
						
					}
					else{
						$logado=false;
						//echo 'entra en no';
						//echo "Validación incorrecta";
						
						
					}
				}
				return $logado;
			};
			$logado= validacion ($user, $pass);
			//llama a la función de validar pasándole el usuario y contraseña
			//$logado = validacion ($user, $pass);
			
			if ( $logado == true ) {   
			   header("location:menu.php");
						$_SESSION['usuario']=$user;
			   
			   
			}	
			else  {
			   echo "Validación incorrecta";
			};

	};

?>



<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Ejer Examen</title>
</head>
<body>
<form name="prueba" action="" method="POST">

	<h1>Login</h1>
	Usuario: <input type="text" name="user" value="<?php echo $user; ?>"><br />
	Contraseña: <input type="text" name="pass" value="<?php echo $pass; ?>"><br />
	<br>
	<input type="submit" name="validar" id="validar">


</form>
</body>
</html>

