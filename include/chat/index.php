<!-- Este archivo contiene el cuerpo del chat, donde se aloja el marco y el boton de enviar, los mensajes son insertados entre el div con el id="chat" que son traidos desde el archivo chat.php con ayuda de javaScript haciendo uso de ajax, una herramienta que nos permite cargar ese mismo archivo cada 500 milisegundos, y a su ves manda el mensaje que se ingresa y se manda al archivo send.php. El archivo javaScript se encuentra en ./Scrpts/chat.js-->

<?php include("./../query.php"); ?>


<body onload="ajax();">

<section style="background-color: #eee;" >
  <div class="container py-5">

    <div class="row d-flex justify-content-center">
      <div class="col-9" id="chat__mob">

        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center p-3"
            style="border-top: 4px solid #198754;">
            <h5 class="mb-0">Chat messages </h5>
            <div class="d-flex flex-row align-items-center">
              <!-- <span class="badge bg-warning me-3">20</span> -->
              <i class="fas fa-minus me-3 text-muted fa-xs"></i>
              <i class="fas fa-comments me-3 text-muted fa-xs"></i>
              <i class="fas fa-times text-muted fa-xs"></i>
            </div>
          </div>
          <div class="card-body overflow-auto chat-box" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px" id="chat">


         
            

          </div>
          <form action="#" id="formulario">
          <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
            <div class="input-group mb-0">
              <input type="text" name= "txt"class="form-control" placeholder="Escribe tu mensaje..."
                aria-label="Recipient's username"  autocomplete="off" id="msj"/>
              <button class="btn btn-success" value="<?php echo $id;?>" name="tutor" style="padding-top: .55rem;" id="btn-send-msj">
              <i class="bi bi-send-fill"></i> Enviar</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</section>
<script>
    if (window.innerWidth <= 768) {
        console.log("Es un móvil");
        document.getElementById(`chat__mob`).classList.remove('col-9');
        document.getElementById(`chat__mob`).classList.add('col-12');
    }else{
      document.getElementById(`colum__tutors`).classList.remove('col-12');
      document.getElementById(`colum__tutors`).classList.add('col-9');
    }
</script>
<script src="./../Scripts/chat.js"></script> 
</body>
</html>