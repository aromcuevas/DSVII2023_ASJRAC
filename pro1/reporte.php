<HTML LANG="es">
<HEAD>
  <META CHARSET="UTF-8" NAME="viewport">
  <TITLE>Tareas - Proyecto 1</TITLE>
  <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<H1>Reporte de Actividades</H1>
<?php
require_once("class/tareas.php");

$obj_tarea = new tarea();
$tareas = $obj_tarea->consultar_tareas();

$nfilas=count($tareas);

if ($nfilas > 0){
  print ("<table>\n");
  print ("<tr>\n");
  print ("<th>Tareas</th>\n");
  print ("<th>Estado</th>\n");
  print ("<th>Responsable</th>\n");
  print ("<th>Fecha de Creación</th>\n");
  print ("<th>Fecha de Realización</th>\n");
  print ("<th>Tipo</th>\n");
  print ("</tr>\n");
  foreach ($tareas as $resultado){
    print ("<tr>\n"); 
    print ("<td>" . $resultado['titulo'] . "</td>\n");
    print ("<td>" . $resultado['estado'] . "</td>\n");
    print ("<td>" . $resultado['responsable'] . "</td>\n");
    print ("<td>" . date("j/n/Y",strtotime($resultado['fecha_i'])) . "</td>\n");
    print ("<td>" . date("j/n/Y",strtotime($resultado['fecha_f'])) . "</td>\n");
    print ("<td>" . $resultado['tipo'] . "</td>\n");
  }
  print ("</table>\n");
  print ("<br><br>\n");
  print ("[ <a href='actividades.php' target='_top'>Actividades</a> ]\n");
}
else{
  print ("No hay tareas disponibles");
}
?>
</BODY>
</HTML>