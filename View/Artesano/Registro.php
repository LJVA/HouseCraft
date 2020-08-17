<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HouseCraft</title>
        <link rel="stylesheet" type="text/css" href="Assets/Css/formRegistro.css">
    </head>
    <body>
        <div class="container">
            <form action="index.php?c=artesano&a=Registrar" method="post" enctype="multipart/form-data">
            <h2>Registro Artesanos</h2>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="password" name="password" required>
                        <span class="text">Password</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="nombre" required>
                        <span class="text">Nombre</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                 <div class="col">
                    <div class="inputBox">
                        <input type="text" name="apellido" required>
                        <span class="text">Apellido</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                 <div class="col">
                    <div class="inputBox">
                        <input type="text" name="correo" required>
                        <span class="text">Correo</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="number" name="telefono" required>
                        <span class="text">Telefono</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="date" name="ingreso" required>
                        <span class="text">Fecha de Ingreso</span>
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
                    <input type="submit" name="" value="Registrar">
                </div>
            </div>
            </form>
        </div>
    </body>
</html>
