<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pagos</title>
	<link rel="stylesheet" type="text/css" href="../bt.css">
</head>
<body>

<header>
      <img src="../imagenes/portada.png" width="70%" align="center">
    </header>

    	<font face="Arial" size="3">
    <h1 align="center">Registro de adeudos</h1>

	
		<br>

	<table FRAME="void" RULES="rows" border="2" cellpadding="10%" cellspacing="70%" align="center" width="80%" >
		
		<tr align="center" bgcolor="#CBCBCB" >
			<td><b>id</b></td>
			<td><b>Matricula</b></td>
			<td><b>Semestre</b></td>
			<td><b>Grupo</b></td>
			<td><b>Campus</b></td>
			<td><b>Municipio</b></td>
			<td><b>Pago</b></td>
			<td><b>Fecha</b></td>
		</tr>

			<?php 

	include("../abrir_conexion.php");

		$result=mysqli_query($conectar,"SELECT * from adeudo");

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr align="center">
			<td><?php echo $mostrar['idAdeudo']?></td>
			<td><?php echo $mostrar['Alumno_Matricula'] ?></td>
			<td><?php echo $mostrar['Semestre'] ?></td>
			<td><?php echo $mostrar['Grupo'] ?></td>
			<td><?php echo $mostrar['Campus'] ?></td>
			<td><?php echo $mostrar['Municipio'] ?></td>
			<td>$<?php echo $mostrar['Importe'] ?>.00</td>
			<td><?php echo $mostrar['Fecha'] ?></td>


		</tr>
	<?php 
	}

	include("../cerrar_conexion.php");

	 ?>
	
	</table>
	</font>

	<br><br>

	<div align="center">
      <input type="button" class="btn" value="Regresar"  onclick="location.href='../index.html';"/>
	</div>

</body>
</html>