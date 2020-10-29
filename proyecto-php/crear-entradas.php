<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/sidebar.php'; ?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
    <h1>Crear entradas</h1>
    <p>
        Añade nuevas entradas al blog para que los usuarios puedan leerlas y disfrutar de nuestro contenido.
    </p>
    </br>
    <form action="guardar-entrada.php" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo">
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'titulo') : ''; ?>
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" class="textarea"></textarea>
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'descripcion') : ''; ?>
        
        <label for="titulo">Categoría:</label>
        <select name="categoria" class="select">
            <?php 
                $categorias = conseguirCategorias($db);
                    if(!empty($categorias)):
                        while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
            <option value="<?=$categoria['id']?>">
                <?=$categoria['nombre']?>
            </option>
            <?php
                        endwhile;
                    endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'categoria') : ''; ?>
        
        <input type="submit" value="Guardar">
    </form>
    <?php borrarErrores(); ?>
</div> <!-- FIN PRINCIPAL -->
            
<?php require_once 'includes/footer.php'; ?>

