<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Alumnos</title>
	<link rel="stylesheet" type="text/css" href="../styles.css">
	
</head>

<script type="text/javascript">
  
  function ConfirmDelete(){

      var respuesta = confirm("¿Estas seguro que deseas eliminar al usuario?");

      if (respuesta==true) {
        return true;
      }else{
        return false;
      }
  }

</script>

<body>

  <form method="POST" action="Alumnos.php">

    <header>
      <img src="../imagenes/portada.png" width="70%" align="center">
    </header>

<div class="wrapper">
  <div class="content">
    <h1>Alumnos</h1>
  </div>

  <div class="form">

    <div class="top-form">
      <div class="inner-form">
        <div class="label">Matrícula:</div>
        <input type="text" name="matricula" placeholder="123456" >
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

    <div class="middle-form">
      <div class="inner-form">
        <div class="label">Nombre:</div>
        <input type="text" name="nombre" placeholder="Raul">
      </div>
    </div>
   
    <div class="top-form">
      <div class="inner-form">
        <div class="label">Apellido paterno:</div>
        <input type="text" name="paterno" placeholder="Sanchez">
      </div>
      <div class="inner-form">
        <div class="label">Ingreso:</div>
        <input type="date" name="ingreso">
      </div>
    </div>
    
  <div class="top-form">
      <div class="inner-form">
        <div class="label">Apellido materno</div>
        <input type="text" name="materno" placeholder="Jimenez">
      </div>
      <div class="inner-form">
        <div class="label">Semestre:</div>
          <select name="semact">
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
        
        <div class="label">Activo</div>

    <select name="activo">
      <option>Seleccione:</option>
        <option value="1">Si</option>
        <option value="0">No</option>
    </select>

      </div>
    </div>

    <div class="middle-form">
      <div class="inner-form">
        <div class="label">Domicilio:</div>
        <input type="text" name="domicilio" placeholder="Calle Jesus Ortega #123 ">
      </div>
      <br>
      <div class="inner-form">
        <div class="label">Colonia:</div>
        <input type="text" name="colonia" placeholder="Diaz Ordaz">
      </div>
    </div>

    <div class="top-form">
      <div class="inner-form">
        <div class="label">Tel.Celular:</div>
        <input type="text" name="telcel" placeholder="492 123 45 67">
      </div>
      <div class="inner-form">
        <div class="label">Municipio/Localidad:</div>

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
        <div class="label">Tel.Casa:</div>
        <input type="text" name="telcasa" placeholder="9235476">
      </div>
      
    </div>
    
    <div class="top-form">
      <div class="inner-form">
        <div class="label">Tel.Oficina:</div>
        <input type="text" name="telofi" placeholder="9235476">
      </div>
      <div class="inner-form">
        <div class="label">CP:</div>
        <input type="text" name="cp" placeholder="98000">
      </div>
    </div>

  <div class="bottom-form">
      
  </div>

    <input type="submit" class="btn" value="Consulta"  name="boton1">
    <input type="submit" class="btn" value="Registrar"  name="boton2">
    <input type="submit" class="btn" value="Actualizar" name="boton3">
    <input type="submit" class="btn" value="Eliminar"   name="boton4" onclick="ConfirmDelete();">
    <input type="button" class="btn" value="Regresar" onclick="location.href='../index.html';"/>

  </div>
</div>

  </form>

  <?php

    include("../abrir_conexion.php");

    $matricula = "";
    $nombre    = "";
    $paterno   = "";
    $materno   = "";
    $ingreso   = "";
    $semact    = "";
    $domicilio = "";
    $colonia   = "";
    $telcel    = "";
    $telcasa   = "";
    $telofi    = "";
    $cp        = "";
    $activo    = "";
    $municipio = "";
    $campus    = "";

 //Consulta

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
        $pagina="consulta.php?matricula=".$matricula;
        echo "<script languaje=javascript>window.location='$pagina'</script>";
      }
    }
  }

    //Registrar
  if (isset($_POST['boton2'])) {

  $matricula=$_POST['matricula'];
  $nombre   =$_POST['nombre'];
  $paterno  =$_POST['paterno'];
  $materno  =$_POST['materno'];
  $ingreso  =$_POST['ingreso'];
  $semact   =$_POST['semact'];
  $domicilio=$_POST['domicilio'];
  $colonia  =$_POST['colonia'];
  $telcel   =$_POST['telcel'];
  $telcasa  =$_POST['telcasa'];
  $telofi   =$_POST['telofi'];
  $cp       =$_POST['cp'];
  $activo   =$_POST['activo'];
  $municipio =$_POST['municipio'];
  $campus    =$_POST['campus'];
  $existe = 0;


  
    if ($matricula == "") {
      echo "<script languaje='javascript'>alert('Esta vacío, ingrese una matrícula')</script>";
    
    }else{
      $resultados = mysqli_query($conectar, "SELECT * FROM alumno WHERE matricula = '$matricula'");
      while ($consulta = mysqli_fetch_array($resultados)) {
      $existe++;
    }
      if ($existe==1) {
         echo "<script languaje='javascript'>alert('Ya existe esa matrícula')</script>";
         echo "$existe";
      }else{
        mysqli_query($conectar,"INSERT INTO alumno(Matricula, Nombre, Paterno, Materno, Ingreso, semestreActual, Domicilio, Colonia, telCel, telCasa, telOficina, CP, Activo, Municipio_Munloc, Campus_idCampus ) 
          VALUES('$matricula', '$nombre', '$paterno', '$materno', '$ingreso','$semact','$domicilio','$colonia','$telcel','$telcasa','$telofi', '$cp', '$activo', '$municipio', '$campus')");

        if (!$resultados) {
            echo "Hubo algun error";

          }else{
           echo "<script languaje='javascript'>alert('¡Registro Exitoso!')</script>";
           echo "$existe";
      }
    }
  }
}
    
      //Actualizar
  if (isset($_POST['boton3'])) {

  $matricula=$_POST['matricula'];
  $nombre   =$_POST['nombre'];
  $paterno  =$_POST['paterno'];
  $materno  =$_POST['materno'];
  $ingreso  =$_POST['ingreso'];
  $semact   =$_POST['semact'];
  $domicilio=$_POST['domicilio'];
  $colonia  =$_POST['colonia'];
  $telcel   =$_POST['telcel'];
  $telcasa  =$_POST['telcasa'];
  $telofi   =$_POST['telofi'];
  $cp       =$_POST['cp'];
  $activo   =$_POST['activo'];
  $municipio =$_POST['municipio'];
  $campus    =$_POST['campus'];
  $existe = 0;
    

    if ($matricula == "") {
      echo "<script languaje='javascript'>alert('Esta vacío, ingrese una matrícula')</script>";
    }

    else{
    
    $resultados = mysqli_query($conectar, "SELECT * FROM alumno WHERE matricula = '$matricula'");
    while ($consulta = mysqli_fetch_array($resultados)) {
      
      $existe++;
    }
      if ($existe==0) {
        
        echo "<script languaje='javascript'>alert('No existe esta matrícula')</script>";

      }else{

       $Actualizar = "UPDATE alumno Set Matricula='$matricula', Nombre='$nombre', Paterno='$paterno', Materno='$materno',Ingreso='$ingreso',semestreActual='$semact',Domicilio='$domicilio', Colonia='$colonia', telCel='$telcel',telCasa='$telcasa',telOficina='$telofi',CP ='$cp',Activo ='$activo', Municipio_Munloc='$municipio',Campus_idCampus='$campus' WHERE matricula ='$matricula'";
        mysqli_query($conectar, $Actualizar);
        

        if (!$resultados) {
            echo "Hubo algun error";

          }else{
           echo "<script languaje='javascript'>alert('Se ha actualizado con éxito')</script>";
           echo "$existe";
        }
      }
    }
  }

//Eliminar

  if (isset($_POST['boton4'])) {
    
    $matricula = $_POST['matricula'];
    $existe = 0;
     

    if ($matricula == "") {
      //echo "<script languaje='javascript'>alert('Esta vacio')</script>";
      echo "<script languaje='javascript'>alert('Esta vacío, ingrese una matrícula'); 
      location.href= Consulta.php;</script>";
    }

    else{
    
  $resultados = mysqli_query($conectar, "SELECT * FROM alumno WHERE matricula = '$matricula'");
    while ($consulta = mysqli_fetch_array($resultados)) {
      
      $existe++;

    }
      if ($existe==0) {
        echo "<script languaje='javascript'>alert('No existe esta matrícula')</script>";

      }else{

        $DELETE = "DELETE FROM alumno WHERE matricula = '$matricula'";
        mysqli_query($conectar, $DELETE);
        echo "<script languaje='javascript'>alert('Usuario eliminado con éxito')</script>";

      }
    }
  }

  include('../cerrar_conexion.php')

  ?>

</body>
</html>