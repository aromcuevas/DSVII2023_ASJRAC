<HTML LANG="es">
<HEAD>
  <META CHARSET="UTF-8" NAME="viewport">
  <TITLE>Tareas - Proyecto 1</TITLE>
  <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<H1>Actividades</H1>
<?php
require_once("class/tareas.php");

$obj_tarea = new tarea();
$tareas = $obj_tarea->consultar_tareas();

$nfilas=count($tareas);

if ($nfilas > 0){
  print ("<table>\n");
  print ("<tr>\n");
  print ("<th>Tareas</th>\n");
  print ("<th>Por hacer</th>\n");
  print ("<th>En Progreso</th>\n");
  print ("<th>Terminadas</th>\n");
  print ("</tr>\n");
$check1 = '';
$check2 = '';
$check3 = '';
  foreach ($tareas as $resultado){
    print ("<tr>\n"); 
    print ("<td>" . $resultado['titulo'] . "</td>\n");
    print ("<form>\n"); 
    if ($resultado['estado'] == "por hacer"){
      $check1 = "checked";
      $check2 = '';
      $check3 = '';
    }
    if ($resultado['estado'] == "progreso"){
      $check2 = "checked";
      $check3 = '';
      $check1 = '';
    }
    if ($resultado['estado'] == "terminada"){
      $check3 = "checked";
      $check1 = '';
      $check2 = '';
    }
    ?>
    <td><label><input type="radio" name="estado" value="por hacer"
    <?php
    echo $check1;
    ?>
    ></label></td>
    <td><label><input type="radio" name="estado" value="en progreso"
    <?php
    echo $check2;
    ?>></label></td>
    <td><label><input type="radio" name="estado" value="terminada"
    <?php
    echo $check3;
    ?>></label></td>
    <?php
    print ("</form>\n"); 
    print ("</tr>\n");
  }
  print ("</table>\n");
  print ("<br><br>\n");
  print ("[ <a href='reporte.php' target='_top'>Reporte</a> ]\n");
}
else{
  print ("No hay tareas disponibles");
}
?>
</BODY>
</HTML>