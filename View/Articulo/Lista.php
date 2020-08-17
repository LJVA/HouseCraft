<!doctype html>
<html>
    <head>
        <title>HouseCraft</title>
        <link rel="stylesheet" type="text/css" href="Assets/Css/tablaListado2.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <ul>
            <h2>MIS ARTICULOS</h2>
            <li>
                <span class="id">Codigo</span>
                <span class="nombre">Nombre</span>
                <span class="descripcion">Descripcion</span>
                <span class="categoria">Categoria</span>
                <span class="precio">Precio</span>
                <span class="imagen">Imagen</span>
                <span class="estado">Estado</span>
                <a>Editar</a>
                <a>Eliminar</a>
            </li>
            <?php
                foreach ($articulos as $datos):
            ?>
            <li>
                <span class="id"><?php echo $datos->getCodigo();?></span>
                <span class="nombre"><?php echo $datos->getNombre();?></span>
                <span class="descripcion"><?php echo $datos->getDescripcion();?></span>
                <span class="categoria"><?php echo $datos->getCategoria();?></span>
                <span class="precio"><?php echo $datos->getPrecio();?></span>
                <span class="imagen"><img height="150px" src="data:image/jpg;base64,<?php echo base64_encode($datos->getImagen());?>"/></span>
                <span class="estado"><?php if($datos->getEstado()==1){echo 'Activo';}elseif($datos->getEstado()==2){echo 'Inactivo';}else{echo 'Agotado';}?></span>
                <a href="index.php?c=articulo&a=viewActualizar&codigo=<?=$datos->getCodigo();?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="index.php?c=articulo&a=Eliminar&codigo=<?=$datos->getCodigo();?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </li>
            <?php
                endforeach;
            ?>
        </ul>
    </body>
</html>
