<?php
echo "<link rel='stylesheet' href='../../Statics/CSS/inicioSesion.css'>";
if(isset($_POST['enviar']))
{
  //recibiendo tipo de usuario seleccionado
  $tipoUsuario = (isset($_POST['tipoUsuario']))? $_POST['tipoUsuario'] : "No se eligió tipo de usuario :C";

  //Form para ambos tipos de usuario
  echo "<div id='inicio_usuarios'>
          <h1>Universidad LaBonita</h1>
          <form action='validacionUsuario.php' method='POST'>
            <fieldset>
              <legend><h3>Ingreso de docentes:</h3></legend>
              <label for='nombres'>Nombre(s):</label>
              <input type='text' id='nombres' name='nombres' title='Máximo 2 nombres' pattern='^[A-Za-záéíóúüñÁÉÍÓÚÜÑ]+( +[A-Za-záéíóúüñÁÉÍÓÚÜÑ]+)? *$'><br><br>
              <label for='apPat'>Apellido Paterno:</label>
              <input type='text' id='apPat' name='apPat' title='Solo un apellido' pattern='^[A-Za-záéíóúüÁÉÍÓÚÜñÑ]+ *$'><br><br>
              <label for='apMat'>Apellido Materno:</label>
              <input type='text' id='apMat' name='apMat' title='Solo un apellido' pattern='^[A-Za-záéíóúüÁÉÍÓÚÜñÑ]+ *$'><br><br>
              <label for='fNacimiento'>Fecha de nacimiento:</label>
              <input type='date' id='fNacimiento' name='fNacimiento'><br><br>
              <label for='usuarioRFC'>Usuario(RFC):</label>
              <input type='text' id='usuarioRFC' name='usuarioRFC' title='Formato RFC' pattern='[A-Z]{4}[0-9]{6}[A-Z0-9]{3}'><br><br>
              <label for='contra'>Contraseña:</label>
              <input type='password' id='contra' name='contra'><br><br>";

  if($tipoUsuario == "profesor")
  {
    //En caso de ser profesor solo se agrega select de colegios
      echo "  <label for='cole'>Colegio:</label>
              <select id='cole' name='cole'>
                <option value='' >--Seleccione una opción--</option>
                <option id='cole' value='fisica'>Física</option>
                <option id='cole' value='info'>Informática</option>
                <option id='cole' value='mate'>Matemáticas</option>
                <option id='cole' value='bio'>Biología</option>
                <option id='cole' value='eduF'>Educación Física</option>
                <option id='cole' value='morfoS'>Morfología, Fisiología y Salud</option>
                <option id='cole' value='orientE'>Orientación Educativa</option>
                <option id='cole' value='psico'>Psicologia e Higiene Mental</option>
                <option id='cole' value='quim'>Química</option>
                <option id='cole' value='cienciasS'>Ciencias Sociales</option>
                <option id='cole' value='geo'>Geografía</option>
                <option id='cole' value='hist'>Historia</option>
                <option id='cole' value='aleman'>Alemán</option>
                <option id='cole' value='artesP'>Artes Plásticas</option>
                <option id='cole' value='danza'>Danza</option>
                <option id='cole' value='dibujo'>Dibujo y Modelado</option>
                <option id='cole' value='filos'>Filosofía</option>
                <option id='cole' value='frances'>Frances</option>
                <option id='cole' value='ingles'>Inglés</option>
                <option id='cole' value='italiano'>Italiano</option>
                <option id='cole' value='letrasC'>Letras Clásicas</option>
                <option id='cole' value='lite'>Literatura</option>
                <option id='cole' value='musica'>Música</option>
                <option id='cole' value='teatro'>Teatro</option>
              </select><br><br>";
  }
  echo "      <input type='submit' name='enviar' value='enviar'>
            </fieldset>
          </form>
        </div>";
}
?>
