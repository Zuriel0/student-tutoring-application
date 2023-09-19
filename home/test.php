<?php
include("Header.php");

function dateTime ($arg, $seps){
    $sep = $seps;
    $cad = $arg;
    $Separador = explode($sep, $cad);
    return $Separador;
  }
  function timeComparer ( $initTime, $finishTime ){
    $dateConf = dateTime($initTime,":");
    $dateConf2 = dateTime($finishTime,":");
    if($dateConf[0]==$dateConf2[0]){
      $min = $dateConf2[1] - $dateConf[1];
      return "00:".sprintf("%02d",$min);
    }elseif($dateConf2[0]==$dateConf[0]+1){
      $min = (60 - $dateConf[1]) + $dateConf2[1]; 
      if($min>=60){
        $min = $min - 60;
        return "01:".sprintf("%02d",$min);
      }
      return "00:".sprintf("%02d",$min);
    }elseif($dateConf2[0]>$dateConf[0]+1){
      $min = (60 - $dateConf[1]) + $dateConf2[1]; 
      $horas = $dateConf2[0] - $dateConf[0];
      if($min>=60){
        $min = $min - 60;
        $horas = $horas; 
        return $horas.":".sprintf("%02d",$min);
      }
      return $horas.":".sprintf("%02d",$min);
    }
  }
  function adderTime($time, $time2){
    $time = dateTime($time,":");
    $time2 = dateTime($time2,":");
    $min = $time[1] + $time2[1];
    $horas = $time[0] + $time2[0];
    if($min>=60){
      $min = $min - 60;
      $horas = $horas + 1;
      return sprintf("%02d",$horas).":".sprintf("%02d",$min);
    }
    return sprintf("%02d",$horas).":".sprintf("%02d",$min);
  }

$objConecion = new only_query;

$date = query_date_colcult(19);
$dateConf = dateTime($date['initDate'], " ");
$initDate = $dateConf[0]; $initTime = $dateConf[1]; 
$dateConf = dateTime($date['finishDate'], " ");
$finishDate = $dateConf[0]; $finishTime = $dateConf[1];

echo "Esto es finishDate:".$finishDate."</br>";

print_r ($date);
echo "</br> Esto es otra linea. </br>";
echo $date['id_tutor']."</br>";
$time = timeComparer($initTime,$finishTime);
$time_tmp = $time;
$sql = "SELECT tiempo FROM Users_tutores WHERE ID = 1 ;";
$inf_tutor = $objConecion->searchSql($sql);
echo $date['id_tutor']."</br>";
$tiempoo = $inf_tutor['tiempo'];
print_r($inf_tutor);
$time = adderTime( $time, $inf_tutor['tiempo']);
$sql = "UPDATE Users_tutores SET tiempo =  '$time'  WHERE Users_tutores.ID = ".$date['id_tutor']." ;";
//$objConecion->ejecSql($sql);
$sql = "UPDATE dates SET completado = '1', state = '1', tiempo =  '$time_tmp' WHERE Id_date =".$date['Id_date']."  AND id = ".$status_sol['id']." ;";
//$objConecion->executeSql($sql);
$date = query_date_colcult(19);

echo "Todo bien:  $time";
?>