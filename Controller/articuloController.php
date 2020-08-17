<?php

require_once 'Model/Articulo.php';
require_once 'Model/Categoria.php';

class articuloController {
   private $model;
   private $Cmodel;
           
   function __construct() {
       $this->model = new Articulo();
       $this->Cmodel = new Categoria();
   }

    public function viewRegistro(){
        if(Utils::logeado()){
            $categorias = $this->Cmodel->listar();
            require_once 'View/Include/encabezado.php';
            require_once 'View/Articulo/Registro.php';
            require_once 'View/Include/pie.php';
        }else{
            header('location:index.php');
        }
   }
   
   public function Registrar(){
       $nuevo = new Articulo();$nuevo->setCreador($_SESSION['codigo']);
       $nuevo->setNombre($_POST['nombre']);$nuevo->setDescripcion($_POST['descripcion']);
       $nuevo->setCATEGORIA($_POST['categoria']);$nuevo->setPrecio($_POST['precio']);
       $nuevo->setImagen((file_get_contents($_FILES['imagen']['tmp_name'])));$nuevo->setEstado(1);
       $this->model->registar($nuevo);
       header('location:index.php');
   }
   
   public function viewListar(){
       if(Utils::logeado()){
       if($_SESSION['tipo']==1){
            $articulos = $this->model->listar("");
            require_once 'View/Articulo/Lista.php';
       }else{
            $articulos = $this->model->listar($_SESSION['codigo']);
            require_once 'View/Articulo/Lista.php';
       }
       }else{
           header('location:index.php');
       }
   }
   
   public function viewActualizar(){
       if(Utils::logeado()){
            $categorias = $this->Cmodel->listar();
            $articulo = $this->model->buscarXcodigo($_GET['codigo']);
            require_once 'View/Include/encabezado.php';
            require_once 'View/Articulo/Edicion.php';
            require_once 'View/Include/pie.php';
       }else{
           header('location:index.php');
       }
   }
   
   public function Actualizar(){
       $nuevo = new Articulo();
        switch ($_POST['estado']){
            case "Activo":
                $nuevo->setEstado(1);
                break;
            case "Inactivo":
                $nuevo->setEstado(2);
                break;
            case "Agotado":
                $nuevo->setEstado(3);
                break;
        }
       $nuevo->setCodigo($_POST['codigo']);
       $nuevo->setNombre($_POST['nombre']);$nuevo->setDescripcion($_POST['descripcion']);
       $nuevo->setCATEGORIA($_POST['categoria']);$nuevo->setPrecio($_POST['precio']);
       $nuevo->setImagen((file_get_contents($_FILES['imagen']['tmp_name'])));
       $this->model->actualizar($nuevo);
       header('location:index.php');
   }
   
   public function Eliminar(){
       $this->model->eliminar($_GET['codigo']);
       header("location:index.php");
   }
   
   public function Buscar(){
       if(Utils::logeado()){
            $dato="";
            if(isset($_POST['dato'])){
                $dato = $_POST['dato'];
            }
            if(isset($_POST['estado'])){
                switch ($_POST['estado']){
                    case "activo":
                        $dato=1;
                        break;
                    case "inactivo":
                        $dato=2;
                        break;
                    case "agotado":
                        $dato=3;
                        break;
                }
            }
            $articulos = $this->model->BuscarXdato($_POST['parametro'], $dato, $_SESSION['codigo']);
            require_once 'View/Articulo/Lista.php';
        }else{
           header('location:index.php');
        }
   }
}
