<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HouseCraft</title>
        <link rel="stylesheet" type="text/css" href="Assets/Css/formRegistro2.css">
    </head>
    <body>
        <div class="container">
            <form action="index.php?c=categoria&a=Actualizar" method="post" enctype="multipart/form-data">
            <h2>Edicion de Datos</h2>
            <div hidden="" class="row100">
                <div hidden="" class="col">
                    <div hidden="" class="inputBox">
                        <input hidden="" type="text" name="codigo" required value="<?=$category->getCodigo();?>">
                        <span hidden="" class="text">Codigo</span>
                        <span hidden="" class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="descripcion" required value="<?=$category->getDescripcion();?>">
                        <span class="text">Descripcion</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="date" name="ingreso" required value="<?=$category->getFecha();?>">
                        <span class="text">Fecha de Creacion</span>
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
