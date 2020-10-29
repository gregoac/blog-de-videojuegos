<!-- SIDEBAR -->
<aside id="sidebar">
   
    <div id="buscador" class="bloque">
        <h3>Buscar</h3>
        
        <?php if(isset($_SESSION['error-login'])): ?>
            <div class="alerta alerta-error">
                <?=$_SESSION['error-login']?>
            </div>
        <?php endif; ?>

        <form action="buscar.php" method="POST">
            <label for="email" name="busqueda">
            <input type="text" name="busqueda">

            <input type="submit" value="Buscar">
        </form>
    </div>
    
    <?php if(isset($_SESSION['usuario'])): ?>
        <div id="usuario-logueado" class="bloque">
            <h3>Bienvenido, <?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos']?></h3>
            <!-- BOTONES -->
            <div class="flex">
                <a href="crear-entradas.php" class="boton boton-verde">Crear entradas</a>
                <a href="mis-datos.php" class="boton boton-naranja">Mis datos</a>
            </div>
            <a href="crear-categoria.php" class="boton">Crear categoría</a>
            <a href="logout.php" class="boton boton-rojo">Cerrar sesión</a>
        </div>
    <?php endif; ?>
    
    <?php if(!isset($_SESSION['usuario'])): ?>
    <div id="login" class="bloque">
        <h3>Inicia Sesión</h3>
        
        <?php if(isset($_SESSION['error-login'])): ?>
            <div class="alerta alerta-error">
                <?=$_SESSION['error-login']?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="email">E-mail</label>
            <input type="email" name="email">

            <label for="password">Contraseña</label>
            <input type="password" name="password">

            <input type="submit" value="Entrar">
        </form>
    </div>
    <div id="register" class="bloque">
        <h3>Regístrate</h3>
        
        <!-- MOSTRAR ERRORES -->
        <?php if(isset($_SESSION['completado'])): ?>
        <div class="alerta alerta-exito">
            <?=$_SESSION['completado']?>
        </div>
        <?php elseif($_SESSION['errores']['general']): ?>
        <div class="alerta alerta-exito">
            <?=$_SESSION['errores']['general']?>
        </div>
        <?php endif; ?>
            <form action="registro.php" method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                <label for="text">Apellidos</label>
                <input type="text" name="apellidos">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

                <label for="email">E-mail</label>
                <input type="email" name="email">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

                <label for="password">Contraseña</label>
                <input type="password" name="password">
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

                <input type="submit" name="submit" value="Registrar">
            </form>
        <?php borrarErrores(); ?>
    </div>
    <?php endif; ?>
</aside>

