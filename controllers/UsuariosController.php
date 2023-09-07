<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class MailHelper {

    public function enviarCorreo($email, $asunto, $problema) {
        require '../vendor/phpmailer/phpmailer/src/Exception.php';
        require '../vendor/phpmailer/phpmailer/src/SMTP.php';
        require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
        require '../vendor/autoload.php';
        
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP y credenciales
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = 'notienedavid@gmail.com';
            $mail->Password = 'twelsqtadalnbwkw';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

            // Configuración del remitente y destinatario
            $mail->setFrom($email, 'BITNA');
            $mail->addAddress($email, 'Usuario BITNA');

            // Configuración del asunto y cuerpo del correo
            $mail->Subject = $asunto;
            $mail->Body = $problema;

            // Envío del correo
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}

class UsuariosController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $model;
    private $service;
    private $view;

    public function __construct() {
        $this->service = new UsuariosService();
        $this->model = new UsuariosModel();
        $this->view = new UsuariosView();
    }

    public function usuarios() {

        $usuarios = $this->model->usuariosDB();

        $this->view->mostrarIniciarSesion($usuarios);

        if (isset($_POST['email']) || isset($_POST['contraseña'])) {
            $nombre = $_POST['email'];
            $contrasena = $_POST['contraseña'];

            foreach ($usuarios as $usuario) {
                print_r($email);
                $codigo = $usuario["id_usuario"];
                $email = $usuario["email"];
                $nom = $usuario['nombre'];
                $ape = $usuario['apellidos'];
                $clave = $usuario["contrasena"];
                $tel = $usuario['telefono'];
                $dir = $usuario['direccion'];
                $provincia = $usuario['provincia'];
                $localidad = $usuario['localidad'];
                $cp = $usuario['codigopostal'];
                $rol = $usuario['rol'];

                if (isset($nombre) || isset($contraseña)) {
                    if ($nombre == $email && $contrasena == $clave) {
                        session_start();
                        $_SESSION["usuario"] = $codigo;

                        if (!isset($_COOKIE["user"])) {
                            setcookie("user", $codigo, time() + 3600 * 24);
                        } else {
                            $conexion = (int) $_COOKIE["user"];
                            setcookie("user", $codigo, time() + 3600 * 24);
                        }

                        if (!isset($_COOKIE["email"])) {
                            setcookie("email", $email, time() + 3600 * 24);
                        } else {
                            $conexion = (int) $_COOKIE["email"];
                            setcookie("email", $email, time() + 3600 * 24);
                        }

                        if (!isset($_COOKIE["nombre"])) {
                            setcookie("nombre", $nom, time() + 3600 * 24);
                        } else {
                            $conexion = (int) $_COOKIE["nombre"];
                            setcookie("nombre", $nom, time() + 3600 * 24);
                        }

                        if (!isset($_COOKIE["apellidos"])) {
                            setcookie("apellidos", $ape, time() + 3600 * 24);
                        } else {
                            $conexion = (int) $_COOKIE["apellidos"];
                            setcookie("apellidos", $ape, time() + 3600 * 24);
                        }

                        if (!isset($_COOKIE["telefono"])) {
                            setcookie("telefono", $tel, time() + 3600 * 24);
                        } else {
                            $conexion = (int) $_COOKIE["telefono"];
                            setcookie("telefono", $tel, time() + 3600 * 24);
                        }

                        if (!isset($_COOKIE["provincia"])) {
                            setcookie("provincia", $provincia, time() + 3600 * 24);
                        } else {
                            $conexion = (int) $_COOKIE["provincia"];
                            setcookie("provincia", $provincia, time() + 3600 * 24);
                        }

                        if (!isset($_COOKIE["localidad"])) {
                            setcookie("localidad", $localidad, time() + 3600 * 24);
                        } else {
                            $conexion = (int) $_COOKIE["localidad"];
                            setcookie("localidad", $localidad, time() + 3600 * 24);
                        }

                        if (!isset($_COOKIE["cp"])) {
                            setcookie("cp", $cp, time() + 3600 * 24);
                        } else {
                            $conexion = (int) $_COOKIE["cp"];
                            setcookie("cp", $cp, time() + 3600 * 24);
                        }

                        if (!isset($_COOKIE["direccion"])) {
                            setcookie("direccion", $dir, time() + 3600 * 24);
                        } else {
                            $conexion = (int) $_COOKIE["direccion"];
                            setcookie("direccion", $dir, time() + 3600 * 24);
                        }

                        if (!isset($_COOKIE["rol"])) {
                            setcookie("rol", $rol, time() + 3600 * 24);
                        } else {
                            $conexion = (int) $_COOKIE["rol"];
                            setcookie("rol", $rol, time() + 3600 * 24);
                        }
                        header("Location: index.php?action=productos&controller=Productos");
                    }
                }
            }
            echo "<script>
            Swal.fire({
            title: 'Nombre/Contraseña incorrecto',
            confirmButtonText: 'OK',

            })
            </script>";
        }
    }

    public function registro() {
        $this->view->mostrarRegistro();

        if (isset($_POST['cp']) || isset($_POST['provincia']) || isset($_POST['localidad']) || isset($_POST['email']) || isset($_POST['contraseña']) || isset($_POST['nombre']) || isset($_POST['telefono']) || isset($_POST['direccion']) || isset($_POST['apellidos'])) {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $apellidos = $_POST['apellidos'];
            $contrasena = $_POST['contraseña'];
            $provincia = $_POST['provincia'];
            $localidad = $_POST['localidad'];
            $cp = $_POST['cp'];
            $rol = "user";

            $res = $this->service->insertarUsuarios($nombre, $apellidos, $email, $contrasena, $telefono, $provincia, $localidad, $cp, $direccion, $rol);
        }
//        header("Location: index.php");
    }

    public function perfil() {
        session_start();
        if (isset($_SESSION['usuario'])) {
            $datoUsuario = $_SESSION["usuario"];

            $this->view->mostrarPerfil();
        } else {
            header("Location: index.php");
        }
    }

    public function editarperfil() {
        session_start();
        if (isset($_SESSION['usuario'])) {
            $datoUsuario = $_SESSION["usuario"];

            $usuario = $this->service->getOneUsuario();

            $this->view->mostrarEditarPerfil($usuario);

            if (isset($_POST['cp']) || isset($_POST['provincia']) || isset($_POST['localidad']) || isset($_POST['email']) || isset($_POST['contraseña']) || isset($_POST['nombre']) || isset($_POST['telefono']) || isset($_POST['direccion']) || isset($_POST['apellidos'])) {
                $nombre = $_POST['nombre'];
                $email = $_POST['email'];
                $telefono = $_POST['telefono'];
                $direccion = $_POST['direccion'];
                $apellidos = $_POST['apellidos'];
                $contrasena = $_POST['contraseña'];
                $provincia = $_POST['provincia'];
                $localidad = $_POST['localidad'];
                $cp = $_POST['cp'];

                $res = $this->service->actualizarUsuario($nombre, $apellidos, $email, $contrasena, $telefono, $provincia, $localidad, $cp, $direccion);
            }
        } else {
            header("Location: index.php");
        }
    }

    public function perfilUsuarioX() {
        session_start();
        if (isset($_SESSION['usuario'])) {
            $datoUsuario = $_SESSION["usuario"];

            $usuario = $this->service->getUsuario($_GET["id"]);

            $this->view->mostrarPerfilUsuarioX($usuario);
        } else {
            header("Location: index.php");
        }
    }

    public function adminusuarios() {
        session_start();
        if (isset($_SESSION['usuario']) && $_COOKIE["rol"] == "admin") {
            $datoUsuario = $_SESSION["usuario"];

            $usuarios = $this->service->getUsuarios();

            $this->view->mostrarUsuarios($usuarios);
        } else {
            header("Location: index.php");
        }
    }

    public function borrar() {
        //echo "<script>
        //            Swal.fire({
        //            title: 'Producto eliminado de favoritos',
        //            confirmButtonText: 'OK',
        //            })
        //            </script>";

        if (isset($_POST['borrar'])) {
            $id = $_POST['borrar'];

            $this->service->deleteUsuario($id);
        }
        header("Location: index.php?action=adminusuarios&controller=Usuarios");
    }

    public function enviarMail() {
        session_start();
        if (isset($_SESSION['usuario'])) {
            $datoUsuario = $_SESSION["usuario"];

            $usuario = $this->service->getOneUsuario();

            $this->view->enviarMail($usuario);

            if (isset($_POST["email"]) && isset($_POST["asunto"]) && isset($_POST["problema"])) {
                $email = $_POST["email"];
                $asunto = $_POST["asunto"];
                $problema = $_POST["problema"];

                $mailHelper = new MailHelper();
                $enviado = $mailHelper->enviarCorreo($email, $asunto, $problema);

                if ($enviado) {
                    echo "<script>
                    Swal.fire({
                    title: 'Email enviado correctamente',
                    confirmButtonText: 'OK',
                    })
                    </script>";
                } else {
                    echo "<script>
                    Swal.fire({
                    title: 'Error al enviar el correo',
                    confirmButtonText: 'OK',
                    })
                    </script>";
                }
            }
        } else {
            header("Location: index.php");
        }
    }

}
