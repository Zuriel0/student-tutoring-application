<!--Encargado de destruir las seciones de usuario para una mayor seeguridad-->

<?php

    include_once 'User_session.php';

    $userSession = new UserSession();
    $userSession->closeSession();

    header("location:./../index.php");

?>