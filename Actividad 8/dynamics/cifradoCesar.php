<?php
  function cifradoCesar($texto,$fuerzaEmpuje){
    $ABC = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    $textoPt1 = strtoupper($texto);
    $textoPt2 = str_split($textoPt1);

    $textoCifrado = [];
    foreach ($textoPt2 as $key => $value) {
      $coincidencia = array_search($textoPt2[$key],$ABC);
      for ($i=1; $i < $fuerzaEmpuje; $i++){
        if($coincidencia == null){
          $caracterDesplazado = " ";
        }
        elseif($coincidencia > 0){
          $caracterDesplazado = $ABC[$coincidencia-$i];
        }
        else{
          $caracterDesplazado = $ABC[25-$i];
        }
        $coincidencia--;
        $textoCifrado[$key] = $caracterDesplazado;
      }
    }
    return $textoCifrado;
  }

  $texto = (isset($_POST['texto']) && $_POST['texto'] != null)? $_POST['texto'] : 0;
  $fuerzaEmpuje = (isset($_POST['fuerzaEmpuje']) && $_POST['fuerzaEmpuje'] != null)? $_POST['fuerzaEmpuje'] : 0;

  if($texto == $_POST['texto'] && $fuerzaEmpuje == $_POST['fuerzaEmpuje']){
    $textoCifrado = cifradoCesar($texto,$fuerzaEmpuje);
    foreach ($textoCifrado as $key => $value) {
      echo $textoCifrado[$key];
    }
  }

?>
