<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Load Composer's autoloader
//require 'vendor/autoload.php';
$consulta ="SELECT `Registros`.`id_reg`, `Registros`.`cedula`, `Registros`.`nombre`, 
`Areas`.`nom_area`, `Cargos`.`nom_cargo`, `Categorias`.`nom_cat`, `Tipos`.`nom_tipo`, 
`Registros`.`lugar`, `Registros`.`nivel`, `Registros`.`detalles`, `Registros`.`fecha_reg` 
FROM `Registros`
 LEFT JOIN `Cargos` ON `Registros`.`id_cargo` = `Cargos`.`id_cargo` 
LEFT JOIN `Tipos` ON `Registros`.`id_tipo` = `Tipos`.`id_tipo` 
LEFT JOIN `Areas` ON `Cargos`.`id_area` = `Areas`.`id_area` 
LEFT JOIN `Categorias` ON `Tipos`.`id_cat` = `Categorias`.`id_cat`  
ORDER BY `Registros`.`id_reg` DESC LIMIT 1";

$res = mysqli_query($cx,$consulta);
while ($row = mysqli_fetch_assoc($res)){
	$id = $row['id_reg'];
	$cedula = $row['cedula'];
	$nombre = $row['nombre'];
	$area = $row['nom_area'];
	$cargo = $row['nom_cargo'];
	$categoria = $row['nom_cat'];
	$tipo = $row['nom_tipo'];
	$lugar = $row['lugar'];
	$nivel = $row['nivel'];
	$detalles = $row['detalles'];
	$fecha = $row['fecha_reg'];
	}

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
	
    //Configuracion de servidor
    $mail->SMTPDebug = 0;					                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.office365.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'correo@correo.com.co';                     // SMTP username
    $mail->Password   = '123456';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('soporte.tic@siegfried.com.co', 'Notificador');
    $mail->addAddress('jymoreno@siegfried.com.co');     	// Add a recipient
    //$mail->addAddress('ellen@example.com');               		// Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Adjuntos
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                 // Set email format to HTML
	// Activo condificacción utf-8
	$mail->CharSet = 'UTF-8';
    $mail->Subject = 'Reporte No.'.$id.' ';
    $mail->Body    = 'Nuevo reporte critico:<br/><br/>'
	.'Cédula: '.$cedula.'<br/>'
	.'Nombre: '.$nombre.'<br/>'
	.'Área: '.$area.'<br/>'
	.'Cargo: '.$cargo.'<br/>'
	.'Categoría: '.$categoria.'<br/>'
	.'Tipo: '.$tipo.'<br/>'
	.'Lugar: '.$lugar.'<br/>'
	.'Detalles: '.$detalles.'<br/>'
	.'Fecha: '.$fecha.'<br/><br/><br/>'
	.'Esto es un e-mail de notificación, por favor NO responder.';
    //$mail->AltBody = '';
    $mail->send();
} catch (Exception $e) {
    echo "Ah ocurrido un Error: {$mail->ErrorInfo}";
}

?>
