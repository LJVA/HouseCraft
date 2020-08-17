<?php

require_once 'Model/Usuario.php';
require_once 'Model/Articulo.php';
require_once 'Model/Compra.php';

class housecraftController {
    private $model;
    private $Amodel;
    private $CModel;
            
    function __construct() {
        $this->model = new Usuario;
        $this->Amodel = new Articulo();
        $this->CModel = new Compra();
    }

    
    public function viewPrincipal(){
        if(Utils::logeado()){
            $usuario = $_SESSION['tipo'];
            if($usuario == 1){
                require_once 'View/Include/encabezado.php';
                require_once 'View/Include/pie.php';
            }else{
                $arte = $this->model->buscarXcodigo($_SESSION['codigo']);
                require_once 'View/Include/encabezado.php';
                require_once 'View/Artesano/Logeado.php';
                require_once 'View/Include/pie.php';
            }
        }else{
            $articulos = $this->Amodel->listaUsuario();
            require_once 'View/User/Principal.php';
        }
    }
    
    public function Buscar(){
        $admi = array();$arte = array(); $parametro; $tipo;
        switch ($_POST['tipo'])
        {
             case 'Todos':
                $admi = $this->model->listar(1);
                $arte = $this->model->listar(0);
                require_once 'View/User/Lista.php';
                break;
             case 'Administrador':
                 $tipo=1;
                 if($_POST['parametro']=="Por Nombre"){
                     $parametro = "NOMBRE";
                     $admi = $this->model->buscarXdato($parametro, $_POST['dato'], $tipo);
                 }else{
                     $parametro = "APELLIDO";
                     $admi = $this->model->buscarXdato($parametro, $_POST['dato'], $tipo);
                 }
                 require_once 'View/User/Lista.php';
                 break;
             case 'Artesano':
                 $tipo=0;
                 if($_POST['parametro']=="Por Nombre"){
                     $parametro = "NOMBRE";
                     $arte = $this->model->buscarXdato($parametro, $_POST['dato'], $tipo);
                 }else{
                     $parametro = "APELLIDO";
                     $arte = $this->model->buscarXdato($parametro, $_POST['dato'], $tipo);
                 }
                 require_once 'View/User/Lista.php';
                 break;
        }  
    }
    
    public function viewLogin(){
        require_once 'View/User/Login.php';
    }
    
    public function destroy(){
        $mensaje = "Vuelve Pronto";
        session_destroy();
        Utils::mostrarAlert($mensaje);
    }
    
    public function Validar(){
        $mensaje = "Bienvenido";
        $password = md5($_POST['password']);
        $validado = $this->model->validarUsuario($_POST['correo'], $password);
        
        if(!empty($validado) && $validado->getEstado() == 1){
            $_SESSION['tipo'] = $validado->getTipo();
            $_SESSION['codigo'] = $validado->getCodigo();
            Utils::mostrarAlert($mensaje);
        }else{
            $mensaje = "Datos incorrectos o Usuario desactivado porfavor verifica e intenta nuevamente";
            Utils::mostrarAlert($mensaje);
        }
    }
    
    public function viewCompra(){
        $mensaje = "Producto agotado; pronto tendremos en stok";
        $articulo = $this->Amodel->buscarXcodigo($_GET['codigo']);
        if($articulo->getEstado()==3){
            Utils::mostrarAlert($mensaje);
        }else{
            $articulo = $this->Amodel->buscarXcodigo($_GET['codigo']);
            require_once 'View/User/Principal2.php';
            require_once 'View/User/Compra.php';
        }
    }
    
    public function Comprar(){
        $asunto = "Estado sobre su compra reciente";
        $mensaje = "Compra realizada correctamente; Pronto estaremos en contacto con usted";
        $articulos = $this->Amodel->buscarXcodigo($_POST['codigo']);
        $artesano = $this->model->buscarXcodigo($articulos->getCreador());
        $articulos->setEstado(3);
        $compra = new Compra();$compra->setFecha($_POST['fecha']);
        $compra->setCodigo1($artesano->getCodigo());$compra->setNombre1($artesano->getNombre()." ".$artesano->getApellido());
        $compra->setCodigo2($articulos->getCodigo());$compra->setNombre2($articulos->getNombre());$compra->setGanancia($articulos->getPrecio());
        $this->CModel->registar($compra);
        $this->Amodel->actualizar($articulos);
        Utils::envioCorreo($_POST['correo'], $_POST['nombre'], $asunto, "pruebas despues arreglar");
        Utils::mostrarAlert($mensaje);
    }
}
