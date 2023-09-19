<!-- Este archivo tiene como objetivo mostrar la cabecera a lo largo de toda la intereccion de la pagina, desde este arhivo mandamos a llamar extenciones de clases y funciones, desde este archivo se manda a llamar el archivo query.php (Para consultas y escirturas en base de datos), userSession.php el cual almacena variables de incio de secion--> 
<?php 
//echo "hola";
require ("./../include/User_session.php");

$userSession = new UserSession();
$dataSession=$userSession->getCurrentUser();
//print_r($dataSession);

//print_r ($dataSession);

if(isset($dataSession['id'])){
  //echo "hay sesion";
}else { 
  //echo "no hay sesion";
  header("location:./../index.php"); 
}
require ("./../include/query.php");
require ("./../include/config.php");

$data=query_data_user($dataSession['id']);
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicio</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./../Styles/style.css">
    <link rel="stylesheet" href="./../Styles/header.css">
    <link rel="stylesheet" href="./../Styles/search-from.css">
</head>
<body>

<header class="p-3 mb-3 border-bottom" id="grupo__header">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="Home.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <img src="./../../storage/upload/ipn_logo.png" alt="mdo" width="62" height="52">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/portafolio/home/Home.php" class="nav-link px-3 link-secondary">Todos</a></li>

            <li class="nav-item dropdown" id="myDropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">  Semestres  </a>
              <ul class="dropdown-menu">
                
                <li><a class="dropdown-item" href="#"> Primer Semestre &raquo; </a>
                  <ul class="submenu dropdown-menu">
                    <?php 
                    $res = nav_selector_mat(1);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
                  </ul>
                </li>

                <li><a class="dropdown-item" href="#"> Segundo Semestre &raquo; </a>
                  <ul class="submenu dropdown-menu">
                    <?php 
                    $res = nav_selector_mat(2);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
                  </ul>
                </li>

                <li><a class="dropdown-item" href="#"> Tercer Semestre &raquo; </a>
                  <ul class="submenu dropdown-menu">
                    <?php 
                    $res = nav_selector_mat(3);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
                  </ul>
                </li>

                <li><a class="dropdown-item" href="#"> Cuarto Semestre &raquo; </a>
                  <ul class="submenu dropdown-menu">
                    <?php 
                    $res = nav_selector_mat(4);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
                  </ul>
                </li>

                <li><a class="dropdown-item" href="#"> Quinto Semestre &raquo; </a>
                  <ul class="submenu dropdown-menu">
                    <?php 
                    $res = nav_selector_mat(5);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
                  </ul>
                </li>

                <li><a class="dropdown-item" href="#"> Sexto Semestre &raquo; </a>
                  <ul class="submenu dropdown-menu">
                   <?php 
                    $res = nav_selector_mat(6);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
                  </ul>
                </li>

                <li><a class="dropdown-item" href="#"> Séptimo Semestre &raquo; </a>
                  <ul class="submenu dropdown-menu">
                    <?php 
                    $res = nav_selector_mat(7);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
                  </ul>
                </li>

                <li><a class="dropdown-item" href="#"> Octavo Semestre &raquo; </a>
                  <ul class="submenu dropdown-menu">
                    <?php 
                    $res = nav_selector_mat(8);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
                  </ul>
                </li>

                <li><a class="dropdown-item" href="#"> Noveno Semestre &raquo; </a>
                  <ul class="submenu dropdown-menu">
                    <?php 
                    $res = nav_selector_mat(9);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
                  </ul>
                </li>

              </ul>
            </li>
  
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control" id="search-from" onkeypress="search()" placeholder="Buscar..." aria-label="Search">
          <div class="search-column" style="display:none;" id="search-from-pad">Buscando...</div>
        </form>
        <?php 
          if($data['Url'] ==""){
            $url= "./../../storage/upload/icon_avatar.png";
        }else{
          $url= $data['Url'];
        }
        ?>
        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo $url;?>" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1"> <!--  Menu de usuario     -->
            <li><a class="dropdown-item" href="tutorias.php?id=<?php echo $dataSession['id']; ?>&token=<?php echo hash_hmac('sha1',$dataSession['id'],KEY_TOKEN);?>">Tutorias</a></li>
            <li><a class="dropdown-item" href="setting.php?id=<?php  echo $dataSession['id']; ?>&token=<?php echo hash_hmac('sha1',$dataSession['id'],KEY_TOKEN);?>">Configuracion</a></li>
            <li><a class="dropdown-item" href="profile.php?id=<?php  echo $dataSession['id']; ?>&token=<?php echo hash_hmac('sha1',$dataSession['id'],KEY_TOKEN);?>">Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../include/Logout.php">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>

<!------------------------------------------------ zona mobile ---------------------------------------->


<header id="grupo__header_mob">
  <nav class="navbar bg-light fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"> 
      <img src="./../../storage/upload/ipn_logo.png" alt="mdo" width="62" height="52">Servicio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo $url;?>" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1"> <!--  Menu de usuario     -->
            <li><a class="dropdown-item" href="tutorias.php?id=<?php echo $dataSession['id']; ?>&token=<?php echo hash_hmac('sha1',$dataSession['id'],KEY_TOKEN);?>">Tutorias</a></li>
            <li><a class="dropdown-item" href="setting.php?id=<?php  echo $dataSession['id']; ?>&token=<?php echo hash_hmac('sha1',$dataSession['id'],KEY_TOKEN);?>">Configuracion</a></li>
            <li><a class="dropdown-item" href="profile.php?id=<?php  echo $dataSession['id']; ?>&token=<?php echo hash_hmac('sha1',$dataSession['id'],KEY_TOKEN);?>">Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../include/Logout.php">Sign out</a></li>
          </ul>
        </div>
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>




          
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/portafolio/home/Home.php">Todos</a>
            </li>


            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Primer Semestre</a>
            <ul class="dropdown-menu">
            <?php 
                    $res = nav_selector_mat(1);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
            </ul>
            
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Segundo Semestre</a>
            <ul class="dropdown-menu">
            <?php 
                    $res = nav_selector_mat(2);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
            </ul>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Tercer Semestre</a>
            <ul class="dropdown-menu">
            <?php 
                    $res = nav_selector_mat(3);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
            </ul>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Cuarto Semestre</a>
            <ul class="dropdown-menu">
            <?php 
                    $res = nav_selector_mat(4);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
            </ul>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Quinto Semestre</a>
            <ul class="dropdown-menu">
            <?php 
                    $res = nav_selector_mat(5);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
            </ul>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Sexto Semestre</a>
            <ul class="dropdown-menu">
            <?php 
                    $res = nav_selector_mat(6);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
            </ul>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Septimo Semestre</a>
            <ul class="dropdown-menu">
            <?php 
                    $res = nav_selector_mat(7);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
            </ul>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Octavo Semestre</a>
            <ul class="dropdown-menu">
            <?php 
                    $res = nav_selector_mat(8);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
            </ul>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Noveno Semestre</a>
            <ul class="dropdown-menu">
            <?php 
                    $res = nav_selector_mat(9);
                    foreach($res as $var){ ?>
                      <li><a class="dropdown-item" href="materia.php?id=<?php echo $var['MateriaID']; ?>&token=<?php echo hash_hmac('sha1',$var['MateriaID'],KEY_TOKEN);?>"> <?php echo $var['Materia_Name']; ?></a></li>
                    <?php }?>
            </ul>


          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" id="search-from" onkeypress="search()" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>
  </nav>
  <br><br><br><br>
</header>


  <script>
        let navegador = navigator.userAgent;
        if (window.innerWidth <= 768) {
            console.log("Es un móvil");
            document.getElementById(`grupo__header`).classList.add('head_block');
        }else{
          document.getElementById(`grupo__header_mob`).classList.add('head_block');
        }
  </script>
  <style>
    .head_block{
      display: none;
    }
  </style>
  <script src="./../Scripts/header.js"></script>
  <script src="./../Scripts/search-from.js"></script> 
    

  


