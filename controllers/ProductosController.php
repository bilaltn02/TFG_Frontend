<?php

class ProductosController {

    // Obtiene una instancia del modelo y de la vista de tareas
    private $service;
    private $view;
    private $model;

    public function __construct() {
        $this->service = new ProductosService();
        $this->view = new ProductosView();
        $this->model = new ProductosModel();
    }

    public function productos() {
        session_start();
        if (isset($_SESSION['usuario'])) {
            $datoUsuario = $_SESSION["usuario"];

            $productos = $this->service->getProductos();

            $this->view->mostrarProductos($productos);
        } else {
            header("Location: index.php");
        }
    }

    public function producto() {
        session_start();
        if (isset($_SESSION['usuario'])) {
            $datoUsuario = $_SESSION["usuario"];

            $producto = $this->service->getOneProducto($_GET["id"]);

            $this->view->mostrarunProducto($producto);

            if (isset($_POST['productoid']) || isset($_POST['usuarioid'])) {
                $usuarioid = $_POST["usuarioid"];
                $productoid = $_POST["productoid"];
                $fechaActual = date("Y-m-d");
                echo $usuarioid . $productoid;

                $res = $this->service->insertarFavorito($usuarioid, $productoid, $fechaActual);
            }
        } else {
            header("Location: index.php");
        }
    }

    public function insertarproducto() {
        session_start();
        if (isset($_SESSION['usuario'])) {
            $datoUsuario = $_SESSION["usuario"];

            $categorias = $this->service->getCategorias();

            $this->view->mostrarInsertarProducto();

            if (isset($_POST['titulo']) || isset($_POST['precio']) || isset($_POST['descripcion']) || isset($_POST['imagenes']) || isset($_POST['fecha']) || isset($_POST['usuarioid']) || isset($_POST['categoriaid'])) {
                $titulo = $_POST['titulo'];
                $precio = $_POST['precio'];
                $descripcion = $_POST['descripcion'];
                $imagenes = $_POST['imagenes'];
                $fecha = date("Y-m-d");
                $usuarioid = $_COOKIE["user"];
                $categoriaid = $_POST['categoriaid'];

                $res = $this->service->insertarProducto($titulo, $precio, $descripcion, $imagenes, $fecha, $usuarioid, $categoriaid);
            }
        } else {
            header("Location: index.php");
        }
    }

    public function adminproductos() {
        session_start();
        if (isset($_SESSION['usuario']) && $_COOKIE["rol"] == "admin") {
            $datoUsuario = $_SESSION["usuario"];

            $productos = $this->service->getProductos();

            $this->view->mostrarProductosadmin($productos);
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

            $this->service->deleteProducto($id);
        }
        header("Location: index.php?action=adminproductos&controller=Productos");
    }

    public function productocategoria() {
        session_start();
        if (isset($_SESSION['usuario'])) {
            $datoUsuario = $_SESSION["usuario"];

            $productos = $this->service->getProductoCategoria($_GET["idcat"]);

            $this->view->mostrarProductosCategoria($productos);

//            if (isset($_POST['productoid']) || isset($_POST['usuarioid'])) {
//                $usuarioid = $_POST["usuarioid"];
//                $productoid = $_POST["productoid"];
//                $fechaActual = date("Y-m-d");
//                echo $usuarioid . $productoid;
//
//                $res = $this->service->insertarFavorito($usuarioid, $productoid, $fechaActual);
//            }
        } else {
            header("Location: index.php");
        }
    }

    public function misproductos() {
        session_start();
        if (isset($_SESSION['usuario'])) {
            $datoUsuario = $_SESSION["usuario"];

            $productos = $this->service->getUsuarioid($_COOKIE["user"]);

            $this->view->mostrarMisProductos($productos);
        } else {
            header("Location: index.php");
        }
    }

    public function borrarproducto() {
        //echo "<script>
        //            Swal.fire({
        //            title: 'Producto eliminado de favoritos',
        //            confirmButtonText: 'OK',
        //            })
        //            </script>";

        if (isset($_POST['borrar'])) {
            $id = $_POST['borrar'];

            $this->service->deleteProducto($id);
        }
        header("Location: index.php?action=misproductos&controller=Productos&id=" . $_COOKIE["user"]);
    }

    public function productoscategoria() {

        if (isset($_POST['categoriaid'])) {
            $id = $_POST['categoriaid'];

            $productos= $this->model->productos($id);
            
            $this->view->mostrarProductosDeCategoria($productos);
        }
//        header("Location: index.php?action=misproductos&controller=Productos&id=" . $_COOKIE["user"]);
    }

}
