function myFunction ( dato ) {
  var jsVar1 = "acp";
  var jsVar2 = "den";
  dato==1? window.location.href = window.location.href + "&f1=" + jsVar1 : window.location.href = window.location.href + "&f2=" + jsVar2;
  //console.log("Esto funciona");
}
function settingOut() {
  document.getElementById(`colPreOut`).classList.remove('col-md-8');
  document.getElementById(`colPreOut`).classList.add('col-md-7');
}

const formularioCal = document.querySelector("#formulario-cal"),
cal = formularioCal.querySelector("#cal"),
recCal = formularioCal.querySelector("#recCal"),
comCal = formularioCal.querySelector("#comCal");
var dif = 'Elige la calificación';


formularioCal.addEventListener('submit', (e) => {
  if (cal.value != dif && recCal.value != dif && comCal.value != dif) {
    var paramentros = {
      'cal': cal.value,
      'recCal' : recCal.value,
      'comCal' : comCal.value
    }
    $.ajax({
      data: paramentros,
      url: './../include/sendDetails.php',
      type: 'POST',
    
      beforesend: function(){
        $('#ID_Mostrar_info').html("Mensaje antes de enviar");
      },
    
      success: function(mensaje_mostrar){
        $('#ID_Mostrar_info').html(mensaje_mostrar);
      }
    });
    
  } else {
    e.preventDefault();
  }
  
  
});

