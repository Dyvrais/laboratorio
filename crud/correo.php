
<div class="container">
<div class="page-header">
<h1>Crear reporte medico</h1>      
</div>

<div class="form"> 
<form class="form-horizontal" action="" method="post">

<div class="form-group">
  <label class="control-label col-sm-2" for="mailto">Email A:</label>
  <div class="col-sm-10">
      <input type="email" class="form-control" id="mailto" placeholder="Ingrese Email A" name="mailto" value="<?php echo $_POST['mailto']; ?>">
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="mailfrom">Mail De:</label>
  <div class="col-sm-10">
      <input type="email" class="form-control" id="mailfrom" placeholder="Ingrese Email De" name="mailfrom" value="<?php echo $_POST['mailfrom']; ?>">
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="">Asunto Email:</label>
  <div class="col-sm-10">
      <input type="text" class="form-control" id="mailsubject" placeholder="Ingrese Asunto Email" name="mailsubject" value="<?php echo $_POST['mailsubject']; ?>">
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="firstname">Nombres:</label>
  <div class="col-sm-10">
      <input type="text" class="form-control" id="firstname" placeholder="Ingrese Nombres" name="firstname" value="<?php echo $_POST['firstname']; ?>">
  </div>
</div>

<div class="form-group">
  <label class="control-label col-sm-2" for="lastname">Apellidos:</label>
  <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" placeholder="Ingrese Apellidos" name="lastname" value="<?php echo $_POST['lastname']; ?>">
  </div>
</div> 


<div class="form-group">
  <label class="control-label col-sm-2" for="description">Descripcion:</label>
  <div class="col-sm-10">
      <textarea placeholder="Ingrese Descripcion" class="form-control" id="description"  name="description" style=" height: 268px;"><?php echo $_POST['description']; ?></textarea>
  </div>
</div> 

<div class="form-group">        
  <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Crear y Enviar PDF</button>
  </div>
</div>
</form>
</div>

</div>
<?php
require_once('html2pdf/html2pdf.class.php');
/*Envio de email y adjunto el PDF creado*/
$mailto = $_POST['mailto'];
$mailfrom = $_POST['mailfrom'];
$mailsubject = $_POST['mailsubject'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$description = $_POST['description'];

$description = wordwrap($description, 100, "<br />");
/* rompe el contenido de la descripci??n cada 100 caracteres despu??s. */

$content = '';
$content .= '
<style>
table {
border-collapse: collapse;
}
table{
width:800px;
 margin:0 auto;
}
td{
border: 1px solid #e2e2e2;
padding: 10px; 
max-width:520px;
word-wrap: break-word;
}
</style>';

/* Tu css */
$content .= '<table>';

$content .= '<tr><td>Email A</td> <td>' . $mailto . '</td> </tr>';
$content .= '<tr><td>Mail De</td>   <td>' . $mailfrom . '</td> </tr>';
$content .= '<tr><td>Asunto Email</td>   <td>' . $mailsubject . '</td> </tr>';
$content .= '<tr><td>Nombres</td>   <td>' . $firstname . '</td> </tr>';
$content .= '<tr><td>Apellidos</td>   <td>' . $lastname . '</td> </tr>';
$content .= '<tr><td>Descripcion</td>   <td>' . $description . '</td> </tr>';

$content .= '</table>';

// LLmamos a la biblioteca para la creacion del PDF
require_once('html2pdf/html2pdf.class.php');

// Declaramos el formato del documento PDF
$html2pdf = new HTML2PDF('P', 'A4', 'fr');

$html2pdf->setDefaultFont('Arial');
$html2pdf->writeHTML($content, isset($_GET['vuehtml']));

$html2pdf = new HTML2PDF('P', 'A4', 'fr');
$html2pdf->WriteHTML($content);


$to = $mailto;
$from = $mailfrom;
$subject = $mailsubject;

$message = "<p>Consulte el archivo adjunto.</p>";
$separator = md5(time());
$eol = PHP_EOL;
$filename = "pdf-documento.pdf";
$pdfdoc = $html2pdf->Output('', 'S');
$attachment = chunk_split(base64_encode($pdfdoc));

$headers = "From: " . $from . $eol;
$headers .= "MIME-Version: 1.0" . $eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;

$body = '';

$body .= "Content-Transfer-Encoding: 7bit" . $eol;
$body .= "This is a MIME encoded message." . $eol; //had one more .$eol


$body .= "--" . $separator . $eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
$body .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
$body .= $message . $eol;


$body .= "--" . $separator . $eol;
$body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
$body .= "Content-Transfer-Encoding: base64" . $eol;
$body .= "Content-Disposition: attachment" . $eol . $eol;
$body .= $attachment . $eol;
$body .= "--" . $separator . "--";

if (mail($to, $subject, $body, $headers)) {

	$msgsuccess = 'Email enviado Correctamente';
} else {

	$msgerror = 'Email no ha sido enviado';
}
 ?>