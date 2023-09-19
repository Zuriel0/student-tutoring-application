/*Este archivo se carga al inciar el index.php del chat mandando la info de chat.php cada 500 milisegundos y tambien se encarga de capturar la informacion ingresada en el input del formulario para posteriormente ser enviado a send.php para su insercion en la DB.   */

function ajax() {
    var req = new XMLHttpRequest();
    req.onreadystatechange = function (){
      if (req.readyState == 4 && req.status == 200) {
        document.getElementById('chat').innerHTML = req.responseText;
      }
    }
      req.open('GET', './../include/chat/chat.php', true);
      req.send(); 
  }

setInterval(function(){ajax();},1000);

function scrollDown(){
    document.getElementById('chat').scrollTop=5000;}

 setTimeout(scrollDown(),500);



 const form = document.querySelector("#formulario"),
 //incoming_id = form.querySelector("#msj").value,
 inputField = form.querySelector("#msj"),
 sendBtn = form.querySelector("#btn-send-msj"),
 chatBox = document.querySelector(".chat-box");
 
 
 form.onsubmit = (e)=>{
    e.preventDefault();
}

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./../include/chat/send.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
              scrollDown();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
    setTimeout(
        function(){
        document.getElementById('chat').scrollTop=5000;},800);
}

