<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $mensaje = htmlspecialchars($_POST['mensaje']);
//Recibido
    $destino = tecnologicalgt@gmail.com; 
    $asunto = "Nuevo mensaje de contacto";
// Cuerpo
    $cuerpo = "Nombre: " . $nombre . "\n";
    $cuerpo .= "Correo: " . $correo . "\n\n";
    $cuerpo .= "Mensaje:\n" . $mensaje;
// Cabecera
    $headers = "From: " . $correo . "\r\n";
    $headers .= "Reply-To: " . $correo . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
// Enviar
    if (mail($destino, $asunto, $cuerpo, $headers)) {
        echo "<p>Mensaje enviado correctamente. ¡Gracias por contactarnos!</p>";
    } else {
        echo "<p>Hubo un error al enviar el mensaje. Intenta nuevamente más tarde.</p>";
    }
} else {
    // Si no es un POST, redirige al formulario de contacto
    header("Location: contacto.html");
    exit();
}
?>