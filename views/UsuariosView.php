<?php

class UsuariosView {

    public function mostrarIniciarSesion($usuarios) {

        echo '<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white mb-5">';
        echo '  <div class="container-fluid d-flex justify-content-between align-items-center">';
        echo '    <a class="navbar-brand" href="index.php?action=productos&controller=Productos">';
        echo '      <span class="nav_title text-white">BITNA</span>';
        echo '    </a>';
        echo '    <div class="menu-links d-flex align-items-center">';

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

        echo "<section class='iniciosesion col-6 p-4'>";
        echo "<h1 class='iniciosesion_titulo mb-5'>Iniciar Sesión</h1>";

        echo '<form role="form" class="needs-validation" action="index.php" method="POST" novalidate>';
        echo '  <div class="form-group">';
        echo '    <label for="email">Email:</label>';
        echo '    <input type="email" name="email" class="form-control" id="email" required>';
        echo '  </div>';
        echo '  <div class="form-group">';
        echo '    <label for="pwd">Contraseña:</label>';
        echo '  <div class="d-flex align-items-center">';
        echo '    <input type="password" name="contraseña" class="form-control" id="contrasenaInput" required>';
        echo '  <i class="fa-solid fa-eye fa-lg" onclick="togglePasswordVisibility()"></i>';
        echo '  </div>';
        echo '  </div>';

        echo '  <div class="mt-4">';
        echo "      <input type='submit' class='form-control' value='Iniciar Sesion'> ";
        echo '  </div>';
        echo '</form>';

        echo "<a class='mt-5' href='index.php?action=registro&controller=Usuarios'>Registrarse</a>";
        echo "</section>";
    }

    public function mostrarRegistro() {
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white mb-5">';
        echo '  <div class="container-fluid d-flex justify-content-between align-items-center">';
        echo '    <a class="navbar-brand" href="index.php?action=productos&controller=Productos">';
        echo '      <span class="nav_title text-white">BITNA</span>';
        echo '    </a>';
        echo '    <div class="menu-links d-flex align-items-center">';

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

        echo '<section class="registro col-9 p-4">';
        echo '<h1 class="iniciosesion_titulo mb-5">Registrarse</h1>';
        echo '<form class="row g-3 needs-validation form" action="#" method="POST" novalidate>';
        echo '  <div class="col-md-4">';
        echo '    <label for="validationCustom01" class="form-label">Nombre</label>';
        echo '    <input type="text" name="nombre" class="form-control" id="validationCustom01" required>';
        echo '    <div class="invalid-feedback">';
        echo '      Por favor, ingrese un nombre';
        echo '    </div>';
        echo '  </div>';
        echo '  <div class="col-md-4">';
        echo '    <label for="validationCustom02" class="form-label">Apellidos</label>';
        echo '    <input type="text" name="apellidos" class="form-control" id="validationCustom02" required>';
        echo '    <div class="invalid-feedback">';
        echo '      Por favor, ingrese un contraseña';
        echo '    </div>';
        echo '  </div>';
        echo '  <div class="col-md-4">';
        echo '    <label for="validationCustomUsername" class="form-label">Email</label>';
        echo '    <div class="input-group has-validation">';
        echo '      <span class="input-group-text" id="inputGroupPrepend">@</span>';
        echo '      <input type="email" name="email" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>';
        echo '      <div class="invalid-feedback">';
        echo '        Por favor, ingrese un email válido';
        echo '      </div>';
        echo '    </div>';
        echo '  </div>';
        echo '  <div class="col-md-4">';
        echo '    <label for="validationCustom01" class="form-label">Contraseña</label>';
        echo '  <div class="d-flex align-items-center">';
        echo '    <input type="password" name="contraseña" class="form-control contra" id="contrasenaInput" required>';
        echo '    <i class="fa-solid fa-eye fa-lg" onclick="togglePasswordVisibility()"></i>';
        echo '    <div class="invalid-feedback">';
        echo '      Por favor, ingrese una contraseña válida';
        echo '    </div>';
        echo '    </div>';
        echo '  </div>';
        echo '  <div class="col-md-4">';
        echo '    <label for="validationCustom02" class="form-label">Telefono</label>';
        echo '    <input type="number" name="telefono" class="form-control" id="validationCustom02" required>';
        echo '    <div class="invalid-feedback">';
        echo '      Por favor, ingrese un telefono válido';
        echo '    </div>';
        echo '  </div>';
        echo '  <div class="col-md-4">';
        echo '    <label for="validationCustomUsername" class="form-label">Provincia</label>';
        echo '    <div class="input-group has-validation">';
        echo '      <input type="text" name="provincia" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>';
        echo '      <div class="invalid-feedback">';
        echo '        Por favor, ingrese una provincia válida';
        echo '      </div>';
        echo '    </div>';
        echo '  </div>';
        echo '  <div class="col-md-3">';
        echo '    <label for="validationCustom04" class="form-label">Localidad</label>';
        echo '    <input type="text" name="localidad" class="form-control" id="validationCustom05" required>';
        echo '    <div class="invalid-feedback">';
        echo '      Por favor, ingrese una localidad válida';
        echo '    </div>';
        echo '  </div>';
        echo '  <div class="col-md-3">';
        echo '    <label for="validationCustom05" class="form-label">Codigo Postal</label>';
        echo '    <input type="number" name="cp" class="form-control" id="validationCustom05" required>';
        echo '    <div class="invalid-feedback">';
        echo '      Por favor, ingrese un cp válida';
        echo '    </div>';
        echo '  </div>';
        echo '  <div class="col-md-6">';
        echo '    <label for="validationCustom03" class="form-label">Direccion</label>';
        echo '    <input type="text" name="direccion" class="form-control" id="validationCustom03" required>';
        echo '    <div class="invalid-feedback">';
        echo '      Por favor, ingrese una direccion válida';
        echo '    </div>';
        echo '  </div>';
        echo '  <div class="col-12">';
        echo '    <div class="form-check">';
        echo '      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>';
        echo '      <label class="form-check-label" for="invalidCheck">';
        echo '        Acepto los términos y las condiciones';
        echo '      </label>';
        echo '      <div class="invalid-feedback">';
        echo '        Tienes que aceptar los términos y condiciones';
        echo '      </div>';
        echo '    </div>';
        echo '  </div>';
        echo '  <div class="mt-4 col-4 m-auto">';
        echo '    <input type="submit" class="form-control mb-5" value="Registrarse">';
        echo '  </div>';
        echo '</form>';
        echo '<a class="mt-5" href="index.php">¿Ya estás registrado?, inicia sesión aquí</a>';
        echo '</section>';
    }

    public function mostrarPerfil() {
        $usuario = json_decode(file_get_contents("http://localhost:3000/tfg/usuario/" . $_COOKIE["user"]), true);

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

        echo '
        <div class="container">
            <div class="section row">
         <h1 class="iniciosesion_titulo mb-5">Mi Perfil</h1>
                <div class="col-lg-3 col-12 m-auto">
                    <img class="mb-2" src="assets/images/usuario.png" alt="Icono Perfil" id="imagenPerfil">
                    <div class="p-1 d-flex flex-column justify-content-center">
                        <button type="button" class="button_perfil m-auto mb-2"><a href="index.php?action=editarperfil&controller=Usuarios" class="nav-link">Editar Perfil</a></button>
                        <button type="button" class="button_perfil m-auto mb-2"><a href="index.php?action=misproductos&controller=Productos&id=' . $_COOKIE['user'] . '" class="nav-link">Mis Anuncios</a></button>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="mt-4 fw-bold">
                        <div class="col g-3 d-flex flex-row align-center mb-3 justify-content-around">
                            <div class=" row col-6">
                                <label class="form_label col-sm-4 col-form-label">Nombre:</label>
                                <div class="col-sm-8 mt-2">
                                    <span>' . $usuario["nombre"] . '</span>
                                </div>
                            </div>
                            <div class="row col-6">
                                <label class="form_label col-sm-4 col-form-label">Apellidos:</label>
                                <div class="col-sm-8 mt-2">
                                    <span>' . $usuario["apellidos"] . '</span>
                                </div>
                            </div>
                        </div>

                        <div class="col g-3 d-flex flex-row align-center mb-3 justify-content-around">
                            <div class="row col-6">
                                <label class="form_label col-sm-4 col-form-label">Email:</label>
                                <div class="col-sm-8 mt-2">
                                    <span>' . $usuario["email"] . '</span>
                                </div>
                            </div>
                            <div class="row col-6">
                                <label class="form_label col-sm-4 col-form-label">Teléfono:</label>
                                <div class="col-sm-8 mt-2">
                                    <span>' . $usuario["telefono"] . '</span>
                                </div>
                            </div>
                        </div>    
                        <div class="col g-3 d-flex flex-row align-center mb-3 justify-content-around">
                            <div class="row col-6">
                                <label class="form_label col-sm-4 col-form-label">Provincia:</label>
                                <div class="col-sm-8 mt-2">
                                    <span>' . $usuario["provincia"] . '</span>
                                </div>
                            </div>
                            <div class="row col-6">
                                <label class="form_label col-sm-4 col-form-label">Localidad:</label>
                                <div class="col-sm-8 mt-2">
                                    <span>' . $usuario["localidad"] . '</span>
                                </div>
                            </div>
                        </div>    
                        <div class="col g-3 d-flex flex-row align-center mb-3 justify-content-around">
                            <div class="row col-6">
                                <label class="form_label col-sm-4 col-form-label">Codigo Postal:</label>
                                <div class="col-sm-8 mt-2">
                                    <span>' . $usuario["codigopostal"] . '</span>
                                </div>
                            </div>
                            <div class="row col-6">
                                <label class="form_label col-sm-4 col-form-label">Dirección:</label>
                                <div class="col-sm-8 mt-2">
                                    <span>' . $usuario["direccion"] . '</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';

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

    public function mostrarEditarPerfil($usuario) {

        $usuario = json_decode(file_get_contents("http://localhost:3000/tfg/usuario/" . $_COOKIE["user"]), true);

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

        echo '
        <div class="contenedor container">
            <div class="section col-9 m-auto">
                <h1 class="iniciosesion_titulo mb-5">Editar Perfil</h1>
                
                <div class="article col-lg-12 ">
                    <div class="d-flex flex-row">
                        <form class="col g-3 needs-validation" method="POST" action="#" novalidate>
                            <div class="mb-3 row fw-bold">
                                <label class="form_label col-sm-5 col-form-label">Nombre:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="nombre" value="' . $usuario["nombre"] . '" class="form-control" required/>
                                </div>
                            </div>
                            <div class="mb-3 row fw-bold">
                                <label class="form_label col-sm-5 col-form-label">Apellidos:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="apellidos" value="' . $usuario["apellidos"] . '" class="form-control" required/>
                                </div>
                            </div>
                            <div class="mb-3 row fw-bold">
                                <label class="form_label col-sm-5 col-form-label">Email:</label>
                                <div class="col-sm-7">
                                    <input type="email" name="email" value="' . $usuario["email"] . '" class="form-control" required/>
                                </div>
                            </div>
                            <div class="mb-3 row fw-bold">
                                <label class="form_label col-sm-5 col-form-label">Contraseña:</label>
                                <div class="col-sm-7 d-flex align-items-center">
                                    <input type="password" id="contrasenaInput" name="contraseña" value="' . $usuario["contrasena"] . '" class="form-control validacion" required/>
                                    <i class="fa-solid fa-eye fa-lg" onclick="togglePasswordVisibility()"></i>
                                </div>
                            </div>
                            <div class="mb-3 row fw-bold">
                                <label class="form_label col-sm-5 col-form-label">Teléfono:</label>
                                <div class="col-sm-7">
                                    <input type="tel" name="telefono" value="' . $usuario["telefono"] . '" class="form-control" required/>
                                </div>
                            </div>
                            <div class="mb-3 row fw-bold">
                                <label class="form_label col-sm-5 col-form-label">Provincia:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="provincia" value="' . $usuario["provincia"] . '" class="form-control" required/>
                                </div>
                            </div>
                            <div class="mb-3 row fw-bold">
                                <label class="form_label col-sm-5 col-form-label">Localidad:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="localidad" value="' . $usuario["localidad"] . '" class="form-control" required/>
                                </div>
                            </div>
                            <div class="mb-3 row fw-bold">
                                <label class="form_label col-sm-5 col-form-label">Código Postal:</label>
                                <div class="col-sm-7">
                                    <input type="number" name="cp" value="' . $usuario["codigopostal"] . '" class="form-control" required/>
                                </div>
                            </div>
                            <div class="mb-3 row fw-bold">
                                <label class="form_label col-sm-5 col-form-label">Dirección:</label>
                                <div class="col-sm-7">
                                    <input type="text" name="direccion" value="' . $usuario["direccion"] . '" class="form-control" required/>
                                </div>
                            </div>
                            <div class="p-1 d-flex flex-row justify-content-between mt-5">
                                <input type="submit"" class="button_editarperfil" value="Guardar"> 
                                <button type="button" class="button_editarperfil"><a class="nav-link" href="index.php?action=perfil&controller=Usuarios">Volver</a></button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>';

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

    public function mostrarPerfilUsuarioX($usuario) {

        $usuario = json_decode(file_get_contents("http://localhost:3000/tfg/usuario/" . $_GET["id"]), true);

        $productos = $usuario["productos"];
        $cont = 0;
        foreach ($productos as $producto) {
            $cont++;
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

        echo '<div class=" col-9 m-auto">';
        echo '  <div class="row g-0">';
        echo '    <div class="col-md-3 mt-3">';
        echo '      <img src="assets/images/usuario.png" alt="Icono Perfil" id="imagenPerfilX">';
        echo '    </div>';
        echo '    <div class="col-md-9 d-flex flex-row align-center">';
        echo '      <div class="card-body">';
        echo '        <h3 class="card-title mb-5">' . $usuario["nombre"] . ' ' . $usuario["apellidos"] . '</h3>';
        echo '        <p class="card-text"><i class="fa-solid fa-envelope fa-lg"></i>&nbsp;&nbsp;&nbsp;&nbsp;Email: ' . $usuario["email"] . '</p>';
        echo '        <p class="card-text"><i class="fa-solid fa-mobile fa-lg"></i>&nbsp;&nbsp;&nbsp;&nbsp; Telefono: ' . $usuario["telefono"] . '</p>';
        echo '        <p class="card-text"><i class="fas fa-location-dot fa-lg"></i>&nbsp;&nbsp;&nbsp;&nbsp; ' . $usuario["codigopostal"] . ', ' . $usuario["localidad"] . '(' . $usuario["provincia"] . ')</p>';
        echo '      </div>';
        echo '      <div class="card-body">';
        echo '        <h1 class="text-center mt-5">Productos</h1>';
        echo '<h1 class="text-center">' . $cont . '</h1>';
        echo '      </div>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';

        echo '<div class="d-flex justify-content-around row row-cols-1 row-cols-md-2 g-4 col-9 m-auto mt-3 border-top border-dark">';
        foreach ($productos as $producto) {
            $fechaCompleta = $producto['fecha'];
            $fecha = date('Y-m-d', strtotime($fechaCompleta));
            $id = $producto["id_producto"];

            echo "<div class='card mt-5 mb-3' style='max-width: 540px;'>";
            echo "<a class='botonHotel navbar-brand' href='index.php?action=producto&controller=Productos&id=$id'>";
            echo"<div class='row g-0'>";
            echo"<div class='col-md-4'>";
            echo "<img src='assets/images/" . $producto["imagenes"] . "' class='imagen' alt='Imagen'>";
            echo"</div>";
            echo" <div class='col-md-8'>";
            echo"<div class='card-body'>";
            echo "<h5 class='card-title'>" . $producto['titulo'] . "</h5>";
            echo"<p class='card-text'>" . $producto['precio'] . "€</p>";
            echo"<p class='card-text'><small class='text-body-secondary'>" . $fecha . "</small></p>";
            echo"</div>";
            echo"</div>";
            echo "</div>";
            echo "</div>";
            echo "</a>";
        }
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

    public function mostrarUsuarios($usuarios) {

        $usuarios = json_decode(file_get_contents("http://localhost:3000/tfg/usuario"), true);
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

        $contt = 0;
        foreach ($usuarios as $usuario) {
            $contt++;
        }
        echo '<div class="col-9 m-auto">';
        echo '<h1 class="iniciosesion_titulo mb-5">Lista de Usuarios: ' . $contt . '</h1>';
        echo '<table class = "table table-hover col-9 m-auto">';
        echo '<thead>';
        echo '<tr><th scope="col">#</th><th scope="col">Nombre</th><th scope="col">Apellidos</th><th scope="col">Email</th><th scope="col">Rol</th></tr>';
        echo '</thead>';
        foreach ($usuarios as $usuario) {
            if ($usuario["rol"] == "admin") {
                $cont++;
                echo '<tr>';
                echo '<th scope="row">' . $cont . '</th>';
                echo '<td>' . $usuario['nombre'] . '</td>';
                echo '<td>' . $usuario['apellidos'] . '</td>';
                echo '<td>' . $usuario['email'] . '</td>';
                echo '<td>ADMINISTRADOR</td>';
                echo '</tr>';
            }
        }
        foreach ($usuarios as $usuario) {
            if ($usuario["rol"] == "user") {
                $cont++;
                $id = $usuario['id_usuario'];
                echo '<tr>';
                echo '<th scope="row">' . $cont . '</th>';
                echo '<td>' . $usuario['nombre'] . '</td>';
                echo '<td>' . $usuario['apellidos'] . '</td>';
                echo '<td>' . $usuario['email'] . '</td>';
                echo '<td>USUARIO</td>';
                echo '<td>';
                echo "<form action='index.php?action=borrar&controller=Usuarios' method='POST'>";
                echo "<input type='hidden' name='borrar' value='$id'>";
                echo "<button type='submit' value='Eliminar'><i class='fas fa-trash fa-lg'></i></button>";
                echo "</form>";
                echo '</td>';
                echo '</tr>';
            }
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

    public function enviarMail($usuario) {

        $producto = json_decode(file_get_contents("http://localhost:3000/tfg/producto/" . $_GET["idpro"]), true);
        $usuario = json_decode(file_get_contents("http://localhost:3000/tfg/usuario/" . $_GET["id"]), true);
        $yo = json_decode(file_get_contents("http://localhost:3000/tfg/usuario/" . $_COOKIE["user"]), true);

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

        $id = $_GET["idpro"];

        echo '<div class="d-flex justify-content-around row row-cols-1 row-cols-md-2 g-4 col-9 m-auto mt-3 ">';
        echo '<form action="" method="POST">';
        echo '    <div>';
        echo '        <label>Email:</label>';
        echo '    </div>';
        echo '    <div>';
        echo '        <input class="form-control" type="email" value="' . $usuario["email"] . '" name="email">';
        echo '    </div>';
        echo '    <br>';
        echo '    <div>';
        echo '        <label>Asunto:</label>';
        echo '    </div>';
        echo '    <div>';
        echo '        <input class="form-control" type="text" value="' . $producto["titulo"] . '" name="asunto">';
        echo '    </div>';
        echo '    <br>';
        echo '    <div>';
        echo '        <label>Mensaje:</label>';
        echo '    </div>';
        echo '    <div>';
        echo '        <textarea class="form-control" id="nose" name="problema"></textarea>';
        echo '    </div>';
        echo '    <br><br>';
        echo '<div class=" d-flex flex-row justify-content-between ">';
        echo '    <input class="form-control" type="submit" name="enviar">';
       echo '<button class="form-control"><a class="nav-link" href="index.php?action=producto&controller=Productos&id=' . $id . '">Volver</a></button>';
        echo ' </div>';
        echo '</form>';

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

}
