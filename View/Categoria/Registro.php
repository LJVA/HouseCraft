<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HouseCraft</title>
        <link rel="stylesheet" type="text/css" href="Assets/Css/formRegistro2.css">
    </head>
    <body>
        <div class="container">
            <form action="index.php?c=categoria&a=Registrar" method="post" enctype="multipart/form-data">
            <h2>Registro Categorias</h2>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="descripcion" required>
                        <span class="text">Descripcion</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="date" name="ingreso" required>
                        <span class="text">Fecha de Creacion</span>
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
