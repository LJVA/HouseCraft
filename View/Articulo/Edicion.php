<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HouseCraft</title>
        <link rel="stylesheet" type="text/css" href="Assets/Css/formRegistro2.css">
    </head>
    <body>
        <div class="container">
            <form action="index.php?c=articulo&a=Actualizar" method="post" enctype="multipart/form-data">
            <h2>Edicion de Datos</h2>
            <div hidden class="row100">
                <div hidden class="col">
                    <div hidden class="inputBox">
                        <input hidden type="text" readonly name="codigo" required value="<?=$articulo->getCodigo();?>">
                        <span hidden class="text">Codigo</span>
                        <span hidden class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="nombre" required value="<?=$articulo->getNombre();?>">
                        <span class="text">Nombre</span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" name="descripcion" required value="<?=$articulo->getDescripcion();?>">
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
                        <input type="text" name="precio" required value="<?=$articulo->getPrecio();?>">
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
                    <div class="inputBox">
                        <select class="category" name="estado">
                            <option>Activo</option>
                            <option>Inactivo</option>
                            <option>Agotado</option>
                        </select>
                        <span class="text">Estado</span>
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
