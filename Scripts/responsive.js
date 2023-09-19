/*Calcula el tamañp de la pantalla para determinar si se encuentra en un movil o ordenador  */

let navegador = navigator.userAgent;
        

if (window.innerWidth <= 768) {
    console.log("Es un móvil");
    //document.getElementById(`grupo__header`).classList.remove('head_block');
	document.getElementById(`grupo__header`).classList.add('head_block');
    document.getElementById(`colum__tutors`).classList.remove('row-cols-3');
	document.getElementById(`colum__tutors`).classList.add('row-cols-1');
    }else{
    document.getElementById(`colum__tutors`).classList.remove('row-cols-1');
	document.getElementById(`colum__tutors`).classList.add('row-cols-3');

    }