<!-- Este archivo es el encargado de realizar un filtro entre tutores por materia el cual identifica la materia a partir del id que es ingresado desde la variable $_GET, pasando por una funcion para realizar la cosulta necesaria -->

<?php include("Header.php"); ?>
<?php


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

        if ($sql->fetchColumn()> 0){

            $sql=$objConecion->connect()->prepare("SELECT Name, Escuela, Semestre, Url, Abstract FROM Users_tutores Where ID=? AND  Tipo=1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $name = $row['Name'];
            $escuela = $row['Escuela'];
            $semestre = $row['Semestre'];
            $abstract = $row['Abstract'];
            
        }

    }else{
        echo "Error intente de new";
        exit;
    }
 }
?>

<body>

<div class="container">
    <div class="row row-cols-3" id="colum__tutors"> 
    <?php 
    $res=search_tutor_select($id);
    foreach($res as $var){
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
                  <strong>Semestre:</strong> <?php echo $var['Semestre'];?></p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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

</body>
</html>