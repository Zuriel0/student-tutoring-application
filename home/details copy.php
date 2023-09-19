<!-- Este archivo tiene como objetivo mostrar en detalle el perfil de los tutores, con la opcion de solicitar la tutoria, cuando la solicitud es aceptada se habilita el chat, el cual se estare de la siguiente ruta ./include/chat/ index.php -->


<?php include("Header.php"); ?>
<?php
 //require ("./../include/query.php");
 //require ("./../include/config.php");

function dateTime ($arg, $seps){
  $sep = $seps;
  $cad = $arg;
  $Separador = explode($sep, $cad);
  return $Separador;
}

 $id = isset($_GET['id']) ? $_GET['id'] : '';
 $token = isset($_GET['token']) ? $_GET['token'] : '';
 if ($id=='' || $token==''){
    echo "Error intente de new";
    exit;
 }else{
    $token_tmp= hash_hmac('sha1',$id, KEY_TOKEN);
    if ($token==$token_tmp){
        
        $objConecion= new only_query();
        $sql=$objConecion->connect()->prepare("SELECT count(ID) FROM Users_tutores Where ID=? AND  Tipo=1");
        $sql->execute([$id]);
        $userSession->setCurrentTutor($id);
        if ($sql->fetchColumn()> 0){

            $sql=$objConecion->connect()->prepare("SELECT Name, Escuela, Semestre, carrera, Url, Abstract FROM Users_tutores Where ID=? AND  Tipo=1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $name = $row['Name'];
            $escuela = $row['Escuela'];
            $semestre = $row['Semestre'];
            $abstract = $row['Abstract'];
            $carrera = $row['carrera'];
            $url = $row['Url'];
            

            $sql = "SELECT solicitudes.id, solicitudes.status_tutor, solicitudes.status_user FROM solicitudes WHERE solicitudes.id_user = ".$dataSession['id']." AND solicitudes.id_tutor = ".$id.";";
            $status_sol = $objConecion->searchSql($sql);
            $_SESSION['id_chat'] = $status_sol['id'];
            $_SESSION['name_tutor'] = $name;
            $_SESSION['url_tutor'] = $url;
            //print_r ($status_sol);
            //print_r ($_SESSION);

            if($status_sol['status_tutor'] ==1 && $status_sol['status_user']==1){
              $date = query_date_colcult($status_sol['id']);
            }
            if( isset($date) && $date['status_user'] !=3 ){
              $dateConf = dateTime($date['initDate'], " ");
              $initDate = $dateConf[0]; $initTime = $dateConf[1]; 
              $dateConf = dateTime($date['finishDate'], " ");
              $finishDate = $dateConf[0]; $finishTime = $dateConf[1];
              if(($date['status_tutor'] == 0 && $date['status_user'] == 0) || ($date['status_tutor'] == 0 && $date['status_user'] == 1) || ($date['status_tutor'] == 1 && $date['status_user'] == 0)){
                $sql = "DELETE FROM dates WHERE id = ".$status_sol['id']." ;";
                $objConecion->executeSql($sql);
                $date = query_date_colcult($status_sol['id']);
              }elseif ($date['status_tutor'] == 1 && $date['status_user'] == 1) {
                $time = timeComparer($initTime,$finishTime);
                $sql = "SELECT tiempo FROM Users_tutores WHERE ID = ".$date['id_tutor']." ;";
                $inf_tutor = $objConecion->searchSql($sql);
                $tiempoo = $inf_tutor['tiempo'];
                print_r($inf_tutor);
                echo $tiempoo." y ".$time;
                $time = adderTime( $time, $inf_tutor['tiempo']);
                $sql = "UPDATE Users_tutores SET tiempo =  '$time'  WHERE Users_tutores.ID = ".$date['id_tutor']." ;";
                $objConecion->ejecSql($sql);
                $sql = "DELETE FROM dates WHERE id = ".$status_sol['id']." ;";
                $objConecion->executeSql($sql);
                $date = query_date_colcult($status_sol['id']);
              }

            }
            
            if(isset($status_sol)){
              
              if( $status_sol['status_tutor']==0 && $status_sol['status_user']==0 ){
                $btn_sol = "btn-success";
                $val_sol = "sol";
                $text_btn = "Solicitar Tutoria";
                if($_POST['sol']!= ""){
                  $sol = (isset($_POST['sol']))?$_POST['sol'] : "";
                  //echo $sol."Disponible";
                  $sql = "UPDATE `solicitudes` SET `status_user` = '1' WHERE solicitudes.id_tutor = ".$id." AND solicitudes.id_user = ".$dataSession['id'].";";
                  $objConecion->ejecSql($sql);
                  $btn_sol = "btn-warning";
                  $text_btn = "Cancelar Solicitud";
                  $val_sol = "cancel";
                  $_POST['cancel'] = "";
                }
              }elseif($status_sol['status_tutor']==0 && $status_sol['status_user']==1){
                $btn_sol= "btn-warning";
                $val_sol = "cancel";
                $text_btn = "Cancelar Solicitud";
                //print_r ($_POST['cancel']);
                if($_POST['cancel'] != ""){
                  $sol = (isset($_POST['cancel']))?$_POST['cancel'] : "";
                 
                  $sql = "UPDATE `solicitudes` SET `status_user` = '0' WHERE solicitudes.id_tutor = ".$id." AND solicitudes.id_user = ".$dataSession['id'].";";
                  $objConecion->ejecSql($sql);
                  $btn_sol = "btn-success";
                  $text_btn = "Solicitar Tutoria";
                  $val_sol = "sol";
                  $_POST['sol'] = "";
                }
              }
            }else{
              //echo "esto no se debe de ver";
              $sql = "INSERT INTO `solicitudes` (`id_tutor`, `status_tutor`, `status_user`, `id_user`) VALUES ('".$id."', '0', '0', '".$dataSession['id']."');"; 
              $objConecion->ejecSql($sql);
              $val_sol = "sol";
              $btn_sol = "btn-success";
              $text_btn = "Solicitar Tutoria";
            }
            if(isset($date)){}
            else{
              if(isset($_POST['date']) ){
                $seps ="T";
                $initDate = dateTime($_POST['initDate'],$seps);
                $init = $initDate[0]." ".$initDate[1];
                $finishDate = dateTime($_POST['finishDate'],$seps);
                $finish =  $finishDate[0]." ".$finishDate[1];
                query_date_generator($status_sol['id'],$id, $dataSession['id'], $init, $finish, 0);
              }  
            }
            if($_GET['f1'] != ""){
              $sql = "UPDATE `dates` SET `status_user` = '1' WHERE dates.id = ".$status_sol['id']." ;";
              $objConecion->executeSql($sql);
              $date = query_date_colcult($status_sol['id']);
            }elseif($_GET['f2'] != ""){
              $sql = "UPDATE `dates` SET `status_user` = '0' WHERE dates.id = ".$status_sol['id']." ;";
              $objConecion->executeSql($sql);
              $date = query_date_colcult($status_sol['id']);
            }
        }

    }else{
        echo "Error intente de new";
        exit;
    }
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="container">

        <div class="col" >
          <div class="card mb-3" style="max-width: auto;">
            <div class="row g-0">
              <div class="col-md-4">
                  <?php  
                      //$id= $var['ID'];
                      //$image = "./../include/upload/tutors/$id/ "
                      if($url==""){
                          $url= "./../include/upload/icon_avatar.png";
                      }
                  ?>
                <img src="<?php echo $url;?>" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $name;  ?></h5>
                  <p class="card-text"><strong>Escuela:</strong> <?php echo $escuela;?> <br/>
                  <strong>Semestre:</strong> <?php echo $semestre;?> <br/>
                    <strong> Materias dominantes:</strong> <?php query_materias($id);?> <br/>
                    <strong>Carrera:</strong> <?php echo $carrera;?> <br/>
                    <strong>Abstract: </strong><?php echo $abstract;?> </p>
                  <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                  <div class = "row align-items-end">
                    <div class="col-auto"> 
                      <?php 
                      if($status_sol['status_tutor'] ==1 && $status_sol['status_user']==1){
                        if($date['state']==0){
                        ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="<?php echo isset($date)?"popover":"modal" ?>" data-bs-target="#exampleModal" <?php echo isset($date)?' data-bs-title="En espera" data-bs-content="Se ha enviado una soicitud de cita, espera a que el tutor la valide"':""; ?> ><i class="bi bi-calendar-date"></i> Candelariza una sesion</button> <i class="bi bi-exclamation-circle"></i>
                      <?php }elseif ($date['status_user']==1 || $date['status_user']==0 ) { ?>
                        <div><i class="bi bi-calendar2-range"></i> Espera a que tu tutor valide tu cita para agendar otra</div>
                    <?php    
                      }else{
                          $dateConf = dateTime($date['initDate'], " ");
                          $initDate = $dateConf[0]; $initTime = $dateConf[1]; 
                          $dateConf = dateTime($date['finishDate'], " ");
                          $finishDate = $dateConf[0]; $finishTime = $dateConf[1];
                          $fecha_entrada  = strtotime(($finishDate." ".$finishTime));
                          $fecha_actual = strtotime(date("Y-m-d H:i:00",time()));
                          if($fecha_actual > $fecha_entrada){
                          ?>
                          <div class="card">
                            <div class="card-header">
                              ¿Que tal tu reunion?
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">¿La reunion se llevo a cabo?</h5>
                              <p class="card-text"></p>
                              <button type="submit" class="btn btn-success" name="aceptar" value="1" onclick="myFunction (1)" id="aceptar">Si todo bien!</button>
                              <button type="submit" class="btn btn-danger" name="denied" value="1" onclick="myFunction (2)" id="denied">No se presento</button>
                            </div>
                          </div>
                     <?php     
                          }
                          else{ ?>
                            <div><i class="bi bi-calendar2-range"></i> Tienes programa una cita para el <strong><?php echo $initDate?></strong> a las <strong><?php echo $initTime?></strong></div>
                      <?php
                          }
                       }                    
                    }else { ?>
                      <form action="" method="post">
                        <button type="submit" class="btn <?php echo $btn_sol;?>" name="<?php echo $val_sol;?>" value="1"><?php echo $text_btn;?></button> 
                      </form>
                      <?php }  ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script>
          setTimeout(
            function(){
            document.getElementById('chat').scrollTop=5000;},500);
          const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
          const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
        </script>
        

        <!-- style="--bs-modal-width: 900px;" -->
<div class="modal fade" style="--bs-modal-width: 550px;" id="exampleModal" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agenda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" id="formulario-date">
        <div class="modal-body" id="calendar" > 
          <div class="col" >
            De:
            <input type="datetime-local" value="<?php echo date('Y-m-d').'T'.date('H:i')?>" min="<?php echo date('Y-m-d').'T'.date('H:i');?>" max="<?php echo date('Y')."-".(date('m')+1)."-".date('d')?>" name="initDate" id=""> a
            <input type="datetime-local" min="<?php echo date('Y-m-d')?>" max="<?php echo date('Y')."-".(date('m')+1)."-".date('d')?>" name="finishDate"  id="">
          </div>        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="date" value="1" id="buttonDate">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>



<?php 
if($status_sol['status_tutor']==1 && $status_sol['status_user']==1){
  include_once "./../include/chat/index.php";

} 
?>

</div>

<script src="./../Scripts/details.js"></script> 
</body>
</html>