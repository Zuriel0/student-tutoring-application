<!-- Este archivo es mandado a llamar desde Home.php para mostrar todos los tutores disponibles de la app, en donde se muestra informacion acerca de ellos donde en caso que se requiera mas informacion se manda a llamar details.php -->
<?php
function dateTime ($arg, $seps){
  $sep = $seps;
  $cad = $arg;
  $Separador = explode($sep, $cad);
  return $Separador;
}
?>

<div class="container">
    <div class="row " id="colum__tutors"> 
    <?php 
    $res=search_tutor_gen();
    //print_r ($res);
    foreach($res as $var){
      $time= dateTime($var['horario'], " ");
      if($var['Url']==""){
        $url= "./../../storage/upload/icon_avatar.png";
      }else{ $url= $var['Url'];} ?> 
      <a href="details.php?id=<?php echo $var['ID']; ?>&token=<?php echo hash_hmac('sha1',$var['ID'],KEY_TOKEN);?>" style="color: black; text-decoration: none;">
        <div class="col" >
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <div class="img-col-card">
                  <img src="<?php echo $url;?>" class="img-card" alt="...">
                </div>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $var['Name']  ?></h5>
                  <p class="card-text"><strong>Escuela:</strong> <?php echo $var['Escuela'];?> 
                  <strong>Carrera:</strong> <?php echo $var['Carrera'];?> <br/>
                  <strong>Semestre:</strong> <?php echo $var['Semestre'];?><br/>
                  <strong>Horario:</strong> <?php echo $time[0];?> a <?php echo $time[1];?></p>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        </a>
        <?php }?>
    </div>
</div>
<script>
    if (window.innerWidth <= 768) {
        console.log("Es un móvil");
        document.getElementById(`colum__tutors`).classList.remove('row-cols-3');
        document.getElementById(`colum__tutors`).classList.add('row-cols-1');
    }else{
      document.getElementById(`colum__tutors`).classList.remove('row-cols-1');
      document.getElementById(`colum__tutors`).classList.add('row-cols-3');
    }
</script>
<!-- <script src="./../Scripts/responsive.js"></script>  -->
</body>
</html>