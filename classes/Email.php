<?php 
// Envio de mail

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email{

    public $email;
    public $nombre;
    public $token;
    
    public function __construct($email, $nombre, $token) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){

        // Crear el objeto de mail
        $mail = new PHPMailer(true);
        
        try{
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
            $mail->isSMTP();                                 // MAIL_MAILER=smtp
            $mail->Host = 'smtp.ionos.es';                   // MAIL_HOST=sandbox.smtp.mailtrap.io
            $mail->SMTPAuth = true;
            $mail->Username = 'info@barcoyote.es';           // MAIL_USERNAME=476cbde3c5d651
            $mail->Password = 'infocoyote120314mar';             // MAIL_PASSWORD=9d7e096386d412
            $mail->SMTPSecure = 'tls';                       // MAIL_ENCRYPTION=tls
            $mail->Port = 587;                               // MAIL_PORT=2525
                    
        
            $mail->setFrom('info@barcoyote.es');                       // Remitente
            $mail->addAddress( $this->email, 'App_salon');          // Destinatario
            $mail->Subject = 'Tienes un nuevo correo';

            // Usamos html para el cuerpo del mensaje
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $contenido = "<html>";
            $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> has creado tu cuenta en el Bar Coyote, solo debes confirmarla presionando en el siguiente enlace: </p>";
            $contenido .= "<p>Presione aqui: <a href='http://localhost:3000/confirmar?token=" . $this->token . "'>Confirmar cuenta</a>";
            $contenido .= "<p>Si no solicito esta cuenta, puede ignorar el mensaje </p>";
            $contenido .= "</html>";

            $mail->Body = $contenido;

            $mail->send();
           
        } catch (Exception $e) {
            echo "No se pudo enviar el mensaje. Error de correo: {$mail->ErrorInfo}";
        }

    }

    public function enviarInstrucciones(){
        $mail = new PHPMailer(true);
        
        try{
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
            $mail->isSMTP();
            $mail->Host = 'smtp.ionos.es';
            $mail->SMTPAuth = true;
            $mail->Username = 'info@barcoyote.es';
            $mail->Password = 'infocoyote120314mar';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
                    
        
            $mail->setFrom('info@barcoyote.es');                       // Remitente
            $mail->addAddress( $this->email, 'App_salon');             // Destinatario
            $mail->Subject = 'Instrucciones restablecer password';

            // Usamos html para el cuerpo del mensaje
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $contenido = "<html>";
            $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado restablecer el password, sigue el siguiente enlace: </p>";
            $contenido .= "<p>Presione aqui: <a href='http://localhost:3000/usuarios/recuperar?token=" . $this->token . "'>Restablecer</a>";
            $contenido .= "<p>Si no solicito esta cuenta, puede ignorar el mensaje </p>";
            $contenido .= "</html>";

            $mail->Body = $contenido;

            $mail->send();
           
        } catch (Exception $e) {
            echo "No se pudo enviar el mensaje. Error de correo: {$mail->ErrorInfo}";
        }


    }

}

?>