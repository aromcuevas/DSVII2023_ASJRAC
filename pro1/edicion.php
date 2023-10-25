<HTML LANG="es">
<HEAD>
  <META CHARSET="UTF-8" NAME="viewport">
  <TITLE>Editar Tareas - Proyecto 1</TITLE>
  <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
</HEAD>
<BODY>
<H1>Editar Tarea</H1>
<?php        

require_once("class/tareas.php");

$obj_tarea = new tarea();
$tareas = $obj_tarea->consultar_tareas();

if(array_key_exists('enviar', $_POST)){
    $titulo = $_REQUEST['titulo'];
    $descripcion = $_REQUEST['descripcion'];
    $fecha_f = $_REQUEST['fecha_f'];
    $responsable = $_REQUEST['responsable'];
    $tipo = $_REQUEST['tipo'];

    if ($_REQUEST['titulo'] != ""){

        $obj_tarea = new tarea();
        $result = $obj_tarea->actualizar_tareas($titulo, $descripcion, $fecha_f, $responsable, $tipo);

        if($result){
            echo "Tarea Registrada: $_REQUEST[titulo]. ";
            print ("<A HREF='actividades.php'>Actividades</A>\n");
        }
        else{
            print("<A HREF='nueva.php'>Error al actualizar tarea</A>\n");
        }        
    }
    else
    {
      echo "Falta información por agregar. <a href='nueva.php' target='_top'>Volver</a>.";
    }
}
else{
?>
<form action='edicion.php' method='post'>
<table>
<tr><td><p><label>Titulo:</label></p></td>
        <td><select type='text' name='check'>
<?php
$nfilas=count($tareas);
if ($nfilas > 0){
    foreach ($tareas as $resultado){
        print("<option>". $resultado['titulo']. "</option>\n");
    }
}
?>
        </td></tr>
    <tr><td><p><label>Descripcion:</label></p></td>
        <td><input type='text' name='descripcion' size='30'></td></tr>
    <tr><td><p><label>Fecha_de_Compromiso:</label></p></td>
        <td><input type='datetime-local' name='fecha_f' size='30'></td></tr>
    <tr><td><p><label>Responsable:</label></p></td>
        <td><input type='text' name='responsable' size='30'></td></tr>
    <tr><td><p><label>Tipo:</label></p></td>
        <td><select type='text' name='tipo'>
            <option value="diaria">Diaria</option>
            <option value="semanal">Semanal</option>
            <option value="mensual">Mensual</option>
        </td></tr>
</table>
<p><input type='submit' name='enviar' value='Guardar'></p>
</form>
<?php
  include("navegacion.php");
}
?>
</BODY>
</HTML>