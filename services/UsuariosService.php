<?php

class UsuariosService {

    public function iniciarSesion($email, $contraseña) {
        $envio = json_encode(array("user" => $email, "contrasena" => $contraseña));
        $urlmiservicio = "http://localhost:3000/tfg/usuario/login";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json' . mb_strlen($envio)));
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $usuario = curl_exec($conexion);

        curl_close($conexion);

        return $usuario;
    }

    public function insertarUsuarios($nombre, $apellidos, $email, $contrasena, $telefono, $provincia, $localidad, $cp, $direccion, $rol) {
        $envio = json_encode(array("nombre" => $nombre, "apellidos" => $apellidos, "email" => $email, "contrasena" => $contrasena, "telefono" => $telefono, "provincia" => $provincia, "localidad" => $localidad, "codigopostal" => $cp, "direccion" => $direccion, "rol" => $rol));
        $urlmiservicio = "http://localhost:3000/tfg/usuario";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPHEADER,
                array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));
        curl_setopt($conexion, CURLOPT_POST, TRUE);
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = json_decode(curl_exec($conexion), true);

        if ($res) {
            echo "<script>
            Swal.fire({
            title: '" . $res . "',
            confirmButtonText: 'OK',

            })
            </script>";
        }
    }

    public function actualizarUsuario($nombre, $apellidos, $email, $contrasena, $telefono, $provincia, $localidad, $cp, $direccion) {
        $envio = json_encode(array("nombre" => $nombre, "apellidos" => $apellidos, "email" => $email, "contrasena" => $contrasena, "telefono" => $telefono, "provincia" => $provincia, "localidad" => $localidad, "codigopostal" => $cp, "direccion" => $direccion));
        $urlmiservicio = "http://localhost:3000/tfg/usuario/" . $_COOKIE["user"];
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array(
            'Content-type: application/json',
            'Content-Length: ' . mb_strlen($envio)
        ));
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);

        if ($res) {
            echo "<script>
            Swal.fire({
            title: '" . $res . "',
            text: 'Es necesario cerrar sesión para mostrar los cambios',
            confirmButtonText: 'OK',
            })
            </script>";
        }

        curl_close($conexion);
    }

    public function getOneUsuario() {
        $urlmiservicio = "http://localhost:3000/tfg/usuario/" . $_COOKIE["user"];
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $usuario = curl_exec($conexion);

        curl_close($conexion);

        return $usuario;
    }

    public function getUsuario($id) {
        $urlmiservicio = "http://localhost:3000/tfg/usuario/" . $id;
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $usuario = curl_exec($conexion);

        curl_close($conexion);

        return $usuario;
    }

    public function getUsuarios() {
        $urlmiservicio = "http://localhost:3000/tfg/usuario";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $usuarios = curl_exec($conexion);

        curl_close($conexion);

        return $usuarios;
    }

    function deleteUsuario($id) {
        echo $id;
        $urlmiservicio = "http://localhost:3000/tfg/usuario/" . $id;
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'DELETE');
        //Campos que van en el envío
        //curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        if ($res) {
            echo "<script>
            Swal.fire({
            title: '" . $res . "',
            text: 'Los cambios se mostrarán al cerrar sesión',
            confirmButtonText: 'OK',

            })
            </script>";
        }

        curl_close($conexion);
    }

}
