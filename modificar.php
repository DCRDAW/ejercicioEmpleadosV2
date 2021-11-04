<?php
   if(isset($_POST['volver'])){
    header("Location: menuOpciones.php");
  }
    function form(){
        echo'<form method="post" action="" style="border:1px solid #ccc">
        <h1>Registre un empleado</h1>
        <p>Rellene este formulario para modificar el empleado.</p>
        
        <label>Nombre</label><br />
        <input type="text" placeholder="Introduce el nombre" name="nombre" required><br />
    
        <label for="email">Email</label><br />
        <input type="text" placeholder="Email" name="email" ><br />
    
        <label>DNI</label><br />
        <input type="text" placeholder="Intruzca el DNI" name="dni" required><br />
    
        <label>Telefono</label><br />
        <input type="tel" placeholder="Teléfono" name="telef" required><br /><br />
    
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
            <h1>Modificar los datos de un Empleado</h1>
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
              if(isset($_POST['envio'])){
                if(empty($_POST["email"])){
                  $correo='NULL';
                }else{
                  $correo= '"'.$_POST["email"].'"';
                }
                $nombre= $_POST["nombre"];
                $id= $_GET["id"];
                $dni= $_POST["dni"];
                $telef= $_POST["telef"];
                $consulta = 'update Empleados set nombre="'.$nombre.'",dni="'.$dni.'",correo='.$correo.',telefono="'.$telef.'" where idEmpleado='.$id.';';
                echo $consulta;
                $conexion->consulta($consulta);
                if( $conexion->nfilas()>0){
                  echo 'empleado modificado correctamente';
                }else{
                  echo $conexion->error();
                }
                echo'<br /> 
                  <form method="post" action=""> 
                  <input type="submit" value="Volver al inicio" name="volver" >
                  </form>  ';
                if(isset($_POST['volver'])){
                  header("Location: index.php");
                }
              
              }else{
                  form();
              }
            ?>
            </article> 
       </div>
       <footer></footer>
    </body>
</html>