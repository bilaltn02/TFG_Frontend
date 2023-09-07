<?php

class ProductosService {

    public function insertarProducto($titulo, $precio, $descripcion, $imagenes, $fecha, $usuarioid, $categoriaid) {
        $envio = json_encode(array("titulo" => $titulo, "precio" => $precio, "descripcion" => $descripcion, "imagenes" => $imagenes, "fecha" => $fecha, "usuarioIdUsuario" => $usuarioid, "categoriumIdCategoria" => $categoriaid));
        $urlmiservicio = "http://localhost:3000/tfg/producto";
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
            title: 'Producto subido!!!!!',
            confirmButtonText: 'OK',
            })
            </script>";
        }

        curl_close($conexion);
    }

    public function insertarFavorito($usuarioid, $productoid, $fechaActual) {
        $envio = json_encode(array("usuarioIdUsuario" => $usuarioid, "productoIdProducto" => $productoid, "fecha" => $fechaActual));
        $urlmiservicio = "http://localhost:3000/tfg/favorito";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPHEADER,
                array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));
        curl_setopt($conexion, CURLOPT_POST, TRUE);
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);

        if ($res) {
            echo "<script>
            Swal.fire({
            title: 'Guardado en favoritos',
            text: 'Para eliminarlo de la lista de favoritos vaya a la vista de favoritos',
            confirmButtonText: 'OK',

            })
            </script>";
        }

        curl_close($conexion);
    }

    public function getProductos() {
        $urlmiservicio = "http://localhost:3000/tfg/producto";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $productos = curl_exec($conexion);

        curl_close($conexion);

        return $productos;
    }

    public function getCategorias() {
        $urlmiservicio = "http://localhost:3000/tfg/categoria";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $categorias = curl_exec($conexion);

        curl_close($conexion);

        return $categorias;
    }

    public function getUsuarioid($id) {
        $urlmiservicio = "http://localhost:3000/tfg/usuario/" . $_COOKIE["user"];
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $categorias = curl_exec($conexion);

        curl_close($conexion);

        return $categorias;
    }

    public function getOneProducto($id) {
        $urlmiservicio = "http://localhost:3000/tfg/producto/" . $id;
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $producto = curl_exec($conexion);

        curl_close($conexion);

        return $producto;
    }

    public function deleteProducto($id) {
        $urlmiservicio = "http://localhost:3000/tfg/producto/" . $id;
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

    public function getProductoCategoria($id) {
        $urlmiservicio = "http://localhost:3000/tfg/producto/categoria/" . $id;
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $productos = curl_exec($conexion);

        curl_close($conexion);

        return $productos;
    }

}
