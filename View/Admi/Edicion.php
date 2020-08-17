<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HouseCraft</title>
        <link rel="stylesheet" type="text/css" href="Assets/Css/formRegistro.css">
    </head>
    <body>
        <div class="container">
            <form action="index.php?c=admi&a=Actualizar" method="post" enctype="multipart/form-data">
            <h2>Edicion de Datos Administrador</h2>
            <div hidden class="row100">
                <div hidden class="col">
                    <div hidden class="inputBox">
                        <input hidden type="text" readonly name="codigo" required value="<?=$admi->getCodigo();?>">
                        <span hidden class="text">Codigo</span>
                        <span hidden class="line"></span>
                    </div>
                </div>
            </div>
            <div hidden class="row100">
                <div hidden class="col">
                    <div hidden class="inputBox">
                        <input hidden type="text" readonly name="estado" required value="<?=$admi->getEstado();?>">
                        <span hidden class="text">Estado</span>
                        <span hidden class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="password" name="password" required value="<?=$admi->getPassword();?>">
                        <span class="text">Password</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                 <div class="col">
                    <div class="inputBox">
                        <input type="text" name="nombre" required value="<?=$admi->getNombre();?>">
                        <span class="text">Nombre</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="apellido" required value="<?=$admi->getApellido();?>">
                        <span class="text">Apellido</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                 <div class="col">
                    <div class="inputBox">
                        <input type="text" name="correo" required value="<?=$admi->getCorreo();?>">
                        <span class="text">Correo</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="number" name="telefono" required value="<?=$admi->getTelefono();?>">
                        <span class="text">Telefono</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="file" name="imagen" required>
                        <span class="text">Foto</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <input type="submit" name="" value="Actualizar">
                </div>
            </div>
            </form>
        </div>
    </body>
</html>

