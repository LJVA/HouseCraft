<?php

require_once 'DB/conexion.php';

class Articulo {
    private $codigo;
    private $nombre;
    private $descripcion;
    private $CATEGORIA;
    private $precio;
    private $imagen;
    private $estado;
    private $creador;
    private $conexion;
    
    function __construct() {
        $this->conexion = new conexion();
    }
    
    function getCreador() {
        return $this->creador;
    }

    function setCreador($creador) {
        $this->creador = $creador;
    }

        function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

        function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getCATEGORIA() {
        return $this->CATEGORIA;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getConexion() {
        return $this->conexion;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setCATEGORIA($CATEGORIA) {
        $this->CATEGORIA = $CATEGORIA;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setConexion($conexion) {
        $this->conexion = $conexion;
    }
    
    public function registar($nuevo){
        $this->conexion->getConeccion();
        $sql = "INSERT INTO ARTICULO (NOMBRE,DESCRIPCION,CATEGORIA,PRECIO,IMAGEN,ESTADO,CREADOR) VALUES (?,?,?,?,?,?,?)";
        $tipos = 'sssdsii';
        $valores = array($nuevo->getNombre(),$nuevo->getDescripcion(),$nuevo->getCategoria(),$nuevo->getPrecio(),$nuevo->getImagen(),$nuevo->getEstado(),$nuevo->getCreador());
        $this->conexion->executeQuery($sql, $tipos, $valores);
        $this->conexion->cerrarConeccion();
    }
    
    public function listar($creador){
        $this->conexion->getConeccion();
        $sql = "SELECT * FROM ARTICULO WHERE CREADOR LIKE '%$creador%'";
        $datos = $this->conexion->executeQueryReturnData($sql);
        $articulos = array();
        foreach ($datos as $posicion => $fila){
            $articulo = new Articulo();$articulo->setCreador($fila['creador']);
            $articulo->setCodigo($fila['codigo']);$articulo->setNombre($fila['nombre']);$articulo->setDescripcion($fila['descripcion']);
            $articulo->setCATEGORIA($fila['categoria']);$articulo->setPrecio($fila['precio']);$articulo->setImagen($fila['imagen']);
            $articulo->setEstado($fila['estado']); array_push($articulos, $articulo);
        }
        $this->conexion->cerrarConeccion();
        return $articulos;
    }
    
    
    public function eliminar($codigo){
         $this->conexion->getConeccion();
         $sql = "DELETE FROM ARTICULO WHERE CODIGO = ?";
         $tipos = 'i';
         $valores = array($codigo);
         $this->conexion->executeQuery($sql, $tipos, $valores);
         $this->conexion->cerrarConeccion();
        
    }
    
    public function actualizar($nuevo){
        $this->conexion->getConeccion();
        $sql = "UPDATE ARTICULO SET NOMBRE=?,DESCRIPCION=?,CATEGORIA=?,PRECIO=?,IMAGEN=?,ESTADO=? WHERE CODIGO = ?";
        $tipos = 'sssdsii';
        $valores = array($nuevo->getNombre(),$nuevo->getDescripcion(),$nuevo->getCategoria(),$nuevo->getPrecio(),$nuevo->getImagen(),$nuevo->getEstado(),$nuevo->getCodigo());
        $this->conexion->executeQuery($sql, $tipos, $valores);
        $this->conexion->cerrarConeccion();
    }
    
    public function buscarXcodigo($codigo){
         $this->conexion->getConeccion();
         $sql = "SELECT * FROM ARTICULO WHERE CODIGO = $codigo";
         $fila = $this->conexion->executeQueryReturnData($sql);
         $articulo = new Articulo();$articulo->setCreador($fila[0]['creador']);
         $articulo->setCodigo($fila[0]['codigo']);$articulo->setDescripcion($fila[0]['descripcion']);
         $articulo->setNombre($fila[0]['nombre']);$articulo->setCATEGORIA($fila[0]['categoria']);
         $articulo->setPrecio($fila[0]['precio']);$articulo->setImagen($fila[0]['imagen']);$articulo->setEstado($fila[0]['estado']);
         $this->conexion->cerrarConeccion();
         return $articulo;
    }
    
    public function buscarXdato($parametro, $dato, $creador){
         $this->conexion->getConeccion();
         $sql = "SELECT * FROM ARTICULO WHERE "."$parametro LIKE '%$dato%' AND CREADOR = $creador";
         $row = $this->conexion->executeQueryReturnData($sql);
         $articulos = array();
         foreach ($row as $posicion => $fila){
            $articulo = new Articulo();
            $articulo->setCreador($fila['creador']);
            $articulo->setCodigo($fila['codigo']);$articulo->setNombre($fila['nombre']);$articulo->setDescripcion($fila['descripcion']);
            $articulo->setCATEGORIA($fila['categoria']);$articulo->setPrecio($fila['precio']);$articulo->setImagen($fila['imagen']);
            $articulo->setEstado($fila['estado']);
            array_push($articulos, $articulo);
         }
         $this->conexion->cerrarConeccion();
         return $articulos;
    }
    
    public function listaUsuario(){
         $this->conexion->getConeccion();
         $sql = "SELECT * FROM ARTICULO WHERE ESTADO = 1 OR ESTADO = 3";
         $row = $this->conexion->executeQueryReturnData($sql);
         $articulos = array();
         foreach ($row as $posicion => $fila){
            $articulo = new Articulo();
            $articulo->setCreador($fila['creador']);
            $articulo->setCodigo($fila['codigo']);$articulo->setNombre($fila['nombre']);$articulo->setDescripcion($fila['descripcion']);
            $articulo->setCATEGORIA($fila['categoria']);$articulo->setPrecio($fila['precio']);$articulo->setImagen($fila['imagen']);
            $articulo->setEstado($fila['estado']);
            array_push($articulos, $articulo);
         }
         $this->conexion->cerrarConeccion();
         return $articulos;
    }



}
