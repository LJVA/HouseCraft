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
            <h2>ORDENES DE COMPRAS</h2>
            <li>
                <span class="id">Orden de Compra</span>
                <span class="nombre">Codigo Artesano</span>
                <span class="apellidos">Nombre Artesano</span>
                <span class="correo">Codigo Articulo</span>
                <span class="telefono">Nombre Articulo</span>
                <span class="estado">Ganancia / Precio</span>
                <span class="estado">Fecha de Compra</span>
                <span class="estado">-----</span>
            </li>
            <?php
                foreach ($ordenes as $datos):
            ?>
            <li>
                <span class="id"><?php echo $datos->getId();?></span>
                <span class="apellidos"><?php echo $datos->getCodigo1();?></span>
                <span class="correo"><?php echo $datos->getNombre1();?></span>
                <span class="telefono"><?php echo $datos->getCodigo2();?></span>
                <span class="estado"><?php echo $datos->getNombre2();?></span>
                <span class="telefono"><?php echo $datos->getGanancia();?></span>
                <span class="estado"><?php echo $datos->getFecha();?></span>
                <span class="estado">-----</span>
            </li>
            <?php
                endforeach;
            ?>
            <br><br><br><br><br>
            <h2>GANANCIAS TOTALES --- <?php echo $ganancias;?></h2>
            
        </ul>
    </body>
</html>
