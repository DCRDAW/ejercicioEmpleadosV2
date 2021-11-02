<?php
  if(isset($_POST['introducir'])){
      header("Location: introducir.php");
  }else{
    if(isset($_POST['buscar'])){
      header("Location: buscar.php");
    }else{
      if(isset($_POST['listar'])){
        header("Location: index.php");
      }
    } 
  }      
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8" >
        <title>Pagina empleados</title>
        <link rel=stylesheet href=estiloOpciones.css />
        
    </head>
    <body>
       <header>
           <h1>Aplicacion Empleados</h1>
       </header>
       <nav>
            <h1>Menu de Opciones</h1>
       </nav>
       <div>
            <aside>
                <p>
                     
                </p>
            </aside>
            <article>
              <form method="post" action=""> 
                  <input type="submit" value="Introducir Nuevo empleado" name="introducir" >
                  <input type="submit" value="Buscar un empleado" name="buscar" >
                  <input type="submit" value="Listado de empleados" name="listar" >
              </form> 
             
            </article> 
       </div>
       <footer></footer>
    </body>
</html>


