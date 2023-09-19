<!-- Este archivo unicamente incorpora e mesaje escrito en el chat y se encarga de insertarlo en la tabla de chat en la base de datos -->

<?php include("./../query.php"); ?>

<?php 
require ("./../User_session.php");           
$userSession = new UserSession();
$dataSession=$userSession->getCurrentUser();
//echo "funciono";

date_default_timezone_set("America/Mexico_City");
$txt = isset($_POST['txt'])? $_POST['txt'] :"";
 if (isset($_POST['txt'])){
   $objConecion= new only_query();
   $sql = "INSERT INTO `chat` (`id_sol`, `user`, `tutor`, `txt`, `date`) VALUES ('". $_SESSION['id_chat']."', '1', '0', '".$txt."', current_timestamp());";
   $objConecion->ejecSql($sql);
   $txt = "";
 }


?>