<?php

class FavoritosService {

    public function getFavoritos($id) {
        $urlmiservicio = "http://localhost:3000/tfg/favorito/" . $id;
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $productos = curl_exec($conexion);

        curl_close($conexion);

        return $productos;
    }
    
    function deleteFavorito($borrar) {
        $urlmiservicio = "http://localhost:3000/tfg/favorito/". $borrar;
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
            echo "<br>Salida request_delete<br>";
            print_r($res);
        }
        curl_close($conexion);
    }


}

