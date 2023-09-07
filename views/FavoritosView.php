<?php

class FavoritosView {

    public function mostrarFavoritos($productos) {

        $productos = json_decode(file_get_contents("http://localhost:3000/tfg/favorito/" . $_COOKIE["user"]), true);
        $resultado = [];
        foreach ($productos as $producto) {
            $primerElemento = $producto["productoIdProducto"];
            $encontrado = false;

            foreach ($resultado as $array) {
                if ($array["productoIdProducto"] == $primerElemento) {
                    $encontrado = true;
                    break;
                }
            }
            if (!$encontrado) {
                $resultado[] = $producto;
            }
        }

        echo '<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white mb-5">';
        echo '  <div class="container-fluid d-flex justify-content-between align-items-center">';
        echo '    <a class="navbar-brand" href="index.php?action=productos&controller=Productos">';
        echo '      <span class="nav_title text-white">BITNA</span>';
        echo '    </a>';
        echo '    <div class="menu-links d-flex align-items-center">';
        if ($_COOKIE["rol"] == "admin") {
            echo '      <a class="nav-link text-white me-4" href="index.php?action=adminusuarios&controller=Usuarios">';
            echo '        <span class="fs-6">Usuarios</span><i class="fas fa-users-cog ms-2"></i>';
            echo '      </a>';
            echo '      <a class="nav-link text-white me-4" href="index.php?action=adminproductos&controller=Productos">';
            echo '        <span class="fs-6">Productos</span><i class="fas fa-cogs ms-2"></i>';
            echo '      </a>';
        }
        echo '      <a class="nav-link text-white me-4" href="index.php?action=insertarproducto&controller=Productos">';
        echo '        <span class="fs-6">Subir Producto</span><i class="fas fa-upload ms-2"></i>';
        echo '      </a>';
        echo '      <a class="nav-link text-white me-4" href="index.php?action=favoritos&controller=Favoritos">';
        echo '        <span class="fs-6">Favoritos</span><i class="far fa-heart ms-2"></i>';
        echo '      </a>';
        echo '      <a class="nav-link text-white me-5" href="index.php?action=perfil&controller=Usuarios">';
        echo '        <span class="fs-6">Perfil</span><i class="far fa-user ms-2"></i>';
        echo '      </a>';
        if (isset($_SESSION["usuario"])) {
            echo "<a class='nav-link text-white' href='./cerrarSesion.php'><i class='fas fa-sign-out-alt'></i></a>";
        }
        echo '    </div>';
        echo '  </div>';
        echo '</nav>';

        echo "<div class='d-flex col-10  justify-content-evenly row row-cols-1  m-auto'>";
        
        if ($resultado) {

            echo "<h1 class='iniciosesion_titulo mb-5'>Mis Favoritos</h1>";

            foreach ($resultado as $producto) {
                $borrar = $producto["id_favorito"];
                $fechaCompleta = $producto['fecha'];
                $fecha = date('Y-m-d', strtotime($fechaCompleta));
                $id = $producto["producto"]["id_producto"];

                echo "<div class='card mb-4' style='max-width: 325px; border: none;'>";
                echo "<div class='card row g-0'>";
                echo "<a class='navbar-brand' href='index.php?action=producto&controller=Productos&id=$id'>";
                echo "<div class='col-md-6'>";
                echo "<div class='d-flex col-12'>";
                echo "<img src='assets/images/" . $producto["producto"]["imagenes"] . "' class='imagenfavoritos' alt='Imagen'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title' style='font-size: 18px; font-weight: bold;'>" . $producto["producto"]['titulo'] . "</h5>";
                echo "<p class='card-text' style='font-size: 16px; font-weight: bold;'>" . $producto["producto"]['precio'] . "€</p>";
                echo "<p class='card-text'><small class='text-body-secondary'>" . $fecha . "</small></p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</a>";
                echo "<form action='index.php?action=borrar&controller=Favoritos' method='POST' style='max-width: 325px;'>";
                echo "<input type='hidden' name='borrar' value='$borrar'>";
                echo "<input class='form-control m-auto text-center mt-2' style='max-width: 325px; border: none;' type='submit' value='Eliminar de favoritos'>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo '<h1 class="m-5 text-center"><i class="text-danger fa-solid fa-circle-exclamation fa-2xl"></i> <b>Upss... No tienes ningun anuncios favoritos</b></h1>';
        }
        echo "</div>";

        echo '<footer class="text-center text-white text-lg-start bg-dark text-white mt-5">';
        echo '  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">';
        echo '    <div class="me-5 d-none d-lg-block">';
        echo '      <span>Siguenos en nuestras redes sociales:</span>';
        echo '    </div>';

        echo '    <div>';
        echo '      <a href="" class="me-4 link-secondary">';
        echo '        <i class="fab fa-facebook-f"></i>';
        echo '      </a>';
        echo '      <a href="" class="me-4 link-secondary">';
        echo '        <i class="fab fa-twitter"></i>';
        echo '      </a>';
        echo '      <a href="" class="me-4 link-secondary">';
        echo '        <i class="fab fa-google"></i>';
        echo '      </a>';
        echo '      <a href="" class="me-4 link-secondary">';
        echo '        <i class="fab fa-instagram"></i>';
        echo '      </a>';
        echo '      <a href="" class="me-4 link-secondary">';
        echo '        <i class="fab fa-linkedin"></i>';
        echo '      </a>';
        echo '      <a href="" class="me-4 link-secondary">';
        echo '        <i class="fab fa-github"></i>';
        echo '      </a>';
        echo '    </div>';
        echo '  </section>';
        echo '';
        echo '  <section class="">';
        echo '    <div class="container text-center text-md-start mt-5">';
        echo '      <div class="row mt-3">';
        echo '        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">';
        echo '          <h6 class="text-uppercase fw-bold mb-4">';
        echo '            <i class="fas fa-gem me-3 text-secondary"></i>BITNA';
        echo '          </h6>';
        echo '          <p>';
        echo '            La aplicación en la que puedes comprar todo lo que necesites ';
        echo '            siempre y cuando tu opción es de segunda mano.';
        echo '          </p>';
        echo '        </div>';
        echo '';
        echo '        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">';
        echo '          <h6 class="text-uppercase fw-bold mb-4">';
        echo '            Legal';
        echo '          </h6>';
        echo '          <p>';
        echo '            <a href="#!" class="text-reset">Aviso legal</a>';
        echo '          </p>';
        echo '          <p>';
        echo '            <a href="#!" class="text-reset">Condiciones de uso</a>';
        echo '          </p>';
        echo '          <p>';
        echo '            <a href="#!" class="text-reset">Politica de privacidad</a>';
        echo '          </p>';
        echo '          <p>';
        echo '            <a href="#!" class="text-reset">Cookies</a>';
        echo '          </p>';
        echo '        </div>';
        echo '';
        echo '        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">';
        echo '          <h6 class="text-uppercase fw-bold mb-4">';
        echo '            Soporte';
        echo '          </h6>';
        echo '          <p>';
        echo '            <a href="#!" class="text-reset">Configuracion</a>';
        echo '          </p>';
        echo '          <p>';
        echo '            <a href="#!" class="text-reset">Reglas de publicación</a>';
        echo '          </p>';
        echo '          <p>';
        echo '            <a href="#!" class="text-reset">Empleo</a>';
        echo '          </p>';
        echo '          <p>';
        echo '            <a href="#!" class="text-reset">Ayuda</a>';
        echo '          </p>';
        echo '        </div>';
        echo '';
        echo '        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">';
        echo '          <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>';
        echo '          <p><i class="fas fa-home me-3 text-secondary"></i> Talavera, TA 45600, ES</p>';
        echo '          <p>';
        echo '            <i class="fas fa-envelope me-3 text-secondary"></i>';
        echo '            email@gmail.com';
        echo '          </p>';
        echo '          <p><i class="fas fa-phone me-3 text-secondary"></i> + 34 666 666 666</p>';
        echo '          <p><i class="fas fa-print me-3 text-secondary"></i> + 34 666 666 666</p>';
        echo '        </div>';
        echo '      </div>';
        echo '    </div>';
        echo '  </section>';
        echo '';
        echo '  <div class="text-center p-4 border-top">';
        echo '    © 2023 Copyright:';
        echo '    <a class="text-reset fw-bold" href="#">BITNA</a>';
        echo '  </div>';
        echo '</footer>';
    }

}
