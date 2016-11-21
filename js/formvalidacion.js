
function validacion() {
	
	v_nom = document.getElementById("nombre").value;
	if( v_nom == null || v_nom.length <= 3 || /^\s+$/.test(v_nom) ) {
		document.getElementById("labnom").innerHTML="* Nombre:";
		document.getElementById("labnom").style.color="#ee2424";
		return false;
	} else {
		document.getElementById("labnom").innerHTML="Nombre:";
		document.getElementById("labnom").style.color="#000";
	}

	v_mail = document.getElementById("email").value;
	reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  	if(reg.test(v_mail) == false) {
		document.getElementById("labema").innerHTML="* E-mail:";
		document.getElementById("labema").style.color="#ee2424";
		return false;
	} else {
		document.getElementById("labema").innerHTML="Email:";
		document.getElementById("labema").style.color="#000";
	}
	
	return true;
}





