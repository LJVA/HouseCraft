<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HouseCraft</title>
        <link rel="stylesheet" href="Assets/Css/tablaListado.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <ul>
            <h2>ADMINISTRADORES</h2>
            <li>
                <span class="id">Codigo</span>
                <span class="nombre">Nombre</span>
                <span class="apellidos">Apellido</span>
                <span class="correo">Correo</span>
                <span class="telefono">Telefono</span>
                <span class="estado">Estado</span>
                <span class="estado">Foto</span>
                <span class="estado">-----</span>
                <a>Editar</a>
                <a>Eliminar</a>
                <a>Cambiar Estado</a>
            </li>
            <?php
                foreach ($admis as $datos):
            ?>
            <li>
                <span class="id"><?php echo $datos->getCodigo();?></span>
                <span class="apellidos"><?php echo $datos->getNombre();?></span>
                <span class="correo"><?php echo $datos->getApellido();?></span>
                <span class="telefono"><?php echo $datos->getCorreo();?></span>
                <span class="estado"><?php echo $datos->getTelefono();?></span>
                <span class="estado"><?php if($datos->getEstado()==1){echo 'Activo';}else{echo 'Inactivo';}?></span>
                <span class="estado"><img height="150px" src="data:image/jpg;base64,<?php echo base64_encode($datos->getImagen());?>"/></span>
                <span class="estado">-----</span>
                <a href="index.php?c=admi&a=viewActualizar&codigo=<?=$datos->getCodigo();?>&t=1"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="index.php?c=admi&a=Eliminar&codigo=<?=$datos->getCodigo();?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <a href="index.php?c=admi&a=Estado&codigo=<?=$datos->getCodigo();?>"><i class="fa fa-refresh" aria-hidden="true"></i></a>
            </li>
            <?php
                endforeach;
            ?>
        </ul>
    </body>
</html>

