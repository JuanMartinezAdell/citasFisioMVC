<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



class Email
{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {

        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '8cda9fe0a87a35';
        $mail->Password = 'd940c73bec2ce8';

        $mail->setFrom('cuentas@citasfisio.es');
        $mail->addAddress('cuentas@citasfisio.es', 'citas.juanmartinezadell.es');
        $mail->Subject = 'Confirma tu cuenta';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en Citas Fisio, solo debes confirmarlar  presionando el siguiente enlace</p>";
        $contenido .= "<p>presiona aquí: <a href='http://localhost:8080/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puerdes ignorar el mensaje </p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //Emviar el mail
        $mail->send();
    }

    public function enviarInstrucciones()
    {
        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '8cda9fe0a87a35';
        $mail->Password = 'd940c73bec2ce8';

        $mail->setFrom('cuentas@citasfisio.es');
        $mail->addAddress('cuentas@citasfisio.es', 'citas.juanmartinezadell.es');
        $mail->Subject = 'Restablece tu password';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitiado restablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
        $contenido .= "<p>presiona aquí: <a href='http://localhost:8080/recuperar?token=" . $this->token . "'>Restablecer Password</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puerdes ignorar el mensaje </p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //Emviar el mail
        $mail->send();
    }
}
