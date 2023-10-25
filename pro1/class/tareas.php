<?php

require_once('modelo.php');

class tarea extends modeloCredencialesBD{
protected $titulo;
protected $descripcion;
protected $estado;
protected $fecha_i;
protected $fecha_f;
protected $etiqueta;
protected $responsable;
protected $tipo;
protected $checklist;

public function __construct(){
  parent::__construct();
}

public function consultar_tareas(){
  $instruccion = "CALL sp_listar_tareas()";

  $consulta=$this->_db->query($instruccion);
  $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
    
  if(!$resultado){
     echo "Fallo al consultar tareas";
  }
  else{
    return $resultado;
    $resultado->close();
    $this->_db->close();
  }
}

public function consultar_tareas_filtro($campo,$valor){

$instruccion = "CALL sp_listar_tareas_filtro('".$campo."','".$valor."')";

$consulta=$this->_db->query($instruccion);
$resultado=$consulta->fetch_all(MYSQLI_ASSOC);

  if($resultado){
    return $resultado;
    $resultado->close();
    $this->_db->close();
  }
}

public function actualizar_tareas($titulo,$descripcion,$fecha_f,$responsable,$tipo){

  $instruccion = "CALL sp_actualizar_tareas('".$titulo."','".$descripcion.",'".$fecha_f.",'".$responsable.",'".$tipo."')";
  $actualiza=$this->_db->query($instruccion);
  
    if($actualiza){
      return $actualiza;
      $actualiza->close();
      $this->_db->close();
    }
  }
  
}
?>
 