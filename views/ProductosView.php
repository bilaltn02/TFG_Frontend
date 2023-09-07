<?php

class ProductosView {

    public function mostrarProductos() {

        $productos = json_decode(file_get_contents("http://localhost:3000/tfg/producto"), true);
        $categorias = json_decode(file_get_contents("http://localhost:3000/tfg/categoria"), true);
        
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
        if ($_COOKIE["rol"] == "user") {
        echo '      <a class="nav-link text-white me-4" href="index.php?action=insertarproducto&controller=Productos">';
        echo '        <span class="fs-6">Subir Producto</span><i class="fas fa-upload ms-2"></i>';
        echo '      </a>';
        echo '      <a class="nav-link text-white me-4" href="index.php?action=favoritos&controller=Favoritos">';
        echo '        <span class="fs-6">Favoritos</span><i class="far fa-heart ms-2"></i>';
        echo '      </a>';
        }
        echo '      <a class="nav-link text-white me-5" href="index.php?action=perfil&controller=Usuarios">';
        echo '        <span class="fs-6">Perfil</span><i class="far fa-user ms-2"></i>';
        echo '      </a>';
        if (isset($_SESSION["usuario"])) {
            echo "<a class='nav-link text-white' href='./cerrarSesion.php'><i class='fas fa-sign-out-alt'></i></a>";
        }
        echo '    </div>';
        echo '  </div>';
        echo '</nav>';

        echo '<div class="container mb-5">';
        echo '<form action="index.php?action=productoscategoria&controller=Productos" method="POST" class="w-100 d-flex ">'
        . '<div class="w-100 d-flex align-items-center searchbox-form_SearchBox__wrapper__6HWA_">';
        echo '<select class="form-control col-6" name="categoriaid" id="categoriaid" required>';
        echo '<option selected disabled value="">Elige...</option>';
        foreach ($categorias as $categoria) {
            $id = $categoria['id_categoria'];
            echo "<option value='$id'>" . $categoria['categoria'] . '</option>';
        }
        echo '</select>'
        . '</div>'
        . '<button type="submit" class="btn btn-primary ml-2">Buscar</button>'
        . '</form>';
        echo '</div>';

        echo "<h1 class='iniciosesion_titulo mb-5'>Todos los Anuncios</h1>";

        echo "<div class='d-flex col-10  justify-content-evenly row row-cols-1  m-auto'>";

        foreach ($productos as $producto) {
            $fechaCompleta = $producto['fecha'];
            $fecha = date('Y-m-d', strtotime($fechaCompleta));
            $id = $producto["id_producto"];

            echo "<div class='card  mb-4' style='max-width: 350px; border: none;'>";
            if ($producto["usuarioIdUsuario"] == $_COOKIE["user"]) {
                echo "<a class='card border border-warning border-4 navbar-brand' href='index.php?action=producto&controller=Productos&id=$id'>";
            } else {
                echo "<a class='card navbar-brand' href='index.php?action=producto&controller=Productos&id=$id'>";
            }
            echo"<div class='row g-0'>";
            echo"<div class='col-md-6'>";
            echo "<img src='assets/images/" . $producto["imagenes"] . "' class='imagen' alt='Imagen'>";
            echo"</div>";
            echo" <div class='col-md-6'>";
            echo"<div class='card-body'>";
            echo "<h5 class='card-title'>" . $producto['titulo'] . "</h5>";
            echo"<p class='card-text'>" . $producto['precio'] . "€</p>";
            echo"<p class='card-text'><small class='text-body-secondary'>" . $fecha . "</small>";
            echo "</p>";
            echo"</div>";
            echo"</div>";
            echo "</div>";
            echo "</div>";
            echo "</a>";
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

    public function mostrarProductosDeCategoria($productos) {

        $categorias = json_decode(file_get_contents("http://localhost:3000/tfg/categoria"), true);

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
        if ($_COOKIE["rol"] == "user") {
        echo '      <a class="nav-link text-white me-4" href="index.php?action=insertarproducto&controller=Productos">';
        echo '        <span class="fs-6">Subir Producto</span><i class="fas fa-upload ms-2"></i>';
        echo '      </a>';
        echo '      <a class="nav-link text-white me-4" href="index.php?action=favoritos&controller=Favoritos">';
        echo '        <span class="fs-6">Favoritos</span><i class="far fa-heart ms-2"></i>';
        echo '      </a>';
        }
        echo '      <a class="nav-link text-white me-5" href="index.php?action=perfil&controller=Usuarios">';
        echo '        <span class="fs-6">Perfil</span><i class="far fa-user ms-2"></i>';
        echo '      </a>';
        if (isset($_SESSION["usuario"])) {
            echo "<a class='nav-link text-white' href='./cerrarSesion.php'><i class='fas fa-sign-out-alt'></i></a>";
        }
        echo '    </div>';
        echo '  </div>';
        echo '</nav>';

        echo '<div class="container mb-5">';
        echo '<form action="#" method="POST" class="w-100 d-flex ">'
        . '<div class="w-100 d-flex align-items-center searchbox-form_SearchBox__wrapper__6HWA_">';
        echo '<select class="form-control col-6" name="categoriaid" id="categoriaid" required>';
        echo '<option selected disabled value="">Elige...</option>';
        foreach ($categorias as $categoria) {
            $id = $categoria['id_categoria'];
            echo "<option value='$id'>" . $categoria['categoria'] . '</option>';
        }
        echo '</select>'
        . '</div>'
        . '<button type="submit" class="btn btn-primary ml-2">Buscar</button>'
        . '</form>';
        echo '</div>';

        echo "<div class='d-flex col-10  justify-content-evenly row row-cols-1  m-auto'>";
        if ($productos) {
            echo "<h1 class='iniciosesion_titulo mb-5'>Subidos Recientemente</h1>";

            foreach ($productos as $producto) {
                $fechaCompleta = $producto['fecha'];
                $fecha = date('Y-m-d', strtotime($fechaCompleta));
                $id = $producto["id_producto"];

                echo "<div class='card  mb-4' style='max-width: 350px; border: none;'>";
                if ($producto["usuarioIdUsuario"] == $_COOKIE["user"]) {
                    echo "<a class='card border border-warning border-4 navbar-brand' href='index.php?action=producto&controller=Productos&id=$id'>";
                } else {
                    echo "<a class='card navbar-brand' href='index.php?action=producto&controller=Productos&id=$id'>";
                }
                echo"<div class='row g-0'>";
                echo"<div class='col-md-6'>";
                echo "<img src='assets/images/" . $producto["imagenes"] . "' class='imagen' alt='Imagen'>";
                echo"</div>";
                echo" <div class='col-md-6'>";
                echo"<div class='card-body'>";
                echo "<h5 class='card-title'>" . $producto['titulo'] . "</h5>";
                echo"<p class='card-text'>" . $producto['precio'] . "€</p>";
                echo"<p class='card-text'><small class='text-body-secondary'>" . $fecha . "</small>";
                echo "</p>";
                echo"</div>";
                echo"</div>";
                echo "</div>";
                echo "</div>";
                echo "</a>";
            }
        } else {
            echo 'eeeeeeeeeeeeee';
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

    public function mostrarunProducto($producto) {

        $producto = json_decode(file_get_contents("http://localhost:3000/tfg/producto/" . $_GET["id"]), true);
        $usuario = $producto["usuario"];
        $categoria = $producto["categorium"];
        $id = $producto["usuarioIdUsuario"];
        $idpro = $producto["id_producto"];
        $idcat = $producto["categoriumIdCategoria"];

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
        if ($_COOKIE["rol"] == "user") {
        echo '      <a class="nav-link text-white me-4" href="index.php?action=insertarproducto&controller=Productos">';
        echo '        <span class="fs-6">Subir Producto</span><i class="fas fa-upload ms-2"></i>';
        echo '      </a>';
        echo '      <a class="nav-link text-white me-4" href="index.php?action=favoritos&controller=Favoritos">';
        echo '        <span class="fs-6">Favoritos</span><i class="far fa-heart ms-2"></i>';
        echo '      </a>';
        }
        echo '      <a class="nav-link text-white me-5" href="index.php?action=perfil&controller=Usuarios">';
        echo '        <span class="fs-6">Perfil</span><i class="far fa-user ms-2"></i>';
        echo '      </a>';
        if (isset($_SESSION["usuario"])) {
            echo "<a class='nav-link text-white' href='./cerrarSesion.php'><i class='fas fa-sign-out-alt'></i></a>";
        }
        echo '    </div>';
        echo '  </div>';
        echo '</nav>';

        echo '<div class="col"> '
        . '<div class="card  shadow-sm col-7 m-auto  border border-3"> '
        . '<div class="card-header"> '
        . '<a class="navbar-brand" href="index.php?action=perfilUsuarioX&controller=Usuarios&id=' . $id . '"><i class="fa-solid fa-user fa-lg pt-4 pb-4"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span><b>' . $usuario["nombre"] . ' ' . $usuario["apellidos"] . '</b></span></a>'
        . '</div> '
        . '<img src="assets/images/' . $producto["imagenes"] . '" class="p-3 imagen_producto rounded"  alt="..."> '
        . '<div class="card-body"> '
        . '<div class="clearfix mb-5"> '
        . '<h1 class="float-start ">' . $producto["titulo"] . '</h1> '
        . '<h1 class="float-end">' . $producto["precio"] . ' €</h1> '
        . '</div> '
        . '<span class="card-title">' . $producto["descripcion"] . '</span> '
        . '<div class="clearfix mt-5"> ';
        echo "<a class='navbar-brand' href='index.php?action=productocategoria&controller=Productos&idcat=$idcat'>";
        echo '<div class="float-start Hashtag Hashtag--odd mt-3" data-value="decoracion"><span class="Hashtag__text">' . $categoria["categoria"] . '</span></div> ';
        echo '</a>';
        echo '<div class="float-end mt-4">'
        . '<span class="">'
        . '<form method="POST" action="#">'
        . '    <input type="hidden" name="productoid" value="' . $producto["id_producto"] . '">'
        . '    <input type="hidden" name="usuarioid" value="' . $_COOKIE["user"] . '">'
        . '    <button type="submit" style="display: inline; background: none; border: none; padding: 0; margin: 0;">'
        . '        <span class="text-danger"><i class="fa-regular fa-heart fa-2xl"></i></span>'
        . '    </button>'
        . '</form>'
        . '</span>'
        . '</div> '
        . '</div> '
        . '</div> '
        . '<div class="card-footer mt-1 d-flex justify-content-between align-items-center"> '                      
        . '<div><i class="fas fa-location-dot fa-lg pt-4 pb-4"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span><b>' . $usuario["localidad"] . '&nbsp;(' . $usuario["provincia"] . ')</b></span></div>'
        . '<div><a class="navbar-brand border border-dark p-2 text-secondary" href="index.php?action=enviarMail&controller=Usuarios&id=' . $id . '&idpro=' . $idpro . '">Enviar Mensaje</a></div>'
        . '</div> '
        . '</div> '
        . '</div>';

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

    public function mostrarInsertarProducto() {
        $categorias = json_decode(file_get_contents("http://localhost:3000/tfg/categoria"), true);

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
        if ($_COOKIE["rol"] == "user") {
        echo '      <a class="nav-link text-white me-4" href="index.php?action=insertarproducto&controller=Productos">';
        echo '        <span class="fs-6">Subir Producto</span><i class="fas fa-upload ms-2"></i>';
        echo '      </a>';
        echo '      <a class="nav-link text-white me-4" href="index.php?action=favoritos&controller=Favoritos">';
        echo '        <span class="fs-6">Favoritos</span><i class="far fa-heart ms-2"></i>';
        echo '      </a>';
        }
        echo '      <a class="nav-link text-white me-5" href="index.php?action=perfil&controller=Usuarios">';
        echo '        <span class="fs-6">Perfil</span><i class="far fa-user ms-2"></i>';
        echo '      </a>';
        if (isset($_SESSION["usuario"])) {
            echo "<a class='nav-link text-white' href='./cerrarSesion.php'><i class='fas fa-sign-out-alt'></i></a>";
        }
        echo '    </div>';
        echo '  </div>';
        echo '</nav>';

        echo "<section class='iniciosesion col-6 p-4'>";
        echo "<h1 class='iniciosesion_titulo mb-5'>Subir Producto</h1>";
        echo "<form action='#' method='POST' class='row g-3 needs-validation' novalidate>";
        echo "<div class='form-group'>";
        echo '  <label for="email">Titulo:</label>';
        echo "<input type='text' class='form-control' name='titulo' placeholder='Titulo' required>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo '    <label for="email">Precio:</label>';
        echo "<input type='number' class='form-control' name='precio' placeholder='Precio' required>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo '  <label for="email">Descripcion:</label>';
        echo '  <textarea class="form-control" name="descripcion" required></textarea>';
        echo "</div>";

        echo "<div class='form-group'>";
        echo '  <label for="email">Imagenes:</label>';
        echo "<input type='file' class='form-control' name='imagenes' placeholder='Imagenes' required>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo '    <label for="email">Categoria:</label>';
        echo "<select class='form-select' name='categoriaid' id='categoriaid' required>";
        echo '<option selected disabled value="">Elige...</option>';
        foreach ($categorias as $categoria) {
            $id = $categoria['id_categoria'];
            echo "<option value=$id>" . $categoria["categoria"] . "</option>";
        }
        echo "</select>";
        echo "</div>";

        echo "<div class='mt-4'>";
        echo "<input type='submit' class='form-control' value='Subir Producto'>";
        echo "</div>";
        echo "</form>";
        echo "</section>";

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

    public function mostrarProductosadmin($productos) {

        $productos = json_decode(file_get_contents("http://localhost:3000/tfg/producto"), true);
        $cont = 0;

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
        if ($_COOKIE["rol"] == "user") {
        echo '      <a class="nav-link text-white me-4" href="index.php?action=insertarproducto&controller=Productos">';
        echo '        <span class="fs-6">Subir Producto</span><i class="fas fa-upload ms-2"></i>';
        echo '      </a>';
        echo '      <a class="nav-link text-white me-4" href="index.php?action=favoritos&controller=Favoritos">';
        echo '        <span class="fs-6">Favoritos</span><i class="far fa-heart ms-2"></i>';
        echo '      </a>';
        }
        echo '      <a class="nav-link text-white me-5" href="index.php?action=perfil&controller=Usuarios">';
        echo '        <span class="fs-6">Perfil</span><i class="far fa-user ms-2"></i>';
        echo '      </a>';
        if (isset($_SESSION["usuario"])) {
            echo "<a class='nav-link text-white' href='./cerrarSesion.php'><i class='fas fa-sign-out-alt'></i></a>";
        }
        echo '    </div>';
        echo '  </div>';
        echo '</nav>';

        $contt=0;
        foreach ($productos as $producto) {
            $contt++;
        }
        echo '<div class="col-9 m-auto">';
        echo "<h1 class='iniciosesion_titulo mb-5'>Lista de Anuncios: " . $contt . "</h1>";
        echo '<table class = "table table-hover col-9 m-auto">';
        echo '<thead>';
        echo '<tr><th scope="col">#</th><th scope="col">Usuario</th><th scope="col">Telefono</th><th scope="col">Producto</th><th scope="col">Precio</th><th scope="col">Fecha</th><th scope="col">Categoria</th></tr>';
        echo '</thead>';
        foreach ($productos as $producto) {
            $fechaCompleta = $producto['fecha'];
            $fecha = date('Y-m-d', strtotime($fechaCompleta));
            $id = $producto['id_producto'];
            $cont++;

            echo '<tr>';
            echo '<th scope="row">' . $cont . '</th>';
            echo '<td>' . $producto['usuario']['email'] . '</td>';
            echo '<td>' . $producto['usuario']['telefono'] . '</td>';
            echo '<td>' . $producto['titulo'] . '</td>';
            echo '<td>' . $producto['precio'] . '</td>';
            echo '<td>' . $fecha . '</td>';
            echo '<td>' . $producto['categorium']['categoria'] . '</td>';
            echo '<td>';
            echo "<form action='index.php?action=borrar&controller=Productos' method='POST'>";
            echo "<input type='hidden' name='borrar' value='$id'>";
            echo "<button type='submit' value='Eliminar'><i class='fas fa-trash fa-lg'></i></button>";
            echo "</form>";
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';

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
        echo '  <div class="text-center p-4 border-top">';
        echo '    © 2023 Copyright:';
        echo '    <a class="text-reset fw-bold" href="#">BITNA</a>';
        echo '  </div>';
        echo '</footer>';
    }

    public function mostrarProductosCategoria($productos) {

        $productos = json_decode(file_get_contents("http://localhost:3000/tfg/producto/categoria/" . $_GET["idcat"]), true);

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
        if ($_COOKIE["rol"] == "user") {
        echo '      <a class="nav-link text-white me-4" href="index.php?action=insertarproducto&controller=Productos">';
        echo '        <span class="fs-6">Subir Producto</span><i class="fas fa-upload ms-2"></i>';
        echo '      </a>';
        echo '      <a class="nav-link text-white me-4" href="index.php?action=favoritos&controller=Favoritos">';
        echo '        <span class="fs-6">Favoritos</span><i class="far fa-heart ms-2"></i>';
        echo '      </a>';
        }
        echo '      <a class="nav-link text-white me-5" href="index.php?action=perfil&controller=Usuarios">';
        echo '        <span class="fs-6">Perfil</span><i class="far fa-user ms-2"></i>';
        echo '      </a>';
        if (isset($_SESSION["usuario"])) {
            echo "<a class='nav-link text-white' href='./cerrarSesion.php'><i class='fas fa-sign-out-alt'></i></a>";
        }
        echo '    </div>';
        echo '  </div>';
        echo '</nav>';

        echo "<h1 class='text-center mb-5'>Todos los productos de " . $productos[0]["categorium"]["categoria"] . " </h1>";

        echo "<div class='d-flex col-10  justify-content-evenly row row-cols-1  m-auto'>";
        foreach ($productos as $producto) {
            $fechaCompleta = $producto['fecha'];
            $fecha = date('Y-m-d', strtotime($fechaCompleta));
            $id = $producto["id_producto"];

            echo "<div class='card mb-3' style='max-width: 325px;'>";
            echo "<a class='botonHotel navbar-brand' href='index.php?action=producto&controller=Productos&id=$id'>";
            echo"<div class='row g-0'>";
            echo"<div class='col-md-6'>";
            echo "<img src='assets/images/" . $producto["imagenes"] . "' class='imagen' alt='Imagen'>";
            echo"</div>";
            echo" <div class='col-md-6'>";
            echo"<div class='card-body'>";
            echo "<h5 class='card-title'>" . $producto['titulo'] . "</h5>";
            echo"<p class='card-text'>" . $producto['precio'] . "€</p>";
            echo"<p class='card-text'><small class='text-body-secondary'>" . $fecha . "</small>";
            echo "</p>";
            echo"</div>";
            echo"</div>";
            echo "</div>";
            echo "</div>";
            echo "</a>";
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

    public function mostrarMisProductos() {

        $productos = json_decode(file_get_contents("http://localhost:3000/tfg/producto/usuario/" . $_COOKIE["user"]), true);
        $cont = 0;

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
        if ($_COOKIE["rol"] == "user") {
        echo '      <a class="nav-link text-white me-4" href="index.php?action=insertarproducto&controller=Productos">';
        echo '        <span class="fs-6">Subir Producto</span><i class="fas fa-upload ms-2"></i>';
        echo '      </a>';
        echo '      <a class="nav-link text-white me-4" href="index.php?action=favoritos&controller=Favoritos">';
        echo '        <span class="fs-6">Favoritos</span><i class="far fa-heart ms-2"></i>';
        echo '      </a>';
        }
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

        if ($productos) {
            $cont++;

            echo "<h1 class='iniciosesion_titulo mb-5'>Mis Anuncios: " . $cont . "</h1>";

            foreach ($productos as $producto) {
                $borrar = $producto["id_producto"];
                $fechaCompleta = $producto['fecha'];
                $fecha = date('Y-m-d', strtotime($fechaCompleta));
                $id = $producto["id_producto"];

                echo "<div class='card mb-4' style='max-width: 325px; border: none;'>";
                echo "<div class='card row g-0'>";
                echo "<a class='navbar-brand' href='index.php?action=producto&controller=Productos&id=$id'>";
                echo "<div class='col-md-6'>";
                echo "<div class='d-flex col-12'>";
                echo "<img src='assets/images/" . $producto["imagenes"] . "' class='imagenfavoritos' alt='Imagen'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title' style='font-size: 18px; font-weight: bold;'>" . $producto['titulo'] . "</h5>";
                echo "<p class='card-text' style='font-size: 16px; font-weight: bold;'>" . $producto['precio'] . "€</p>";
                echo "<p class='card-text'><small class='text-body-secondary'>" . $fecha . "</small></p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</a>";
                echo "<form action='index.php?action=borrarproducto&controller=Productos' method='POST' style='max-width: 325px;'>";
                echo "<input type='hidden' name='borrar' value='$borrar'>";
                echo "<input class='form-control m-auto text-center mt-2' style='max-width: 325px; border: none;' type='submit' value='Eliminar Anuncio'>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo '<h1 class="m-5 text-center"><i class="text-danger fa-solid fa-circle-exclamation fa-2xl"></i> <b>Upss... No tienes ningun anuncio</b></h1>';
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
