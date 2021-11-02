<?php
    function form(){
      if(isset($_POST['volver'])){
        header("Location: menuOpciones.php");
      } 
        echo'<form method="post" action="" style="border:1px solid #ccc">
        <h1>Registre un empleado</h1>
        <p>Rellene este formulario para registrar el empleado.</p>

        <label>Nombre</label><br />
        <input type="text" placeholder="Introduce el nombre" name="nombre" required><br />
    
        <label for="email">Email</label><br />
        <input type="text" placeholder="Email" name="email" ><br />
    
        <label>DNI</label><br />
        <input type="text" placeholder="Intruzca el DNI" name="dni" required><br />
    
        <label>Telefono</label><br />
        <input type="tel" placeholder="Teléfono" name="telef" required><br /><br />
    
        <input type="submit" id="enviar" name="envio">
    </form>';
    echo'<br /> 
      <form method="post" action=""> 
        <input type="submit" value="Inicio" name="volver" >
      </form>  ';
        
    }
  ?>
 <!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8" >
        <title>Pagina empleados</title>
        <link rel=stylesheet href=estiloIntroducir.css />
        
    </head>
    <body>
       <header>
           <h1>Aplicacion Empleados</h1>
       </header>
       <nav>
            <h1>Menu Introducir Empleados</h1>
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
                $nombre= '"'.$_POST["nombre"].'"';
                $dni= '"'.$_POST["dni"].'"';
                $telef= '"'.$_POST["telef"].'"';
                $consulta = "insert into Empleados(nombre,dni,correo,telefono) values(".$nombre.",".$dni.",".$correo.",".$telef.")";      
                echo 'empleado introducido correctamente';
                $conexion->consulta($consulta);
                  echo'<form  action="">
                    <input type="submit" value="volver a introducir" onclick="window.location.reload()">
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


