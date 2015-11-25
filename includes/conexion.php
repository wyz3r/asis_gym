<?php
/*$servidor ="localhost";
$usuario= "Admin";
$contrasena= ' ';
$BD="SAD";
$conexion= @mysql_connect($servidor,$usuario,$contrasena);
	if($conexion){
		die('<strong>N0 Pudo conectarse  <strong>'.mysql_error());
	}
	else
	{
		echo'Conectado Satisfactoriamente <br>';

	}

	mysql_select_db($BD,$conexion)
	or
	die(mysql_error($conexion));
*/
function conectarse() {
   if (!($link=mysql_connect("localhost","root","")))
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("asis_gym",$link)) // nombre de la base de datos
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
  $result = mysql_query("SET NAMES 'UTF8'"); //
  $hola="Hola ";

   return $link;
  }
?>
