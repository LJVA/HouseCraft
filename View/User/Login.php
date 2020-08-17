<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HouseCraft</title>
        <link rel="stylesheet" type="text/css" href="Assets/Css/login.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.LOGIN').click(function(){
                    $('.fold').toggleClass('active')
                })
            })
        </script>
    </head>
    <body>
        
        
        <div>
            <ul>
                <li>B</li>
                <li>I</li>
                <li>E</li>
                <li>N</li>
                <li>V</li>
                <li>E</li>
                <li>N</li>
                <li>I</li>
                <li>D</li>
                <li>O</li>
            </ul>
        </div>
        
        
        <div>
            <h1 class="type"></h1>
            <script type="text/javascript" src="Assets/Css/typed.js"></script>
            <script type="text/javascript">
                var typed = new Typed(".type", {
                    strings: [
                        "BIENVENIDO DE NUEVO",
                        "INICIA SESION PARA ACCEDER A TODAS NUESTRAS UTILIDADES",
                        "QUE TENGAS UNA LINDA ESTADIA EN NUESTRA PAGINA",
                        "ELABORADO POR LONNYS VARELA ARAUJO",
                        "EXITO!!!"
                    ],
                    typeSpeed: 50,
                    backSpeed: 50,
                    loop: true
                });
            </script>
        </div>
        
        
        <div class="container">
            <div class="LOGIN">CLICK AQUI PARA LOGEAR</div>
            <div class="fold">
                <form action="index.php?c=housecraft&a=Validar" method="post">
                    <input type="text" name="correo" placeholder="CORREO ELECTRONICO" required>
                    <input type="password" name="password" placeholder="PASSWORD" required>
                    <input type="submit" name="accion" value="INGRESAR">
                    <a href="#">OLVIDE MI PASSWORD</a>
                </form>
            </div>
        </div>
    </body>
</html>
