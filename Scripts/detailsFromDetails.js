function jQuery (param , type) {
  var paramentros
  switch (param ) {
    case 'solFist':
      paramentros = (type != 1)?{"solFist":"2"} : {"solFist":"1"};
      break;
    case 'solDate':
      paramentros = (type != 1)?{"solDate":"2"} : {"solDate":"1"};
      break;
    case 'solConf':
      paramentros = (type != 1)?{"solConf":"2"} : {"solConf":"1"};
      break;
    default:
      paramentros = {"":""};
      break;
  }

  $.ajax({
    data: paramentros,
    url: 'sendDetails.php',
    type: 'POST',

    beforesend: function(){
      $('#ID_Mostrar_info').html("Mensaje antes de enviar");
    },

    success: function(mensaje_mostrar){
      $('#ID_Mostrar_info').html(mensaje_mostrar);
    }
  });
}

