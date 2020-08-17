<?php

require_once 'Model/Usuario.php';

class artesanoController {
   private $model;
    
   function __construct() {
       $this->model = new Usuario();
   }
   
   public function Registrar(){
       $nuevo = new Usuario();
       $encrypt = md5($_POST['password']);$nuevo->setTipo(0);
       $nuevo->setPassword($encrypt);$nuevo->setNombre($_POST['nombre']);$nuevo->setApellido($_POST['apellido']);
       $nuevo->setCorreo($_POST['correo']);$nuevo->setTelefono($_POST['telefono']);$nuevo->setEstado(1);
       $nuevo->setImagen((file_get_contents($_FILES['imagen']['tmp_name'])));$nuevo->setFecha($_POST['ingreso']);
       $this->model->registar($nuevo);
       header('location:index.php');
   }
   
   public function Actualizar(){
       $nuevo = new Usuario();
       $encrypt = md5($_POST['password']);$nuevo->setCodigo($_POST['codigo']);
       $nuevo->setPassword($encrypt);$nuevo->setNombre($_POST['nombre']);$nuevo->setApellido($_POST['apellido']);
       $nuevo->setCorreo($_POST['correo']);$nuevo->setTelefono($_POST['telefono']);$nuevo->setEstado($_POST['estado']);
       $nuevo->setImagen((file_get_contents($_FILES['imagen']['tmp_name'])));$nuevo->setFecha($_POST['fecha']);
       $this->model->actualizar($nuevo);
       header('location:index.php');
   }
   
   public function Eliminar(){
       $this->model->eliminar($_GET['codigo']);
       header("location:index.php");
   }
   
   public function Estado(){
       $arte = $this->model->buscarXcodigo($_GET['codigo']);
       if($arte->getEstado()==1){
           $arte->setEstado(0);
       }else{
           $arte->setEstado(1);
       }
       $this->model->actualizar($arte);
       header('location:index.php');
   }
   
   
   
}
