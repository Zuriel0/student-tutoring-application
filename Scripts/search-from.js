/*Crea un envento de busqueda para el buscador, se terminara una ves que se tenga la segunda parte  */

function search (){

    
    const search_from = document.getElementById('search-from').value;
    //console.log(search_from);
    //console.log(search_from.length);

    const act = (search_from.length>2) ? document.getElementById(`search-from-pad`).classList.add('active') : document.getElementById(`search-from-pad`).classList.remove('active') ;
    
    
     
  

}