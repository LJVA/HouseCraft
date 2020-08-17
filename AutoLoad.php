<?php
function autoCarga($nombreClase){
    include_once 'Controller/'.$nombreClase.'.php';
}
spl_autoload_register('autoCarga');
?>

