<?php
//fecha actual
/*$dia="";
$mes="";
$ano="";*/

$dia=date("j");
$mes=date("n");
$ano=date("Y");

//$fecha_nac="1981-11-01";
if($fecha_nac==""){
  list($nacano,$nacmes,$nacdia)=explode("-",$fecha_nac);	
} else {
	  list($nacano,$nacmes,$nacdia)=explode("-",$fecha_nac);
}

//fecha de nacimiento
 // list($nacano,$nacmes,$nacdia)=explode("-",$row_busqueda_estudiante['fecha_nac']);
$dianaz=$nacdia;
$mesnaz=$nacmes;
$anonaz=$nacano;
 
//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
 
if (($mesnaz == $mes) && ($dianaz > $dia)) {
$ano=($ano-1); }
 
//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
 
if ($mesnaz > $mes) {
$ano=($ano-1);}
 
//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
 
$edad=($ano-$anonaz);
 
print $edad." Años";
 
?>