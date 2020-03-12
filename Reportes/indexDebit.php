<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
	<form method="POST" action="indexDebit.php">

     <header>
      <img src="../imagenes/portada.png" width="70%" align="center">
    </header>
<br>
  <div align="center">
	   Ingresa la matrícula:
	   <input type="text" name="matricula">


<input type="submit" class="btn" value="Enviar"  name="boton1">
<input type="button" class="btn" value="Regresar" onclick="location.href='../index.html';"/>

  </div>

<?php

$matricula = "";
include("../abrir_conexion.php");


//Validar matricula

 if (isset($_POST['boton1'])) {

    $matricula= $_POST['matricula'];
    $existe = 0;
     

    if ($matricula == "") {
      
      echo "<script languaje='javascript'>alert('Esta vacío, ingrese una matrícula'); </script>";
    }

    else{
    
  $resultados = mysqli_query($conectar, "SELECT * FROM alumno WHERE matricula = '$matricula'");
    while ($consulta = mysqli_fetch_array($resultados)) {
    
    $existe++; 
  }
      if ($existe==0) {
        echo "<script languaje='javascript'>alert('No existe esta matrícula')</script>";

      }else{
        $pagina="pdf/indexAdeudo.php?matricula=".$matricula;
        //echo "<script languaje=javascript>window.location='$pagina'</script>";
        echo "<script languaje=javascript>window.open('$pagina','','width=800,height=900,left=50,top=50,toolbar=yes')</script>";
      }
    }
  }
    include("../cerrar_conexion.php");
?>

</body>
</html>