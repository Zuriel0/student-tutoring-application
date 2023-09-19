<!-- Este archivo solo contienen el html de vista para el pefil de usuario el cual es el encargado de mostrar la informacion del usuario para la complementacion de indformacion se manda a llamar el archvio con el mismo nombre profile.php desde la ruta ./include/profile.php -->

<?php include("Header.php"); ?>
<?php require ("./../include/profile.php");?>


    
<div class="container">

        <div class="col" >
          <div class="card mb-3" style="max-width: auto;">
            <div class="row g-0">
              <div class="col-md-4">
                  <?php  
                      //$id= $var['ID'];
                      //$image = "./../include/upload/tutors/$id/ "
                      if($url==""){
                        $url= "./../../storage/upload/icon_avatar.png";
                    }
                  ?>
                <img src="<?php echo $url;?>" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $name." ".$fname;  ?></h5>
                  <p class="card-text"><strong>Escuela:</strong> <?php echo $escuela;?> <br/>
                  <strong>Semestre:</strong> <?php echo $semestre;?> <br/>
                    <strong>Abstract: </strong><?php echo $abstract;?> </p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  
                </div>
              </div>
            </div>
          </div>
        </div>



</div>


</body>
</html>