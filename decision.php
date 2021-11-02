<?php
    $dec=$_GET["dec"];
    $id=$_GET["id"];
    switch ($dec) {
        case 'borrar':
            header("Location:borrar.php?id=".$id);
            break;
        case 'modificar':         
            header("Location:modificar.php?id=".$id);         
            break;
        case 'index':
            header("Location:introducir.php?");
            break;    
    }
    /*if($_GET["dec"]=='borrar'){
        header("Location:borrar.php");
    }*/
?>    