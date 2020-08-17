<?php

require_once 'Model/Categoria.php';
require_once 'Model/Articulo.php';

class categoriaController {
    private $model;
    private $Amodel;
    
   function __construct() {
       $this->model = new Categoria();
       $this->Amodel = new Articulo();
   }
   
   public function viewRegistro(){
        if(Utils::logeado()){
                require_once 'View/Include/encabezado.php';
                require_once 'View/Categoria/Registro.php';
                require_once 'View/Include/pie.php';
        }else{
            header('location:index.php');
        }
   }
   
   public function Registrar(){
       $nuevo = new Categoria();
       $nuevo->setDescripcion($_POST['descripcion']);$nuevo->setFecha($_POST['ingreso']);
       $this->model->registar($nuevo);
       header('location:index.php');
   }
   
   public function viewListar(){
       if(Utils::logeado()){
            $category = $this->model->listar();
            require_once 'View/Categoria/Lista.php';
       }else{
           header('location:index.php');
       }
   }
   
   public function viewActualizar(){
       if(Utils::logeado()){
            $category = $this->model->buscarXcodigo($_GET['codigo']);
            require_once 'View/Include/encabezado.php';
            require_once 'View/Categoria/Edicion.php';
            require_once 'View/Include/pie.php';
       }else{
           header('location:index.php');
       }
   }
   
   public function Actualizar(){
       $nuevo = new Categoria();
       $nuevo->setDescripcion($_POST['descripcion']);$nuevo->setFecha($_POST['ingreso']);
       $nuevo->setCodigo($_POST['codigo']);
       $this->model->actualizar($nuevo);
       header('location:index.php');
   }
   
   public function Eliminar(){
       $eliminar = false;
       $articulos = $this->Amodel->listar("");
       $categoria = $this->model->buscarXcodigo($_GET['codigo']);
       foreach ($articulos as $dato){
           if($dato->getCategoria() == $categoria->getDescripcion()){
                $eliminar = true;
           }
       }
       if($eliminar){
           $mensaje = "No es posible eliminar esta categoria actualmente";
           Utils::mostrarAlert($mensaje);
       }else{
           $this->model->eliminar($_GET['codigo']);
           header('location:index.php');
       }  
   }
}

