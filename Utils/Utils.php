<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';


class Utils{
    
    public static function logeado(){
        if(isset($_SESSION['tipo'])){
            return true;
        }else{
            return false;
        }
    }
    
    public static function admin(){
        if($_SESSION['tipo']==1){
            return true;
        }else{
            return false;
        }
    }
    
    
    public static function envioCorreo($correo,$comprador,$asunto,$cuerpo){
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;                      
            $mail->isSMTP();                                          
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                 
            $mail->Username   = 'housecraft12345@gmail.com';               
            $mail->Password   = 'House12345';                             
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      
            $mail->Port       = 587;
            $mail->setFrom('housecraft12345@gmail.com', 'House Craft');
            $mail->addAddress($correo, $comprador);
            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body    = $cuerpo.'<br>HOUSE CRAFT</br>';
            $mail->send();
        } catch (Exception $e) {
            echo "MESAJE DE ERROR: {$mail->ErrorInfo}";
        }
    }
    
    public static function mostrarAlert($mensaje){
        echo '<script type="text/javascript">
             alert("'.$mensaje.'");
             window.location.href="index.php";
             </script>';
    }
}
?>

