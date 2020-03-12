<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>R Adeudos</title>
  <link rel="stylesheet" href="../styles.css">
  
</head>
<body>

  <form method="POST" action="Adeudos.php">

    <header>
      <img src="../imagenes/portada.png" width="70%" align="center">
    </header>
  
<div class="wrapper">
  <div class="content">
    <h1>Registro de adeudos</h1>
  </div>

  <div class="form">


 <div class="top-form">
      <div class="inner-form">
        <div class="label">Matrícula:</div>
        <input type="text" name="matricula" placeholder="123456">
      </div>
      <div class="inner-form">
        <div class="label">Semestre:</div>
        <select name="semestre">
      <option>Seleccione:</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
    </select>

      </div>
      <div class="inner-form">
        <div class="label">Campus:</div>
       
       <select name="campus">
          <option value="0">Seleccione:</option>

           <?php
           include("../abrir_conexion.php");
          $query = $conectar -> query ("SELECT * FROM campus");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[idCampus].'">'.$valores[Descripcion].'</option>';
          }
        ?>


        </select>

      </div>
  </div>

  <div class="top-form">
      <div class="inner-form">
        <div class="label">Fecha:</div>
        <input name="fechade" type="date">
      </div>
      <div class="inner-form">
        <div class="label">Importe:</div>
        <input type="text" name="importe" placeholder="135">
      </div>

      <div class="inner-form">
        <div class="label">Municipio:</div>
      
        <select name="municipio">
          <option value="0">Seleccione:</option>

           <?php
           include("../abrir_conexion.php");
          $query = $conectar -> query ("SELECT * FROM municipio");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[Munloc].'">'.$valores[Descripcion].'</option>';
          }
        ?>

        </select>
      </div>
  </div>

  <div class="top-form">
      <div class="inner-form">
        <div class="label">Grupo:</div>
        <input name="grupo" type="text" placeholder="3F">
      </div>  
  </div>
   
 
  <div class="bottom-form">
      </div>

    <input type="submit" class="btn" value="Enviar" name="boton1">
    <input type="button" class="btn" value="Regresar" onclick="location.href='../index.html';"/>

      </div>
  </div>

</form>

<?php

    include("../abrir_conexion.php");

    $matricula = "";
    $semestre ="";
    $importe = "";
    $fechade ="";
    $municipio="";
    $campus="";
    $grupo="";
    
    

//Validacion matricula
if (isset($_POST['boton1'])) {

    $matricula= $_POST['matricula'];
    $importe = $_POST['importe'];
    $fechade =$_POST['fechade'];
    $municipio=$_POST['municipio'];
    $campus=$_POST['campus'];
    $grupo=$_POST['grupo'];
    $semestre=$_POST['semestre'];
    $existe = 0;
     
 if ($matricula == "") {
      echo "<script languaje='javascript'>alert('Esta vacío, ingrese una matrícula')</script>";
    
    }else{
      $resultados = mysqli_query($conectar, "SELECT * FROM alumno WHERE matricula = '$matricula'");
      while ($consulta = mysqli_fetch_array($resultados)) {
      $existe++;
    }
      if ($existe==1) {

        mysqli_query($conectar,"INSERT INTO adeudo(idAdeudo, Semestre, Grupo, Importe, Fecha, Campus, Municipio, Alumno_Matricula)
         VALUES('','$semestre', '$grupo', '$importe','$fechade', '$campus', '$municipio','$matricula')");

         echo "<script languaje='javascript'>alert('Registro Exitoso')</script>";
           echo "$existe";


      }else{
       
       echo "<script languaje='javascript'>alert('No existe esta matrícula')</script>";
         echo "$existe";      
      }
    } 
  }

 include("../cerrar_conexion.php");

  ?>

</body>
</html>