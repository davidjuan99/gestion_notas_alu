<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
  <link href="../css/fontawesome-free-5.15.0-web/css/all.css" rel="stylesheet">
  <script src="../js/code.js"></script>
</head>
<body>
    <?php
    require_once "./alumnoDAO.php";
    require_once "./notasDAO.php";
    $alumnodao = new AlumnoDao();
    $alumno = $alumnodao->lecturamodi($_GET['id_alumno']);
    $notadao = new NotaDao();
    $notas = $notadao->notas();
    if (isset($_POST['nota0'])) {
    	$notaact= new NotaDao();
    	$actualizar=$notaact->update();
    }

    ?>
<h2 style="text-align: center;">Modificar Alumno</h2>
<div class="row">
    <div class="form">
      <form action="actualizar.php" method="POST" onsubmit="return validacionForm1()">
      	<input type="hidden" name="id_alumno" value="<?php echo $_GET['id_alumno'];?>">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" value="<?php echo $alumno['nombre_alumno'];?>" disabled><br>
        <label>1r apellido:</label><br>
        <input type="text" name="apellidop" id="apellidop" value="<?php echo $alumno['apellido1_alumno'];?>" disabled><br>
        <label>2nd apellido:</label><br>
        <input type="text" name="apellidom" id="apellidom" value="<?php echo $alumno['apellido2_alumno'];?>" disabled><br>
        <label>Grupo:</label><br>
        <input type="text" name="grupo" id="grupo" value="<?php echo $alumno['grupo_alumno'];?>" disabled><br>
        <label>Email:</label><br>
        <input type="email" name="email" id="email" value="<?php echo $alumno['email_alumno'];?>" disabled><br>
        <?php
        $i=0;
        foreach ($notas as $nota) {
          echo "<label>".$nota['nombre_materia']."</label><br>";
          echo "<input type='text' name='nota".$i."' id='nota' value='".$nota['nota']."' required><br>";
          $i++;
          }
         ?>
        <input type="submit" value="Submit" name="b_actualizar">
      </form> 
    </div>
</div>

</body>
</html>
