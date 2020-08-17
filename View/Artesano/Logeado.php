<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HouseCraft</title>
        <link rel="stylesheet" type="text/css" href="Assets/Css/cartaPresentacion.css">
    </head>
    <body>
        <section class="login">
            
            
            <div class="container">
                <div class="user data">
                    <div class="imgBox"><img src="data:image/jpg;base64,<?php echo base64_encode($arte->getImagen());?>"></div>
                    <div class="formBx">
                        <form action="" method="">
                            <h2>MIS DATOS PERSONALES</h2>
                            <p class="signup">Nombre:     <a><?=$arte->getNombre();?></a></p>
                            <p class="signup">Apellido:     <a><?=$arte->getApellido();?></a></p>
                            <p class="signup">Correo:     <a><?=$arte->getCorreo();?></a></p>
                            <p class="signup">Telefono:     <a><?=$arte->getTelefono();?></a></p>
                            <p class="signup">Fecha de Ingreso:     <a><?=$arte->getFecha();?></a></p>
                            <p class="signup">Cambiar mis datos     <a class="link" href="#" onclick="toggleForm();">Modificar Mis Datos</a></p>
                        </form>
                    </div>
                </div>
                
                
                <div class="user modif">
                    <div class="formBx">
                        <form action="index.php?c=artesano&a=Actualizar" method="post" enctype="multipart/form-data">
                            <h2>DATOS A MODIFICAR</h2>
                            <input hidden type="text" name="codigo" value="<?=$arte->getCodigo();?>">
                            <input hidden type="text" name="estado" value="<?=$arte->getEstado();?>">
                            <input type="password" name="password" value="<?=$arte->getPassword();?>">
                            <input type="text" name="nombre" value="<?=$arte->getNombre();?>">
                            <input type="text" name="apellido" value="<?=$arte->getApellido();?>">
                            <input type="text" name="correo" value="<?=$arte->getCorreo();?>">
                            <input type="number" name="telefono" value="<?=$arte->getTelefono();?>">
                            <input type="date" name="fecha" value="<?=$arte->getFecha();?>">
                            <input type="file" name="imagen">
                            <input type="submit" name="" value="Modificar">
                            <p class="signup">No cambiar datos <a class="link2" onclick="toggleForm();">Cancelar</a></p>
                        </form>
                    </div>
                    <div class="imgBox"><img src="data:image/jpg;base64,<?php echo base64_encode($arte->getImagen());?>"></div>
                </div>
            </div>
            
            
        </section>
        <script type="text/javascript">
            function toggleForm(){
                var container = document.querySelector('.container');
                container.classList.toggle('active')
            }
        </script>
    </body>
</html>
