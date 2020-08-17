<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HouseCraft</title>
        <link rel="stylesheet" type="text/css" href="Assets/Css/formRegistro2.css">
    </head>
    <body>
        <div class="container">
            <form action="index.php?c=articulo&a=Registrar" method="post" enctype="multipart/form-data">
            <h2>Registro Articulos</h2>
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
                        <input type="text" name="descripcion" required>
                        <span class="text">Descripcion</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <select class="category" name="categoria">
                            <?php foreach ($categorias as $posicion=> $categoria): ?>
                            <option><?= $categoria->getDescripcion();?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="text">Categoria</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="precio" required>
                        <span class="text">Precio en Colones</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="file" name="imagen" required>
                        <span class="text">Foto del articulo</span>
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
