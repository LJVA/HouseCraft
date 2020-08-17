<?php

require_once 'DB/conexion.php';
require_once 'Model/Compra.php';

class Usuario {
    private $codigo;
    private $password;
    private $nombre;
    private $apellido;
    private $correo;
    private $telefono;
    private $estado;
    private $imagen;
    private $tipo;
    private $fecha;
    protected $conexion;
    
    function __construct() {
        $this->conexion = new conexion();
    }
    
    function getCodigo() {
        return $this->codigo;
    }

    function getPassword() {
        return $this->password;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEstado() {
        return $this->estado;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getTipo() {
        return $this->tipo;
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

    function setPassword($password) {
        $this->password = $password;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setConexion($conexion) {
        $this->conexion = $conexion;
    }
    
    
    public function registar($nuevo){
        $this->conexion->getConeccion();
        $sql = "INSERT INTO USUARIO (PASSWORD,NOMBRE,APELLIDO,CORREO,TELEFONO,ESTADO,FECHA,IMAGEN,TIPO) VALUES (?,?,?,?,?,?,?,?,?)";
        $tipos = 'ssssiissi';
        $valores = array($nuevo->getPassword(),$nuevo->getNombre(),$nuevo->getApellido(),$nuevo->getCorreo(),$nuevo->getTelefono(),$nuevo->getEstado(),$nuevo->getFecha(),$nuevo->getImagen(),$nuevo->getTipo());
        $this->conexion->executeQuery($sql, $tipos, $valores);
        $this->conexion->cerrarConeccion();
    }
    
    public function listar($tipo){
        $this->conexion->getConeccion();
        $sql = "SELECT * FROM USUARIO WHERE TIPO = $tipo";
        $datos = $this->conexion->executeQueryReturnData($sql);
        $usuarios = array();
        foreach ($datos as $posicion => $fila){
            $usuario = new Usuario();
            $usuario->setCodigo($fila['codigo']);$usuario->setPassword($fila['password']);$usuario->setNombre($fila['nombre']);
            $usuario->setApellido($fila['apellido']);$usuario->setCorreo($fila['correo']);$usuario->setTelefono($fila['telefono']);
            $usuario->setEstado($fila['estado']);$usuario->setImagen($fila['imagen']);$usuario->setFecha($fila['fecha']);$usuario->setTipo($fila['tipo']);
            array_push($usuarios, $usuario);
        }
        $this->conexion->cerrarConeccion();
        return $usuarios;
    }
    
    
    public function eliminar($codigo){
         $this->conexion->getConeccion();
         $sql = "DELETE FROM USUARIO WHERE CODIGO = ?";
         $tipos = 'i';
         $valores = array($codigo);
         $this->conexion->executeQuery($sql, $tipos, $valores);
         $this->conexion->cerrarConeccion();
        
    }
    
    public function actualizar($nuevo){
        $this->conexion->getConeccion();
        $sql = "UPDATE USUARIO SET PASSWORD=?,NOMBRE=?,APELLIDO=?,CORREO=?,TELEFONO=?,ESTADO=?,FECHA=?,IMAGEN=? WHERE CODIGO = ?";
        $tipos = 'ssssiissi';
        $valores = array($nuevo->getPassword(),$nuevo->getNombre(),$nuevo->getApellido(),$nuevo->getCorreo(),$nuevo->getTelefono(),$nuevo->getEstado(),$nuevo->getFecha(),$nuevo->getImagen(),$nuevo->getCodigo());
        $this->conexion->executeQuery($sql, $tipos, $valores);
        $this->conexion->cerrarConeccion();
    }
    
    public function buscarXcodigo($codigo){
         $this->conexion->getConeccion();
         $sql = "SELECT * FROM USUARIO WHERE CODIGO = $codigo";
         $fila = $this->conexion->executeQueryReturnData($sql);
         $usuario = new Usuario();
         $usuario->setCodigo($fila[0]['codigo']);$usuario->setPassword($fila[0]['password']);$usuario->setNombre($fila[0]['nombre']);
         $usuario->setApellido($fila[0]['apellido']);$usuario->setCorreo($fila[0]['correo']);$usuario->setTelefono($fila[0]['telefono']);
         $usuario->setEstado($fila[0]['estado']);$usuario->setImagen($fila[0]['imagen']);$usuario->setFecha($fila[0]['fecha']);$usuario->setTipo($fila[0]['tipo']);
         $this->conexion->cerrarConeccion();
         return $usuario;
    }
    
    public function buscarXdato($parameto,$dato,$tipo){
         $this->conexion->getConeccion();
         $sql = "SELECT * FROM USUARIO WHERE "."$parameto = '$dato' AND TIPO = $tipo";
         $datos = $this->conexion->executeQueryReturnData($sql);
         $usuarios = array();
         foreach ($datos as $posicion => $fila){
            $usuario = new Usuario();
            $usuario->setCodigo($fila['codigo']);$usuario->setPassword($fila['password']);$usuario->setNombre($fila['nombre']);
            $usuario->setApellido($fila['apellido']);$usuario->setCorreo($fila['correo']);$usuario->setTelefono($fila['telefono']);
            $usuario->setEstado($fila['estado']);$usuario->setImagen($fila['imagen']);$usuario->setFecha($fila['fecha']);$usuario->setTipo($fila['tipo']);
            array_push($usuarios, $usuario);
        }
        $this->conexion->cerrarConeccion();
        return $usuarios;
    }
    
    public function validarUsuario($correo, $password){
        $this->conexion->getConeccion();
        $sql = "SELECT * FROM USUARIO WHERE CORREO = '$correo' AND PASSWORD = '$password'";
        $fila = $this->conexion->executeQueryReturnData($sql);
        $this->conexion->cerrarConeccion();
        if($fila != NULL){
            $usuario = new Usuario();
            $usuario->setCodigo($fila[0]['codigo']);$usuario->setPassword($fila[0]['password']);$usuario->setNombre($fila[0]['nombre']);
            $usuario->setApellido($fila[0]['apellido']);$usuario->setCorreo($fila[0]['correo']);$usuario->setTelefono($fila[0]['telefono']);
            $usuario->setEstado($fila[0]['estado']);$usuario->setImagen($fila[0]['imagen']);$usuario->setFecha($fila[0]['fecha']);$usuario->setTipo($fila[0]['tipo']);
            return $usuario;
        }else{
            return NULL;
        } 
    }
    
    public function listarOrdenes($dato1, $dato2){
         $this->conexion->getConeccion();
         $sql = "SELECT * FROM COMPRAS WHERE NOMBREARTESANO LIKE '%$dato1%' OR NOMBREARTICULO LIKE '%$dato2%'";
         $datos = $this->conexion->executeQueryReturnData($sql);
         $compras = array();
         foreach ($datos as $posicion => $fila){
            $orden = new Compra();
            $orden->setId($fila['id']);$orden->setCodigo1($fila['codigoArtesano']);$orden->setNombre1($fila['nombreArtesano']);
            $orden->setCodigo2($fila['codigoArticulo']);$orden->setNombre2($fila['nombreArticulo']);$orden->setGanancia($fila['ganancia']);
            $orden->setFecha($fila['fecha']);array_push($compras, $orden);
        }
        $this->conexion->cerrarConeccion();
        return $compras;
    }
    
    public function ordenesArtesano($codigo){
         $this->conexion->getConeccion();
         $sql = "SELECT * FROM COMPRAS WHERE CODIGOARTESANO = $codigo";
         $datos = $this->conexion->executeQueryReturnData($sql);
         $compras = array();
         foreach ($datos as $posicion => $fila){
            $orden = new Compra();
            $orden->setId($fila['id']);$orden->setCodigo1($fila['codigoArtesano']);$orden->setNombre1($fila['nombreArtesano']);
            $orden->setCodigo2($fila['codigoArticulo']);$orden->setNombre2($fila['nombreArticulo']);$orden->setGanancia($fila['ganancia']);
            $orden->setFecha($fila['fecha']);array_push($compras, $orden);
        }
        $this->conexion->cerrarConeccion();
        return $compras;
    }



}
