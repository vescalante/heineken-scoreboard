<?php
 session_start();
 
 include('conn.php');
 include('function.php');

$username = isset($_POST["username"]) ? $_POST["username"] : "";
$password = $_POST['password'];


date_default_timezone_set("America/Mexico_City");

$sql = "SELECT * FROM `admin` WHERE `usuario` = '$username' AND `validado` = '1' AND `activo` = '1'";
$query = $conn->query($sql);

		if ($query->num_rows < 1){ 
			$response_array['status'] = 'error';
			$response_array['message'] = 'El usuario no fué encontrado';
			echo json_encode($response_array);
		}else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$accesos=$row["ingresos"]+1;
				$queryUpdate = "UPDATE `admin` SET `ingresos` =$accesos, `ultimo_acceso` =  '".date("Y-m-d H:i:s")."'  WHERE `id_admin` = {$row['id_admin']}"; 
    			$queryresult = $conn->query($queryUpdate);
				$user = $row['usuario'];
				$category = $row['categoria'];
				$id_acceso = $row['id_admin'];
				$identificador = $row['identificador'];
				$nombre_user = utf8_encode($row['nombre']." ".$row['apellido']);
			//Cargar cookies
				setcookie("USERADM",$user);
				setcookie("USERCAT",$category);
				setcookie("IDADMINADM",$id_acceso);
				setcookie("IDENTIFICADOR",$identificador);
				setcookie("USERNAME",$nombre_user);
				$_SESSION['login_admin_adm'] = 1;
				
				$response_array['status'] = 'success';
				$response_array['message'] = 'Bienvenido a su panel de administrador';
				$response_array['category'] = $category;
				echo json_encode($response_array);
			}
			else{
				$response_array['status'] = 'error';
				$response_array['message'] = 'Password incorrecto';
				echo json_encode($response_array);
			}
		}
?>