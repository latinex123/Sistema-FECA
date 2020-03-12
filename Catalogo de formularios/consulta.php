<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mostrar datos</title>
  <link rel="stylesheet" type="text/css" href="../bt.css">
</head>
<body>
  <font face="Arial" size="3">

  
    <header>
      <img src="../imagenes/portada.png" width="70%" align="center">
    </header>
  

<br>
  <table FRAME="void" RULES="rows" border="2" cellpadding="10%" cellspacing="70%" align="center" width="100%" >
    
    <tr bgcolor="#CBCBCB" align="center">
      
      <td>Matricula</td>
      <td>Nombre</td>
      <td>A Paterno</td>
      <td>A Materno</td>
      <td>Ingreso</td>
      <td>S Actual</td>
      <td>Domicilio</td>
      <td>Colonia</td>
      <td>T Celular</td>
      <td>T Casa</td>
      <td>T Oficina</td>
      <td>CP</td>
      <td>Activo</td>
      <td>Mun/Loc</td>
      <td>Campus</td>
    </tr>

      <?php 

    $matricula = $_GET['matricula'];
    include("../abrir_conexion.php");

    $result=mysqli_query($conectar, "SELECT * FROM alumno WHERE matricula = '$matricula'");

    while($mostrar=mysqli_fetch_array($result)){
     ?>

    <tr align="center">
      <td><?php echo $mostrar['Matricula']?></td>
      <td><?php echo $mostrar['Nombre']?></td>
      <td><?php echo $mostrar['Paterno']?></td>
      <td><?php echo $mostrar['Materno']?></td>
      <td><?php echo $mostrar['Ingreso']?></td>
      <td><?php echo $mostrar['semestreActual']?></td>
      <td><?php echo $mostrar['Domicilio']?></td>
      <td><?php echo $mostrar['Colonia']?></td>
      <td><?php echo $mostrar['telCel']?></td>
      <td><?php echo $mostrar['telCasa']?></td>
      <td><?php echo $mostrar['telOficina']?></td>
      <td><?php echo $mostrar['CP']?></td>
      <td><?php echo $mostrar['Activo']?></td>
      <td><?php echo $mostrar['Municipio_Munloc']?></td>
      <td><?php echo $mostrar['Campus_idCampus']?></td>

    </tr>
  <?php 
  }
    include("../cerrar_conexion.php");
   ?>
  
  </table>
  </font><br><br>

      <div class="bottom-form">
   </div>
    
    <div align="center">
        <input type="submit" class="btn" value="Enviar" name="boton1">
        <input type="button" class="btn" value="Regresar"  onclick="location.href='../index.html';"/>
    </div>

  </div>
</div>

</body>
</html>