<?php

require_once 'DB/conexion.php';

class Compra {
    private $id;
    private $codigo1;
    private $codigo2;
    private $nombre1;
    private $nombre2;
    private $ganancia;
    private $fecha;
    private $conexion;
    
    function __construct() {
        $this->conexion = new conexion();
    }
    
    function getFecha() {
        return $this->fecha;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function getId() {
        return $this->id;
    }

    function getCodigo1() {
        return $this->codigo1;
    }

    function getCodigo2() {
        return $this->codigo2;
    }

    function getNombre1() {
        return $this->nombre1;
    }

    function getNombre2() {
        return $this->nombre2;
    }

    function getGanancia() {
        return $this->ganancia;
    }

    function getConexion() {
        return $this->conexion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo1($codigo1) {
        $this->codigo1 = $codigo1;
    }

    function setCodigo2($codigo2) {
        $this->codigo2 = $codigo2;
    }

    function setNombre1($nombre1) {
        $this->nombre1 = $nombre1;
    }

    function setNombre2($nombre2) {
        $this->nombre2 = $nombre2;
    }

    function setGanancia($ganancia) {
        $this->ganancia = $ganancia;
    }

    function setConexion($conexion) {
        $this->conexion = $conexion;
    }

    
    
    public function registar($nuevo){
        $this->conexion->getConeccion();
        $sql = "INSERT INTO COMPRAS (CODIGOARTESANO,NOMBREARTESANO,CODIGOARTICULO,NOMBREARTICULO,GANANCIA,FECHA) VALUES (?,?,?,?,?,?)";
        $tipos = 'isisds';
        $valores = array($nuevo->getCodigo1(),$nuevo->getNombre1(),$nuevo->getCodigo2(),$nuevo->getNombre2(),$nuevo->getGanancia(),$nuevo->getFecha());
        $this->conexion->executeQuery($sql, $tipos, $valores);
        $this->conexion->cerrarConeccion();
    }
    
    public function listar($creador){
        $this->conexion->getConeccion();
        $sql = "SELECT * FROM COMPRAS WHERE CODIGOARTESANO LIKE '%$creador%'";
        $datos = $this->conexion->executeQueryReturnData($sql);
        $compras = array();
        foreach ($datos as $posicion => $fila){
            $compra = new Compra(); 
            $compra->setCodigo($fila['id']);$compra->setCodigoArte($fila['codigoArtesano']);$compra->setNombreArte($fila['nombreArtesano']);
            $compra->setCodigoArti($fila['codigoArticulo']);$compra->setNombreArti($fila['nombreArticulo']);$compra->setFecha($fila['fecha']);
            $compra->setGanancia($fila['ganancia']);
            array_push($compras, $compra);
        }
        $this->conexion->cerrarConeccion();
        return $compras;
    }
    
}
