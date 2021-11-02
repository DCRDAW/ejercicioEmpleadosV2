<?php
    if(isset($_POST['volver'])){
        header("Location:menuOpciones.php");
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
            <h1>Menu Principal</h1>
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
                    $consulta = 'SELECT * FROM Empleados';
                    $resultado=$conexion->consulta($consulta);
                    echo '<div id="listado" ';
                    echo 'Resultado del listado :<br />';
                    if ($resultado->num_rows == 0) {
                        echo'error en la consulta';
                    }else{
                        for($i=0;$i<$resultado->num_rows;$i++){
                            $filas= $conexion->sacar();
                            echo '<p id="contenido">';
                            echo "| Id: " . $filas["idEmpleado"]. " | Nombre: " . $filas["nombre"]. " | Dni " . $filas["dni"]." | Correo " . $filas["correo"]." | Telefono: " . $filas["telefono"]; 
                            echo '<a href="decision.php?id='.$filas["idEmpleado"].'&dec=modificar">| MODIFICAR</a>';
                            echo '<a href="decision.php?id='.$filas["idEmpleado"].'&dec=borrar "onclick="return confirm(`¿Estás seguro de que quieres borrar a este empleado?`);">| BORRAR |</a>';
                            echo "<br>";
                            echo '</p>';
                          }
                    }

                      echo' 
                      <form method="post" action=""> 
                        <input type="submit" value="Al menu de opciones" name="volver" >
                      </form>  ';
                      echo '</div>';
                      
                ?>
            </article> 
       </div>
       <footer></footer>
    </body>
</html>
