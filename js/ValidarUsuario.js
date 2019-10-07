(function(){

var formulario= document.getElementById("formusuarios");

var Validar=function(e){

if (formulario.user.value==null ||formulario.user.value==0 || /^\a+$/.test(formulario.user.value) ) {
alert("Ingrese el campo Usuario ");
e.preventDefault();
}

if (formulario.user.value.length>20) {
alert(" Campo Usuario excede el limite de longitud ");
e.preventDefault();
}

if (formulario.Nombre.value==null ||formulario.Nombre.value==0 || /^\a+$/.test(formulario.Nombre.value) ) {
alert("Ingrese el campo Nombre  ");
e.preventDefault();
}

if (formulario.Nombre.value.length>30) {
alert(" Campo Nombre excede el limite de longitud ");
e.preventDefault();
}


if (formulario.pass.value==null ||formulario.pass.value==0 || /^\a+$/.test(formulario.pass.value) ) {
alert("Ingrese el campo Password");
e.preventDefault();
}

if (formulario.pass.value.length>30) {
alert(" Campo Password excede el limite de longitud ");
e.preventDefault();
}

if (formulario.pass.value==formulario.cpass.value) {
} else{
	alert("El Password no coincide");
e.preventDefault();
}

if (formulario.prg.selectedIndex==0 || formulario.prg.selectedIndex==null ) {
	alert("Seleccione la Pregunta Secreta");
e.preventDefault();
}

if (formulario.resp.value==null ||formulario.resp.value==0 || /^\a+$/.test(formulario.resp.value) ) {
alert("Ingrese el campo Respuesta");
e.preventDefault();
}

if (formulario.resp.value.length>30) {
alert(" Campo Respuesta excede el limite de longitud ");
e.preventDefault();
}

if (formulario.Nivel.selectedIndex==0 || formulario.Nivel.selectedIndex==null ) {
	alert("Seleccione el Nivel de Usuario");
e.preventDefault();
}


}

formulario.addEventListener("submit",Validar);


}())
