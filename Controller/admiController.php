<?php

require_once 'Model/Usuario.php';

class admiController {
   private $model;
    
   function __construct() {
       $this->model = new Usuario();
   }
   
   public function viewRegistro(){
        if(Utils::logeado()){
            if($_GET['t']==1){
                require_once 'View/Include/encabezado.php';
                require_once 'View/Admi/Registro.php';
                require_once 'View/Include/pie.php';
            }else{
                require_once 'View/Include/encabezado.php';
                require_once 'View/Artesano/Registro.php';
                require_once 'View/Include/pie.php';
            }
        }else{
            header('location:index.php');
        }
   }
   
   public function Registrar(){
       $nuevo = new Usuario();
       $encrypt = md5($_POST['password']);
       $nuevo->setPassword($encrypt);$nuevo->setNombre($_POST['nombre']);$nuevo->setApellido($_POST['apellido']);
       $nuevo->setCorreo($_POST['correo']);$nuevo->setTelefono($_POST['telefono']);$nuevo->setEstado(1);
       $nuevo->setImagen((file_get_contents($_FILES['imagen']['tmp_name'])));$nuevo->setTipo(1);
       $this->model->registar($nuevo);
       header('location:index.php');
   }
   
   public function viewListar(){
       if(Utils::logeado()){
           $parametro = "ESTADO";$dato;
           if(isset($_GET['d'])){
                if($_GET['d']=="baja"){
                    $dato=1;
                }else{
                    $dato=0;
                }
                $admis = $this->model->buscarXdato($parametro, $dato, $_GET['t']);
                require_once 'View/Admi/Lista.php';
           }else{
               if($_GET['t']==1){
                    $admis = $this->model->listar($_GET['t']);
                    require_once 'View/Admi/Lista.php';
               }else{
                   $arte = $this->model->listar($_GET['t']);
                   require_once 'View/Artesano/Lista.php';
               }
           }
       }else{
           header('location:index.php');
       }
   }
   
   public function viewActualizar(){
       if(Utils::logeado()){
           if($_GET['t']==1){
               $admi = $this->model->buscarXcodigo($_GET['codigo']);
                require_once 'View/Include/encabezado.php';
                require_once 'View/Admi/Edicion.php';
                require_once 'View/Include/pie.php';
           }else{
               $arte = $this->model->buscarXcodigo($_GET['codigo']);
                require_once 'View/Include/encabezado.php';
                require_once 'View/Artesano/Edicion.php';
                require_once 'View/Include/pie.php';
           }
       }else{
           header('location:index.php');
       }
   }
   
   public function Actualizar(){
       $nuevo = new Usuario();
       $encrypt = md5($_POST['password']);$nuevo->setCodigo($_POST['codigo']);
       $nuevo->setPassword($encrypt);$nuevo->setNombre($_POST['nombre']);$nuevo->setApellido($_POST['apellido']);
       $nuevo->setCorreo($_POST['correo']);$nuevo->setTelefono($_POST['telefono']);$nuevo->setEstado($_POST['estado']);
       $nuevo->setImagen((file_get_contents($_FILES['imagen']['tmp_name'])));
       $this->model->actualizar($nuevo);
       header('location:index.php');
   }
   
   public function Eliminar(){
       $this->model->eliminar($_GET['codigo']);
       header("location:index.php");
   }
   
   public function Estado(){
       $admi = $this->model->buscarXcodigo($_GET['codigo']);
       if($admi->getEstado()==1){
           $admi->setEstado(0);
       }else{
           $admi->setEstado(1);
       }
       $this->model->actualizar($admi);
       header('location:index.php');
   }
   
   public function Buscar(){
       if(Utils::logeado()){
           $ganancias=0;
           if(!isset($_GET['codigo'])){
           if($_POST['tipo']=="Todo"){
               $ordenes = $this->model->listarOrdenes("","");
               foreach ($ordenes as $dato){
                   $ganancias += $dato->getGanancia();
               }
               require_once 'View/Admi/Ordenes.php';
           }else{
                $ordenes = $this->model->listarOrdenes($_POST['dato'], $_POST['dato']);
                foreach ($ordenes as $dato){
                   $ganancias += $dato->getGanancia();
                }
                require_once 'View/Admi/Ordenes.php';
           }}else{
                $ordenes = $this->model->ordenesArtesano($_SESSION['codigo']);
                foreach ($ordenes as $dato){
                   $ganancias += $dato->getGanancia();
                }
                require_once 'View/Artesano/Ordenes.php';
           }
       }else{
            header('location:index.php');
       }
   }
   
   public function viewArticulos(){
       if(Utils::logeado()){
            require_once 'View/Include/encabezado.php';
            require_once 'View/Include/pie.php';
        }else{
            header('location:index.php');
        }
   }

}
