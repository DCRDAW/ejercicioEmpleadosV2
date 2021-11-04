<?php
   if(isset($_POST['volver'])){
    header("Location: menuOpciones.php");
  }   
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8" >
        <title>Pagina empleados</title>
        <link rel=stylesheet href=estilo.css />
        
    </head>
    <body>
       <header>
           <h1>Aplicacion Empleados</h1>
       </header>
       <nav>
            <h1>Borrar un empleado</h1>
       </nav>
       <div>
            <aside>
                <p>
                     
                </p>
            </aside>
            <article>
            <?php
              require 'clases.php';
              $conexion= new Conexion();
              $id=$_GET["id"];
              $consulta = 'delete from Empleados where idEmpleado="'.$id.'"';
              echo 'EMPLEADO BORRADO';
              $conexion->consulta($consulta);
              if( $conexion->nfilas()>0){
                echo 'empleado borrado correctamente';
              }else{
                echo $conexion->error();
              }
              echo'<br /> 
                <form method="post" action=""> 
                <input type="submit" value="Volver al inicio" name="volver" >
                </form>  ';
                
                
              ?>
            </article> 
       </div>
       <footer></footer>
    </body>
</html>


