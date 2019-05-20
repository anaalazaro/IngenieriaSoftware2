function validaMod(){
	var nombre=document.getElementById('nom_residencia');
        //pregunto para confirmar la eliminacion
    if (!nombre.value) {
    	alert("Ingrese nombre a modificar");
    	nombre.focus();
    	return false;
    }
    else{
        if (confirm("¿Desea confirmar la modificarción de la residencia "+ nombre.value +" ?")== true) {
          return true;
        }else {
          return false;
        }
}





}