<link rel="stylesheet" type="text/css" href="Assets/Css/menuLateral.css">
<section class="compra">
<form action="index.php?c=housecraft&a=Comprar" method="post">
    <input type="datetime-local" name="fecha">
    <input hidden type="text" name="codigo" value="<?=$articulo->getCodigo();?>">
    <input type="text" name="nombre" placeholder="Ingrese su nombre completo">
    <input type="number" name="telefono" placeholder="Ingrese su numero telefonico">
    <input type="text" name="correo" placeholder="Ingrese un correo electronico de contacto">
    <input type="text" name="direccion" placeholder="Ingrese su direccion residencial">
    <input type="number" name="tarjeta" placeholder="Ingrese su numero de tarjeta de credito/debito">
    <input type="submit" name="" value="Confirmar Compra">
</form>
</section>

