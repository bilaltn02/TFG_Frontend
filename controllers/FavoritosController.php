<?php

class FavoritosController {

    private $service;
    private $view;

    public function __construct() {
        $this->service = new FavoritosService();
        $this->view = new FavoritosView();
    }

    public function favoritos() {
        session_start();
        if (isset($_SESSION['usuario'])) {
            $datoUsuario = $_SESSION["usuario"];

            $id=$_COOKIE["user"];
            $productos = $this->service->getFavoritos($id);

            $this->view->mostrarFavoritos($productos);
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
            $borrar = $_POST['borrar'];

            $this->service->deleteFavorito($borrar);
        }
        header("Location: index.php?action=favoritos&controller=Favoritos");
    }

}
