<?php
    if(isset($_POST['volver'])){ 
      header("Location: menuOpciones.php");
    } 
    function form(){
        echo'<form method="post" action="" style="border:1px solid #ccc">
        <h1>Busque un empleado</h1>
        <select name="buscar" id="busc">
          <option value="nombre">Por Nombre</option>
          <option value="dni">Por DNI</option>
          <option value="id">Por id</option>
        </select>
        <label>Término de búsqueda</label><br />
        <input type="text" placeholder="Introduce el término" name="termino" required><br />
        <div id="contenedor">
        <input type="submit" id="enviar" name="envio">
        </div>
        </form>';
    echo'<br /> 
      <form method="post" action=""> 
        <input type="submit" value="Volver al inicio" name="volver" >
      </form>  ';
    }
  ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina empleados</title>
        <link rel=stylesheet href=estiloIntroducir.css />
        
    </head>
    <body>
       <header>
           <h1>Aplicacion Empleados</h1>
       </header>
       <nav>
            <h1>Buscar un empleado</h1>
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
                $sw=0;
                //comprueba si se ha enviado el formulario
                if(isset($_POST['envio'])){
                    $eleccion= $_POST['buscar'];
                    $termino=$_POST['termino'];
                    //comprueba por qué termino esta buscando (id,nombre o dni)
                    switch ($eleccion) {
                      case 'id':
                        $consulta="select * from Empleados where idEmpleado='".$termino."'";
                        break;
                      case 'nombre':
                        $consulta="select * from Empleados where nombre LIKE '%".$termino."%'";
                        $sw=1;
                        break;
                      case 'dni':
                        $consulta="select * from Empleados where dni='".$termino."'";
                        break;
                      default:
                        echo'error';
                        break;
                    }
                    $resultado=$conexion->consulta($consulta);
                    //enseña los resultados solo si los hay

                      //si el sw esta a 0 significa que ha buscado por id o por dni, por lo que solo podrá devolver 1 fila
                      if($sw==0){
                        if(!$fila= $conexion->sacar()){
                          echo'<h1>nadie encontrado</h1>';
                        }else{
                          echo'<h1>Resultado de la Búsqueda</h1>';
                          echo '<div id="contenido">';        
                          echo "id: " . $fila["idEmpleado"]. " - Nombre: " . $fila["nombre"]. " dni " . $fila["dni"]." - telefono: " . $fila["telefono"]; 
                          echo '</div>';
                        }
                      }else{
                        //si el sw esta a 1 significa que ha buscado por nombre, por lo que puede devolver varias filas
                        if($resultado->num_rows==0){
                          echo'<h1>nombre no encontrado</h1>';
                        }else{
                          echo'<h1>Resultado de la Búsqueda</h1>';
                          echo'<div id="contenido">';
                          while($filas= $conexion->sacar()){
                            echo "id: " . $filas["idEmpleado"]. " - Nombre: " . $filas["nombre"]. " dni " . $filas["dni"]." - telefono: " . $filas["telefono"]."<br />";
                          }
                          echo '</div>';
                        } 
                      }

                  //boton que recarga la pagina
                    echo'<form  action="">
                        <input type="submit" value="volver a buscar" onclick="window.location.reload()">
                        </form>';
                }else{
                    form();
                }
              ?>
            </article> 
       </div>
       <footer></footer>
    </body>
</html>



