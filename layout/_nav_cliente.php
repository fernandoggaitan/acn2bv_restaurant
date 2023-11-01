<!-- Nav -->
<nav id="nav-cliente" class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo BASE_URL ?>">
            <img class="logo" src="<?php echo BASE_URL ?>img/cocinero.png" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end bg-dark text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                    Dark offcanvas
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo BASE_URL ?>index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL ?>info.php">Info</a>
                    </li>
                    <?php if( isset($_SESSION['usuario']) ): ?>
                        <?php if($_SESSION['usuario']['rol'] == 'Administrador'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL ?>listar_productos.php">Gestionar productos</a>
                            </li>
                        <?php endif ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL ?>Home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL ?>logout.php">Cerrar sesión</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL ?>login.php">Iniciar sesión</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
</nav>