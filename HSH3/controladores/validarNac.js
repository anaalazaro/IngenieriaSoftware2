function aceptar(){
	var nac=document.getElementById('nac');
    if (!nombre.value) {
    	alert("Tiene que ser mayor de edad");
    	nac.focus();
    	return false;
    }
  else{
        return true;    
    }

}