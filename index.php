<!-- Este archivo es el primero que scon que se interactua, de aqui se manda a llamr el formulario de login.php como tambien funciones de accer como User.php y  User_session.php para corroborar y almacenar datos de posibles usuarios-->

<?php
    require ("include/query.php");
    include_once ("include/User.php");
    include_once ("include/User_session.php");
    
    
    $userSession = new UserSession();
    $user = new User();
    

    if(isset($_SESSION['Mail'])){
        //echo "hay sesion";
        $user->setUser($userSession->getCurrentUser());
        include_once 'home/Home.php';
    
    }else if(isset($_POST['Mail']) && isset($_POST['password'])){
        //echo "Validacion loggin";
        $userForm = $_POST['Mail'];
        $passForm = $_POST['password'];
    
        $user = new User();
        if($user->userExists($userForm, $passForm)){
            //echo "Existe el usuario!!";

            $user->setUser($userForm);
            $id=$user->getNombre();
            $url = $user->getUrl();
            $userSession->setCurrentUser($userForm,$id,$url);
            
            header ('location: home/Home.php');
           
        }else{
            //echo "No existe el usuario";
            $errorLogin = "Nombre de usuario y/o password incorrecto";
            include_once 'home/Login.php';
        } 
    }else{
        //echo "login";
        include_once 'home/Login.php';
    }  
    
?>



