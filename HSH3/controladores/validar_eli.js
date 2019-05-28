  function eliminarResidencia(){
  	 var nombre=document.getElementById('nom_residencia');
        //pregunto para confirmar la eliminacion
    if (!nombre.value) {
    	alert("Ingrese nombre a eliminar");
    	nombre.focus();
    	return false;
    }
    else{
        if (confirm("¿Desea confirmar la eliminación de la residencia "+ nombre.value +" ?")== true) {
          return true;
        }else {
          return false;
        }
    
    }

   
    

   }