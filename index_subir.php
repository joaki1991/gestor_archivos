<?php
include('encabezado.php');

$dir = 'archivos subidos';
// Primero voy a crear el directorio
if(!file_exists($dir))mkdir('archivos subidos');
// Si no se ha subido ningún archivo no lo copiamos en la carpeta específica ni imprimimos nada
if(!empty($_FILES)){
  move_uploaded_file($_FILES['archivo']['tmp_name'], $dir.'\\'.$_FILES['archivo']['name']);  
}
echo '<br><br>
      Archivos subidos: <br><br>';
  
   
// Ahora voy a abrir el directorio  
if ($dh = opendir($dir)) {
  // Ahora voy a utilizar un while para decir que mientras se puedan leer archivos en el direcotrio se continue
    
    while (($archivo = readdir($dh)) !== false) {
      // Con el siguiente if, elimino los puntos que preceden a cada archivo para imprimir solo el nombre
      if ($archivo != "." && $archivo != "..") {
        echo "<form action='borrar.php' method='post'>
              <br><input type='checkbox' value='$archivo' name='archivo'>$archivo
              <button><a style='text-decoration: none; color: black' href='archivos subidos/$archivo' download>Descargar</a></button>";              
      }      
    }
    echo '<br><br>Borrar archivos seleccionados:';
    echo "<button type='submit'>Borrar</button>
          </form><br>"; // Para la descarga del archivo he optado por usar un hipervínculo al archivo y para borrarlo, uso un formulario 
    closedir($dh);// Por último cerramos el directorio
}

echo '</body>
      </html>';
?>