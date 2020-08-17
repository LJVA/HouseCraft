<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HouseCraft</title>
        <link rel="stylesheet" href="Assets/Css/tablaListado2.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <ul>
            <h2>CATEGORIAS</h2>
            <li>
                <span class="id">Codigo</span>
                <span class="nombre">Descripcion</span>
                <span class="apellidos">Fecha de Registro</span>
                <span class="apellidos">-----</span>
                <span class="apellidos">-----</span>
                <span class="apellidos">-----</span>
                <span class="apellidos">-----</span>
                <a>Editar</a>
                <a>Eliminar</a>
            </li>
            <?php
                foreach ($category as $datos):
            ?>
            <li>
                <span class="id"><?php echo $datos->getCodigo();?></span>
                <span class="apellidos"><?php echo $datos->getDescripcion();?></span>
                <span class="correo"><?php echo $datos->getFecha();?></span>
                <span class="apellidos">-----</span>
                <span class="apellidos">-----</span>
                <span class="apellidos">-----</span>
                <span class="apellidos">-----</span>
                <a href="index.php?c=categoria&a=viewActualizar&codigo=<?=$datos->getCodigo();?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="index.php?c=categoria&a=Eliminar&codigo=<?=$datos->getCodigo();?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </li>
            <?php
                endforeach;
            ?>
        </ul>
    </body>
</html>

