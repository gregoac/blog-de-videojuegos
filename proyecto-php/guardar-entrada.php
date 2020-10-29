<?php

if(isset($_POST)){
    // Conexión a la base de datos
    require_once 'includes/conexion.php';
    
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];
    
    // Array de errores
    $errores = array();
    
    // Validar los datos antes de guardarlos en la base de datos
    
    if(empty($titulo)){
        $errores['titulo'] = 'El título no es válido';
    }
    
    if(empty($descripcion)){
        $errores['descripcion'] = 'Añade una descripción';
    }
    
    if(empty($categoria) && !is_numeric($categoria)){
        $errores['categoria'] = 'La categoría no es válida';
    }
    
    if(count($errores) == 0){
        $entrada_id = $_GET['editar'];
        $usuario_id = $_SESSION['usuario']['id'];
        
        if($entrada_id){
            $sql = "UPDATE entradas SET categoria_id = $categoria, titulo = '$titulo', descripcion = '$descripcion' ".
                    "WHERE id = $entrada_id AND usuario_id = $usuario_id;";
        } else{
            $sql = "INSERT INTO entradas VALUES(null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
        }
        $guardar = mysqli_query($db, $sql);
        
        header("Location: index.php");
        
    } else{
        $_SESSION['errores_entradas'] = $errores;
        if(isset($_GET['editar'])){
            header("Location: editar-entrada.php?id=".$_GET['editar']);
        } else{
            header("Location: crear-entradas.php");
        }
    }
}

