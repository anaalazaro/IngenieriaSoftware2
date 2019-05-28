function  validarAgregar(){
	var nombre= document.getElementById('nombre');
	var des= document.getElementById('descripcion');
	var direccion= document.getElementById('direccion');
	var provincia= document.getElementById('provincia');
	var pais= document.getElementById('pais');
	var foto= document.getElementById('foto').files;

	if (!nombre.value && !des.value  && !direccion.value && !provincia.value && !pais.value  ) {
		alert ("Debe completar todos los campos");
		return false;
	}
	else{
		return true;
	}
}