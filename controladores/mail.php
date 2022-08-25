<?php
//require_once '../config/conexion.php';
 require_once '../assets/PHPMailer/PHPMailerAutoload.php'; 

function enviarAlerta($conection, $temperatura, $humedad, $nb_ubicacion, $nb_dispositivo){
   
    
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->IsHTML(true);
$mail->Host = 'smtp.office365.com';
$mail->Port       = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth   = true;
$mail->Username = 'ssocialsys@teleton-oax.org.mx';
$mail->Password = 'Sslsso4x';
$mail->SetFrom('ssocialsys@teleton-oax.org.mx', 'FromEmail');

$mail->Subject = 'SITE TELETON';

//empieza el cuerpo de mensaje en html
$message ="<html><body>";
$message .= "<table  class='table table-bordered' width='100%' bgcolor='#E0FFFF' cellpaddind='0' cellspacing='0' border='0'>";

   $message .= "<table class='table table-bordered' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:620px; background-color:#000000; font-family:Helvetica, Geneva, sans-serif;'>";

   $message .= "<thead>
      <tr height='80'>
        
       <th colspan='4' style='background-color:#AB82FF; text-align:center; border-bottom:solid 0px #000000; font-family:Ginebra, Geneva, sans-serif; color:#000000; font-size:10px;' ><h1>Este correo puede ser importante</h1></th>

      </tr>
      </thead>";

   $message .= "<tbody>
      <tr align='center' height='50' style='font-family:Helvetica, Geneva, sans-serif;'>
       <td style='background-color:#808080;background: White; text-align:center;'><a  style='color:#808080;

      </tr>

      <tr>
       <td colspan='4' style='padding:15px;'>
       <h1 style=' text-align:center; border-bottom:solid 0px #000000; font-family:Ginebra, Geneva, sans-serif; color:#000000; font-size:8px;'><h1>Alerta!!</h1></h1>
        <p class='card-text' style='color:black; font-size:15px;'>Temperatura: ".$temperatura." °C; <br> Humedad: ".$humedad."  % <br>Dispositivo: ".$nb_dispositivo." <br>Ubicacion: ".$nb_ubicacion."  </p><br>

        <img src='https://media.informabtl.com/wp-content/uploads/2016/12/teleto%CC%81n.jpg' style='height:auto; align='right' width:20%; max-width:20%;'/>

         <a href='#' style='font-size:12px;'class='btn btn-primary'>Mas informacion</a>
        <hr />
        
        <p class='card-text' style='color:black; font-size:13px;'>Teleton Crit Oaxaca <br>Boulevard Guadalupe Hinojosa del Murat 1000, 71248 San Raymundo Jalpam, Oax.</p>
       
        
       
       </td>
      </tr>

      </tbody>";

   $message .= "</table>";

   $message .= "</td></tr>";
   $message .= "</table>";
$message .= "</body></html>";
   


$result = mysqli_query($conection,"SELECT fl_correo, nb_correo FROM c_correo WHERE fg_activo=1");

while ($row = $result->fetch_array()) {
   // $mail->AltBody = 'Para ver el menasje, please use un  visor de email compatible con HTML';
    $mail->Body    = $message;
    $mail->addAddress($row['nb_correo']);

    if (!$mail->send()) {
      echo "Mailer Error:" . $mail->ErrorInfo . "<br />";
     break;

    }
    $mail->clearAddresses();
    $mail->clearAttachments();
}
    
}




 ?>
