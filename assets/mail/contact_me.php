<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "contacto.artistica@gmail.com"; // Add your email address in between the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Formulario de Contacto de Artistica2021:  $name";
$body = "Ha recibido un nuevo mensaje del formulario de contacto de su sitio web.\n\n"."Aqui estan los detalles:\n\nName: $name\n\nEmail: $email\n\nTeléfono: $phone\n\nMensaje:\n$message";
$header = "De: contacto.artistica2021@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Responder a: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
