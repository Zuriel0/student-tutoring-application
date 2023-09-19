<!-- Este archvio es un llamado especial que inclulle unicamente la seccion de mensajes el cual se actualiza cada 500 milisegundos para mostrar todos los mensajes en tiempo real a partir de un Script que se ahace refencia en ./include/chat/index.php -->

<?php include("./../query.php"); ?>
<?php 
            require ("./../User_session.php");
            
            $userSession = new UserSession();
            $dataSession=$userSession->getCurrentUser();
            
            $chat = query_chat_info( $dataSession['id'], $dataSession['tutor'], $dataSession['id_chat']);
            foreach($chat as $var){ 
              
              if ($var['tutor'] == 1) {
          ?>

            <div class="d-flex justify-content-between">
              <p class="small mb-1"><?php echo $_SESSION['name_tutor'];?></p>
              <p class="small mb-1 text-muted"><?php echo formatDate($var['date']);?></p>
            </div>
            <div class="d-flex flex-row justify-content-start">
              <img src="<?php echo $_SESSION['url_tutor']; ?>"
                alt="avatar 1" style="width: 45px; height: 100%; border-radius: 35px;">
              <div>
                <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;"><?php echo $var['txt'];?></p>
              </div>
            </div>
                <?php }elseif($var['user']){ ?>
            <div class="d-flex justify-content-between">
              <p class="small mb-1 text-muted"><?php echo formatDate($var['date']);?></p>
              <p class="small mb-1">Tu</p>
            </div>
            <div class="d-flex flex-row justify-content-end mb-4 pt-1">
              <div>
                <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-warning"><?php echo $var['txt'];?></p>
              </div>
              <?php 
                if($dataSession['url']==""){
                  $url= "./../../storage/upload/icon_avatar.png";
              }else{
                $url=$dataSession['url'];
              }
              ?>
              <img src="<?php echo $url;?>"
                alt="avatar 1" style="width: 45px; height: 100%; border-radius: 35px;">
            </div>
            <?php }} ?>