<?php 
// Envio de mail

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email_user{

    public $email;

    public function __construct($email) {
        $this->email = $email;
    }

    // Envio general de email a usuarios registrados
    public function envio_A_User(){
        $mail = new PHPMailer(true);
               
        try{
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
             // Destinatarios
                $mail->isSMTP();
                $mail->Host = 'smtp.ionos.es';
                $mail->SMTPAuth = true;
                $mail->Username = 'info@barcoyote.es';
                $mail->Password = 'infocoyote120314mar';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                        
                $mail->setFrom('info@barcoyote.es');                       // Remitente
                 
                $mail->Subject = 'Nuevas ofertas';
    
                // Usamos html para el cuerpo del mensaje
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';
    
                $contenido = "<html>";
                $contenido .= "<p>Hola, hemos actualizado nuestras ofertas,</p>";
                $contenido .= "<p>visite nuestra web y en su seccion de usuarios encontrara las nuevas ofertas </p>";
                $contenido .= "<p>Gracias por a su atención</p>";
                $contenido .= "</html>";
    
                $mail->Body = $contenido;
                
                foreach($this->email as $user){
                    $mail->addAddress($user, 'Bar Coyote Música'); 
                    $mail->send();
                }
                
        } catch (Exception $e) {
            echo "No se pudo enviar el mensaje. Error de correo: {$mail->ErrorInfo}";
        }


    }


}

?>;