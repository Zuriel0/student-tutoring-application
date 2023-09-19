<?php
include("query.php");
include("User_session.php");

$userSession = new UserSession();
$dataSession=$userSession->getCurrentUser();
$objConecion= new only_query();
$sql = "SELECT solicitudes.id, solicitudes.status_tutor, solicitudes.status_user FROM solicitudes WHERE solicitudes.id_user = ".$dataSession['id']." AND solicitudes.id_tutor = ".$dataSession['tutor']." AND solicitudes.status = 0;";
//$status_sol = $objConecion->searchSql($sql);
$sql = "SELECT * FROM detalles_tutor WHERE id_tutor = ".$dataSession['tutor']."";
$status_sol = $objConecion->searchSql($sql);
$id_tutor= $dataSession['tutor'];
function writeCal ($cal,$dif,$rec,$tutorias,$id_tutor){
  $objConecion= new only_query();
  $sql = "SELECT * FROM detalles_tutor WHERE id_tutor = ".$id_tutor.";";
  $status_sol = $objConecion->searchSql($sql);
  $cal = $cal + $status_sol['calificacion'];
  $dif = $dif + $status_sol['dificultad'];
  $rec = $rec + $status_sol['recomendación'];
  $tutorias = $tutorias + $status_sol['tutorias_completadas'];
  $sql = "UPDATE detalles_tutor SET calificacion = $cal, dificultad = $dif, recomendación = $rec , tutorias_completadas = $tutorias WHERE id_tutor = $id_tutor ;";
  $objConecion->ejecSql($sql);
}
if(isset($status_sol)){
  if(isset($_POST['cal'])){
    $sql = "UPDATE solicitudes SET status = '1' WHERE id = ".$dataSession['id_chat']." ;";
    $objConecion->ejecSql($sql);
    writeCal($_POST['cal'],$_POST['comCal'],$_POST['recCal'],1,$id_tutor);
  }
}else{
  $sql = "INSERT INTO detalles_tutor (id_tutor, calificacion, dificultad, recomendación, tutorias_completadas) VALUES ('".$dataSession['tutor']."', '0', '0', '0', '0') ;";
  $objConecion->ejecSql($sql);
  if (isset($_POST['cal'])) {
    $sql = "UPDATE solicitudes SET status = '1' WHERE id = ".$dataSession['id_chat']." ;";
    $objConecion->ejecSql($sql);
    writeCal($_POST['cal'],$_POST['comCal'],$_POST['recCal'],1,$id_tutor);
  }
}

?>