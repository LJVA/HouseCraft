<?php

require_once 'DB/conexion.php';

class Categoria {
    private $codigo;
    private $descripcion;
    private $fecha;
    private $conexion;
    
    function __construct() {
        $this->conexion = new conexion();
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getConexion() {
        return $this->conexion;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setConexion($conexion) {
        $this->conexion = $conexion;
    }

    public function registar($nuevo){
        $this->conexion->getConeccion();
        $sql = "INSERT INTO CATEGORIA (DESCRIPCION,FECHA) VALUES (?,?)";
        $tipos = 'ss';
        $valores = array($nuevo->getDescripcion(),$nuevo->getFecha());
        $this->conexion->executeQuery($sql, $tipos, $valores);
        $this->conexion->cerrarConeccion();
    }
    
    public function listar(){
        $this->conexion->getConeccion();
        $sql = "SELECT * FROM CATEGORIA";
        $datos = $this->conexion->executeQueryReturnData($sql);
        $categorias = array();
        foreach ($datos as $posicion => $fila){
            $category = new Categoria();
            $category->setCodigo($fila['codigo']);$category->setDescripcion($fila['descripcion']);
            $category->setFecha($fila['fecha']);
            array_push($categorias, $category);
        }
        $this->conexion->cerrarConeccion();
        return $categorias;
    }
    
    
    public function eliminar($codigo){
         $this->conexion->getConeccion();
         $sql = "DELETE FROM CATEGORIA WHERE CODIGO = ?";
         $tipos = 'i';
         $valores = array($codigo);
         $this->conexion->executeQuery($sql, $tipos, $valores);
         $this->conexion->cerrarConeccion();
        
    }
    
    public function actualizar($nuevo){
        $this->conexion->getConeccion();
        $sql = "UPDATE CATEGORIA SET DESCRIPCION=?,FECHA=? WHERE CODIGO = ?";
        $tipos = 'ssi';
        $valores = array($nuevo->getDescripcion(),$nuevo->getFecha(),$nuevo->getCodigo());
        $this->conexion->executeQuery($sql, $tipos, $valores);
        $this->conexion->cerrarConeccion();
    }
    
    public function buscarXcodigo($codigo){
         $this->conexion->getConeccion();
         $sql = "SELECT * FROM CATEGORIA WHERE CODIGO = $codigo";
         $fila = $this->conexion->executeQueryReturnData($sql);
         $categoria = new Categoria();
         $categoria->setCodigo($fila[0]['codigo']);$categoria->setDescripcion($fila[0]['descripcion']);
         $categoria->setFecha($fila[0]['fecha']);
         $this->conexion->cerrarConeccion();
         return $categoria;
    }

}
