<?php
if (isset($_REQUEST['documento'])) {
$documento= $_REQUEST['documento'];
} else {
$documento= "";
}
$documento=$documento.".pdf";

$nom_ruta="../pdf/".$documento;

//$nombre_fichero = 'prueba.txt';
if (is_readable($nom_ruta)) { ?>
<div> 
<embed src='../pdf/<?php echo $documento; ?>#toolbar=0' width='850' height='400'>
</div>
<?php
   // echo 'El fichero es legible';
} else { ?>
<div>
<h2 class="text text-danger">Hoja de Vida no disponible.</h2>
</div>
<?php
    //echo 'El fichero no es legible';
}



?>
