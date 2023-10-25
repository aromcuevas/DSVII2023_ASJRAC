<HTML LANG="es">
<HEAD>
  <META CHARSET="UTF-8" NAME="viewport">
  <TITLE>Actividades - Proyecto 1</TITLE>
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
  print ("<table  width='900'>\n");
  print ("<tr>\n");
  print ("<th width='33%'>Por hacer</th>\n");
  print ("<th width='33%'>En Progreso</th>\n");
  print ("<th width='33%'>Terminadas</th>\n");
  print ("</tr>\n");

  foreach ($tareas as $resultado){
    print ("<tr>\n"); 
    if ($resultado['estado'] == "por hacer"){
      print ("<td>" . $resultado['titulo'] . " " . $resultado['tipo'] . "</td>\n");
    }
    if ($resultado['estado'] == "progreso"){
      print ("<td>" . $resultado['titulo'] . " " . $resultado['tipo'] . "</td>\n");
    }
    if ($resultado['estado'] == "terminada"){
      print ("<td>" . $resultado['titulo'] . " " . $resultado['tipo'] . "</td>\n");
    }
    ?>
    <?php
    print ("</tr>\n");
  }
  print ("</table>\n");
  include("navegacion.php");
}
else{
  print ("No hay tareas disponibles");
}
?>
</BODY>
</HTML>