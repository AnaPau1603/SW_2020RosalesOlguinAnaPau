<?php
echo "<link rel='stylesheet' href='../../Statics/CSS/inicioSesion.css'>";
if(isset($_POST['enviar']))
{
  echo "<div id='sesion_iniciada'>
          <h1>Universidad LaBonita</h1>";
  //conteo de datos inválidos
  $datosInválidos = 0;
  //validando si se eligió colegio para determinar el tipo de usuario
  $colegio = (isset($_POST['cole']))? $_POST['cole'] : "No hay colegio";
  //recibiendo otros datos
  $nombre = (isset($_POST['nombres']) && $_POST['nombres'] != null)? $_POST['nombres'] : "Nombre inválido";
  $apPat = (isset($_POST['apPat']) && $_POST['apPat'] != null)? $_POST['apPat'] : "Apellido paterno inválido";
  $apMat = (isset($_POST['apMat']) && $_POST['apMat'] != null)? $_POST['apMat'] : "Apellido materno inválido";
  $fechaN = (isset($_POST['fNacimiento']) && $_POST['fNacimiento'] != null)? $_POST['fNacimiento'] : "Sin fecha nacimiento";
  $RFC = (isset($_POST['usuarioRFC']) && $_POST['usuarioRFC'] != null)? $_POST['usuarioRFC'] : "RFC inválido";
  $contraseña = (isset($_POST['contra']) && $_POST['contra'] != null)? $_POST['contra'] : "Sin contraseña";

  //validaciones con regex
  $validacionNombre = preg_match('/^[A-Za-záéíóúüñÁÉÍÓÚÜÑ]+( +[A-Za-záéíóúüñÁÉÍÓÚÜÑ]+)? *$/', $nombre);
  $validacionApellidoP = preg_match('/^[A-Za-záéíóúüÁÉÍÓÚÜñÑ]+ *$/',$apPat);
  $validacionApellidoM = preg_match('/^[A-Za-záéíóúüÁÉÍÓÚÜñÑ]+ *$/',$apMat);
  $validacionRFC = preg_match('/[A-Z]{4}[0-9]{6}[A-Z0-9]{3}/',$RFC);                       //aquí si funciona regex
  $validacionContraseña = preg_match('/[\w°|¬!#$%&\/()=?\'¡¿¨´*+~[\]@;,:._\-^`]{9,50}(?=\d|[A-Z]|[a-z]|[\w°|¬!#$%&\/()=?\'¡¿¨´*+~[\]@;,:._\-^`]).*/',$contraseña);

  //título de bienvenida
  if($validacionNombre && $nombre != "Nombre inválido")
  {
    echo "<h2>Bienvenido seas ".$nombre." ";
    if($validacionApellidoP && $apPat != "Apellido paterno inválido")
    {
      echo $apPat." ";
      if($validacionApellidoM && $apMat != "Apellido materno inválido")
      {
        echo $apMat."</h2>";
      }
      else
      {
        echo "</h2><p>".$apMat."</p><br>";;
        $datosInválidos++;
      }
    }
    else
    {
      if($validacionApellidoM && $apMat != "Apellido materno inválido")
      {
        echo $apMat."</h2>";
        echo "<p>".$apPat."</p><br>";
        $datosInválidos++;
      }
      else
      {
        echo "</h2><p>".$apPat."</p><br>";
        echo "<p>".$apMat."</p><br>";
        $datosInválidos=+2;
      }
    }
  }
  else
  {
    if($validacionApellidoP && $apPat != "Apellido paterno inválido")
    {
      echo "<h2>Bienvenido seas ".$apPat." ";
      if($validacionApellidoM && $apMat != "Apellido materno inválido")
      {
        echo $apMat."</h2>";
        echo "<p>".$nombre."</p><br>";
        $datosInválidos++;
      }
      else
      {
        echo "</h2><p>".$nombre."</p><br>";
        echo "<p>".$apMat."</p><br>";
        $datosInválidos=+2;
      }
    }
    else
    {
      if($validacionApellidoM && $apMat != "Apellido materno inválido")
      {
        echo "<h2>Bienvenido seas ".$apMat."</h2>";
        echo "<p>".$nombre."</p><br>";
        echo "<p>".$apPat."</p><br>";
        $datosInválidos=+2;
      }
      else
      {
        echo "<h2>Lo lamentamos...</h2>";
        echo "<p>".$nombre."</p><br>";
        echo "<p>".$apPat."</p><br>";
        echo "<p>".$apMat."</p><br>";
        $datosInválidos=+3;
      }
    }
  }

  //validacion fecha de nacimiento
  if($fechaN == "Sin fecha nacimiento")
  {
    echo "<p>".$fechaN."</p><br>";
    $datosInválidos++;
  }

  //validacion RFC
  if($validacionRFC == false || $RFC == "RFC inválido")
  {
    echo "<p>".$RFC."</p><br>";
    $datosInválidos++;
  }

  //validacion contraseña
  if($contraseña != "Sin contraseña")
  {
    if($validacionContraseña != 1)
    {
      echo "<p>Su contraseña ".$contraseña." es inválida</p><br>";
      $datosInválidos++;
    }
  }

  //validacion colegio
  if($colegio != "No hay colegio")
  {
    if($colegio == "")
    {
      echo "<p>".$colegio."</p><br>";
      $datosInválidos++;
    }
  }
}
else
{
  echo "<p>No se mandaron datos</p>";
}

$datosInválidos--;//resolviendo problema del dato inválido de más

//imprimiendo cantidad de datos inválidos...
if($datosInválidos > 0)
echo "<p>Datos inválidos: ".$datosInválidos."</p>";

///... en caso de no haber se imprimen imágenes inspiradoras :)
else {
  if($colegio != "No hay colegio")
  echo "<img src='../../Statics/Img/Profesor.jpg' alt='Profesor'>";
  else
  echo "<img src='../../Statics/Img/Funcionario.jpg' alt='Funcionario'>";
}

echo "<form id='regresar' action='../../Templates/inicioSesion.html' method='post'>
        <input type='submit' value='Regresar'>
      </form>
    </div>";
?>
