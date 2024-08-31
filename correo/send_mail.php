<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
        $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);

                    // Configurar los detalles del correo
                        $to = "luciano.barbini.t1vl@gmail.com";  // Cambia esto por tu dirección de correo
                            $subject = "Nuevo mensaje de $name";
                                $body = "Nombre: $name\nCorreo: $email\n\nMensaje:\n$message";
                                    $headers = "From: $email";

                                        // Enviar el correo
                                            if (mail($to, $subject, $body, $headers)) {
                                                    echo "Correo enviado exitosamente.";
                                                        } else {
                                                                echo "Error al enviar el correo.";
                                                                    }
                                                                    }
                                                                    ?>