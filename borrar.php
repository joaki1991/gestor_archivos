<?php

if(isset($_POST['archivo'])) unlink('archivos subidos\\'.$_POST['archivo']); // borramos el archivo si esta seleccionado

include('index_subir.php'); // cargamos de nuevo el index
?>