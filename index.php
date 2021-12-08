<?php  
	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('Location: login.php');
	}elseif(isset($_SESSION['nombre'])){
		include 'model/conexion.php';
		$sentencia = $bd->query("SELECT * FROM alumno;");
		$alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
		//print_r($alumnos);
	}else{
		echo "Error en el sistema";
	}


	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista de alumnos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="index.css">
</head>
<body>
	<center>
		<h1>Bienvenido: <?php echo $_SESSION['nombre'] ?></h1>
		<a href="cerrar.php" class="alto"> <b>Cerrar Sesión</b></a>
		<h3>Lista de Alumnos</h3>
		<table>
			<tr>
				<td><b> Código</b></td>
				<td><b>Apellido paterno</b></td>
				<td><b>Apellido materno</b></td>
				<td><b>Nombre</b></td>
				<td><b>Parcial</b></td>
				<td><b>Final</b></td>
				<td><b>Promedio</b></td>
				<td class="asul"><b>Editar</b></td>
				<td class="a"><b>Eliminar</b></td>
			</tr>

			<?php 
				foreach ($alumnos as $dato) {
					?>
					<tr>
						<td><?php echo $dato->id_alumno; ?></td>
						<td><?php echo $dato->ap_paterno; ?></td>
						<td><?php echo $dato->ap_materno; ?></td>
						<td><?php echo $dato->nombre; ?></td>
						<td><?php echo $dato->ex_parcial; ?></td>
						<td><?php echo $dato->ex_final; ?></td>
						<td><?php echo ($dato->ex_final + $dato->ex_parcial)/2; ?></td>
						<td><a href="editar.php?id=<?php echo $dato->id_alumno; ?>"class="asul">Editar</a></td>
						<td><a href="eliminar.php?id=<?php echo $dato->id_alumno; ?>"class="a">Eliminar</a></td>
					</tr>
					<?php
				}
			?>
			
		</table>

		<!-- inicio insert -->
		<hr>
		<h3>Ingresar alumnos:</h3>
		<form method="POST" action="insertar.php">
			<table>
				<tr>
					<td>Apellido paterno: </td>
					<td><input type="text" name="txtPaterno"></td>
				</tr>
				<tr>
					<td>Apellido materno: </td>
					<td><input type="text" name="txtMaterno"></td>
				</tr>
				<tr>
					<td>Nombre: </td>
					<td><input type="text" name="txtNombre"></td>
				</tr>
				<tr>
					<td>Nota parcial: </td>
					<td><input type="text" name="txtParcial"></td>
				</tr>
				<tr>
					<td>Nota final: </td>
					<td><input type="text" name="txtFinal"></td>
				</tr>
				<input type="hidden" name="oculto" value="1">
				<tr>
					<td><input type="reset" name=""></td>
					<td><input type="submit" value="INGRESAR ALUMNO"></td>
				</tr>
			</table>
		</form>
		<!-- fin insert-->

	</center>
</body>
</html>