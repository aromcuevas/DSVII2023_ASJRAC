<HTML LANG="es">
<HEAD>
  <META CHARSET="UTF-8" NAME="viewport">
  <TITLE>Checklist - Proyecto 1</TITLE>
  <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<H1>Checklist</H1>
<?php
require_once("class/tareas.php");

$obj_tarea = new tarea();
$tareas = $obj_tarea->consultar_tareas();

$nfilas=count($tareas);

if ($nfilas > 0){
  print ("<table width='400'>\n");
  print ("<tr>\n");
  print ("<th>Tareas</th>\n");
  print ("<th>On</th>\n");
  print ("<th>Off</th>\n");
  print ("</tr>\n");

  foreach ($tareas as $resultado){
    print ("<tr>\n");
    print ("<td>" . $resultado['titulo'] . "</td>\n"); 
    print ("<form>\n"); 
    if ($resultado['checklist'] == "si"){
      ?>
      <td><label><input type="radio" name="checklist" value="si" checked></label></td>
      <td><label><input type="radio" name="checklist" value="no"></label></td>
      <?php
    }
    if ($resultado['checklist'] == "no"){
      ?>
      <td><label><input type="radio" name="checklist" value="si"></label></td>
      <td><label><input type="radio" name="checklist" value="no" checked></label></td>
      <?php
    }
    print ("</form>\n"); 
    print ("</tr>\n");
  }
  print ("</table>\n");
  print ("<p><input type='submit' name='enviar' value='Guardar'></p>\n");
  include("navegacion.php");
}
else{
  print ("No hay tareas disponibles");
}
?>
</BODY>
</HTML>