<?php

	$host = "localhost";
	$basededatos = "feca";
	$usuario = "root";
	$clavedb = "";
	
//Conectamos con servidor
	$conectar= mysqli_connect('localhost','root','');

	//Verificar conexion

	if (!$conectar) {
		echo "No se pudo conectar con el servidor";
	}else{

		$db = mysqli_select_db($conectar, $basededatos);
		if (!$db) {
			echo "No se encontro la base de datos";
		}
	}

?>