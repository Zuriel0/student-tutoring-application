<!-- Este archivo crear un formulario de registro para nuevos usuarios a partir de codigo JavaScript el cual permite bloquear el bonton de registro hasta que se implemente los datos requeridos, este archivo se encuentra en ./Scripts/Form.js, cuenta con liga directas a archivos de estilo para llevar a cabo efectos de error y de aceptacion los cuales son de uso publico. -->  
 
 <?php

include_once ("./../include/query.php");
//include_once ("Conexion.php");
$names="";
$fname="";
$numB="";
$password="";
$password2="";
$mail="";


if($_POST['names']=="" || $_POST['password']=="" || $_POST['numB']=="" || $_POST['mail']=="" || $_POST['password2']=="" ){}
else{

if ($_POST){
  
  $names = (isset($_POST['names']))?$_POST['names'] : "";
  $fname = (isset($_POST['fname']))?$_POST['fname'] : "";
  $mail = (isset($_POST['mail']))?$_POST['mail'] : "";
  $numB = (isset($_POST['numB']))?$_POST['numB'] : "";
  $password = (isset($_POST['password']))?$_POST['password'] : "";
  $password2 = (isset($_POST['password2']))?$_POST['password2'] : "";

  
  
  $objConexion= new only_query();
  $sql = "SELECT * FROM `Users` WHERE `Mail` LIKE '".$_POST['mail']."'";
  $Var_=$objConexion->searchSql($sql);
  
  /*$sql = "SELECT * FROM `Users` WHERE `Numero de boleta` = ".$_POST['numB'];
  $Var_1=$objConexion->searchSql($sql);*/

    if( $_POST['mail'] != $Var_['Mail'] && $_POST['numB'] != $Var_['Numero de boleta'] ) {

      $sql="INSERT INTO `Users` (`ID`, `Name`,`fname` , `password`, `Mail`, `Numero de boleta`, `Tipo`) VALUES (NULL, '".$_POST['names']." ','".$_POST['fname']."', '".$_POST['password']."', '".$_POST['mail']."', '".$_POST['numB']."', '1');";
      $lol=$objConexion->ejecSql($sql);
      header("location: ../index.php");   

    }
    elseif($_POST['numB'] == $Var_['Numero de boleta']) {echo "<script> alert('Tu numero de boleta ya esta registrado') </script>";}
    elseif($_POST['mail'] == $Var_['Mail']) {echo "<script> alert('Tu mail ya esta registrado') </script>";}  

}
}
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Login Servicio</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./../Styles/style_form.css">
    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
  </head>
  <body>

    <div class="container">

        <div class="row">
            <div class="col-md-4">
                
            </div>    
            <div class="col-md-4">
            <br/>
            <div class="card">
              <div class="card-header">
                <label for="" class="formulario__label">Registro</label> 
              </div>
              <div class="card-body">
                <!-- form -->
                <form action="Registro.php" class="formulario" method="post" id="formulario">
                  
                  <!-- Grupo: names -->
                  <div class="formulario__grupo" id="grupo__names">
                    <label for="names" class="formulario__label">Nombre:</label>
                    <div class="formulario__grupo-input">
                    <input  class="form-control "  type="text" name="names" id="names" >
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El nombre no puede tener numeros o caracteres especiales.</p>
                  </div>
                  <br/>

                  <!--Grupo de fname -->
                  <div class="formulario__grupo" id="grupo__fname">  
                    <label for="fname" class="formulario__label">Apellido:</label>
                    <div class="formulario__grupo-input">
                      <input  class="form-control "  type="text" name="fname" id="fname" >
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El apellido no puede tener numeros o caracteres especiales.</p>
                	</div>
                  <br/>

                  <!--Grupo de mail -->
                  <div class="formulario__grupo" id="grupo__mail">
                    <label for="mail" class="formulario__label">Correo Electrónico:</label>
                    <div class="formulario__grupo-input">
                    <input  class="form-control" type="text" name="mail" id="mail">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                  </div>
                  <br/>
                  <!-- grupo numB -->

                  <div class="formulario__grupo" id="grupo__numB">
                    <label for="numB" class="formulario__label">Numero de boleta:</label>
                    <div class="formulario__grupo-input">
                      <input class="form-control" type="text" name="numB" id="numb">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El numero de boleta solo puede contener numeros 10 dígitos.</p>
                  </div>
                  <br/>
                  <!-- grupo password -->
                  
                  <div class="formulario__grupo" id="grupo__password">
                    <label for="password" class="formulario__label">Contraseña:</label>
                    <div class="formulario__grupo-input">
                     <input class="form-control" type="password" name="password" id="password">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">La contraseña tiene que ser de 4 a 22 dígitos.</p>
                  </div>
                  <br/>
                  <!-- grupo password -->

                  <div class="formulario__grupo" id="grupo__password2">
                    <label for="password2" class="formulario__label">Confirma Contraseña:</label>
                    <div class="formulario__grupo-input">
                    <input class="form-control" type="password" name="password2" id="password2">
                      <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                  </div>
                  <br/>

                  <!-- Grupo: Terminos y Condiciones -->
                  <div class="formulario__grupo" id="grupo__terminos">
                    <label class="formulario__label">
                      <input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
                      Acepto los Terminos y Condiciones
                    </label>
                  </div>
                  <div class="formulario__mensaje" id="formulario__mensaje">
                   
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                  </div>
                  <br/>
                  <!-- Grupo de boton -->
                  <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <button class="btn btn-success" type="submit" >Registrase </button>
                    <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                  </div>
                  
                   
                  
                </form>          
              </div>
              <div class="card-footer text-muted">
                ¿Ya tienes cuenta? <a href="./../index.php">Regresar a Login</a> 
              </div>
            </div>
              
            </div>    
            <div class="col-md-4">
                
            </div>    
        </div>
      
    </div>
    
        

    <script src="./../Scripts/Form.js"></script> 
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  </body>
</html>