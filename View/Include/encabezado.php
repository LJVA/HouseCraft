<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>HouseCraft</title>
        <link rel="stylesheet" type="text/css" href="Assets/Css/encabezado.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    </head>
    <body>
         <header>
             <div class="encabezado">
                <span>H</span>
                <span>O</span>
                <span>U</span>
                <span>S</span>
                <span>E</span>
                <span>~</span>
                <span>C</span>
                <span>R</span>
                <span>A</span>
                <span>F</span>
                <span>T</span>
             </div>
             <div class="contenedor">
             <div id="header">
                    <ul class="nav">
                        <li><a href="index.php">Inicio</a></li>
                        
                        <?php if(Utils::admin()==false):?>
                        <li><a href="">Buscar Articulos</a>
                            <ul>
                                <li><a>Por Nombre</a>
                                    <ul>
                                        <li>
                                            <form action="index.php?c=articulo&a=Buscar"  method="post">
                                                <input type="text" name="dato">
                                                <input hidden="" type="text" name="parametro" value="NOMBRE">
                                                <input type="submit" name="" value="Buscar">
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <li><a>Por Categoria</a>
                                    <ul>
                                        <li>
                                            <form action="index.php?c=articulo&a=Buscar"  method="post">
                                                <input type="text" name="dato">
                                                <input hidden="" type="text" name="parametro" value="CATEGORIA">
                                                <input type="submit" name="" value="Buscar">
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <li><a>Por Estado</a>
                                    <ul>
                                        <li>
                                            <form action="index.php?c=articulo&a=Buscar"  method="post">
                                                <input type="text" name="estado">
                                                <input hidden="" type="text" name="parametro" value="ESTADO">
                                                <input type="submit" name="" value="Buscar">
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        
                        <li><a href="">Mis Articulos</a>
                            <ul>
                                <li><a href="index.php?c=articulo&a=viewRegistro">Agregar</a></li>
                                <li><a href="index.php?c=articulo&a=viewListar">Listar</a></li>
                                <li><a href="index.php?c=articulo&a=viewListar">Modificar</a></li>
                                <li><a href="index.php?c=articulo&a=viewListar">Eliminar</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="index.php?c=admi&a=Buscar&codigo=<?php$_SESSION['codigo']?>">Ordenes de Compras</a></li>
                        
                        
                        <?php endif;?>
                        
                        
                        <?php if(Utils::admin()):?>
                        <li><a href="#openmodal">Buscar Usuarios</a>
                            <div class="contenedor">
                                <section id="openmodal" class="modalDialog">
                                    <section class="modal">
                                        <a href="#close" class="close"> X </a>
                                        <div class="box">
                                            <h2>Ingrese los valores</h2>
                                            <form action="index.php?c=housecraft&a=Buscar" method="post">
                                                <input type="text" name="dato" placeholder="Dato.....">
                                                <select name="parametro">
                                                    <option>Por Nombre</option>
                                                    <option>Por Apellido</option>
                                                </select>
                                                <select name="tipo">
                                                    <option>Administrador</option>
                                                    <option>Artesano</option>
                                                    <option>Todos</option>
                                                </select>
                                                <input type="submit" name="" value="Buscar">
                                            </form>
                                        </div>
                                    </section>
                                </section>
                            </div>
                        </li>
                        
                        <li><a href="">Agregar Usuario</a>
                            <ul>
                                <li><a href="index.php?c=admi&a=viewRegistro&t=1">Administrador</a></li>
                                <li><a href="index.php?c=admi&a=viewRegistro&t=0">Artesano</a></li>
                            </ul>
                        </li>
                        <li><a href="">Modificar Usuario</a>
                            <ul>
                                <li><a href="index.php?c=admi&a=viewListar&t=1">Administrador</a></li>
                                <li><a href="index.php?c=admi&a=viewListar&t=0">Artesano</a></li>
                            </ul>
                        </li>
                        <li><a href="">Eliminar Usuario</a>
                            <ul>
                                <li><a href="index.php?c=admi&a=viewListar&t=1">Administrador</a></li>
                                <li><a href="index.php?c=admi&a=viewListar&t=0">Artesano</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="">Acciones</a>
                            <ul>
                                <li><a href="">Dar de baja</a>
                                    <ul>
                                        <li><a href="index.php?c=admi&a=viewListar&d=baja&t=1">Administrador</a></li>
                                        <li><a href="index.php?c=admi&a=viewListar&d=baja&t=0">Artesano</a></li>
                                        <li><a href="index.php?c=articulo&a=viewListar">Articulo</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Dar de alta</a>
                                    <ul>
                                        <li><a href="index.php?c=admi&a=viewListar&d=alta&t=1">Administrador</a></li>
                                        <li><a href="index.php?c=admi&a=viewListar&d=alta&t=0">Artesano</a></li>
                                        <li><a href="index.php?c=articulo&a=viewListar">Articulo</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        
                        <li><button id="btn-abrir-popup" class="btn-abrir-popup">Ordenes de Compras</button>
                            <div class="overlay" id="overlay">
                                <div class="popup" id="popup">
                                    <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                                    <h3>Buscar Por...</h3>
                                    <form action="index.php?c=admi&a=Buscar" method="post">
                                        <div class="contenedor-inputs">
                                            <input type="text" name="dato" placeholder="Nombre......">
                                            <select name="tipo">
                                                <option>Artesano</option>
                                                <option>Articulo</option>
                                                <option>Todo</option>
                                            </select>
                                        </div>
                                        <input type="submit" class="btn-submit" value="Buscar">
                                    </form>
                                </div>
                            </div>
                        </li>
                        
                        <li><a href="">CRUD Categorias</a>
                            <ul>
                                <li><a href="index.php?c=categoria&a=viewRegistro">Agregar</a></li>
                                <li><a href="index.php?c=categoria&a=viewListar">Listar</a></li>
                                <li><a href="index.php?c=categoria&a=viewListar">Modificar</a></li>
                                <li><a href="index.php?c=categoria&a=viewListar">Eliminar</a></li>
                            </ul>
                        </li>
                        <?php endif;?>
                        
                        <?php if(isset($_SESSION['tipo'])):?>
                        <li><a href="index.php?c=housecraft&a=destroy">Cerrar Sesion</a></li>
                        <?php endif;?>
                    </ul>
		</div>
                 </div>
             <script src="Assets/Css/popup.js"></script>
        </header>