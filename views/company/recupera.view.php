<?php
// Iniciar sesión para poder usar variables de sesión
session_start();

// Conexión a la base de datos (reemplaza con tus propios datos)
$db = new mysqli('localhost', 'usuario', 'contraseña', 'nombre_base_de_datos');

if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $db->real_escape_string($_POST['email']);

    // Verificar si el email existe en la base de datos
    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        // Generar token único
        $token = bin2hex(random_bytes(50));

        // Almacenar el token en la base de datos
        $query = "UPDATE usuarios SET reset_token = '$token', reset_token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = '$email'";
        $db->query($query);

        // Enviar email con el enlace de recuperación
        $reset_link = "http://tudominio.com/reset_password.php?token=$token";
        $to = $email;
        $subject = "Recuperación de contraseña";
        $msg = "Para restablecer tu contraseña, haz clic en este enlace: $reset_link";
        $headers = "From: noreply@tudominio.com";

        if (mail($to, $subject, $msg, $headers)) {
            $message = "Se ha enviado un enlace de recuperación a tu email.";
        } else {
            $message = "Hubo un problema al enviar el email. Por favor, inténtalo de nuevo.";
        }
    } else {
        $message = "No se encontró ninguna cuenta con ese email.";
    }
}

$db->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
</head>

<body>
    <h2>Recuperar Contraseña</h2>

    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <input type="submit" value="Recuperar Contraseña">
    </form>
</body>

</html>