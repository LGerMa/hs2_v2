$(document).ready(function(){
	$("#btnLogin").click(function(){
		var user=document.getElementById("email").value;
		var contra=document.getElementById("pass").value;
		//alert("user: "+user+" - pass: "+contra);
		$.ajax({
			url:'php/verificar_login.php',
			type:'POST',
			data:{
				user:user,
				pass:contra
			},
			beforeSend: function(){
				respAlert("info","Verificando datos...");
			},
			success:function(data){
				console.log(data);
				switch(data[0]){
					case "0":
						respAlert("warning","No existe: "+user);
					break;
					case "1":
						respAlert("warning","Credenciales incorrectas");
					break;
					case "2":
						setTimeout(function(){
							respAlert("success","Correcto...");
							redireccionar("sistema/home.php");
						},1000);
					break;
				}
				//respAlert("success",data[0]);
				/*setTimeout(function(){
					redireccionar("sistema/home.php");	
				},1000);*/
			},
			error:function(data){
				console.log(data);
				respAlert("danger","Error...");
			}
		});
	});

	$("#form_agregarUser").submit(function(event){
		var email = document.getElementById("email").value;
		var pass = document.getElementById("pass").value;
		var confirmarPass = document.getElementById("confirmarPass").value;
		var nombre = document.getElementById("nombre").value;
		var apellido = document.getElementById("apellido").value;
		var unidad = $("#selectUnidad").val();
		var puesto = $("#selectPuesto").val();
		var zona = $("#selectZona").val();
		$.ajax({
			url:'agregar.php',
			type: 'POST',
			data:{
				opc: 1,
				email: email,
				pass: pass,
				nombre: nombre,
				apellido: apellido,
				unidad: unidad,
				puesto: puesto,
				zona: zona
			},
			beforeSend: function(){
				console.log("email: "+email);
				respAlert("info","Agregando un nuevo usuario...");
			},
			success: function(data){
				console.log(data);
				switch(data[0]){
					case "0":
						respAlert("warning","Ya existe el usuario: "+email);
					break;
					case "1":
						respAlert("warning","No se ha podido insertar a la BD");
					break;
					case "2":
						setTimeout(function(){
							respAlert("success","Correcto...redireccionando al inicio");
							redireccionar("home.php");
						},1000);
					break;
				}
			},
			error: function(data){
				console.log(data);
				respAlert("danger","Error...");
			}
		});
		//alert("enviando datooos: selectUnidad: "+unidad);
		event.preventDefault();
	});

	$("#btnModificarPerfil").click(function(){
		rmvAttr("#nombre","disabled");
        addAttr("#btnModificarPerfil","disabled","disabled")
        //$("#btnModificarPerfil").attr("disabled","disabled");
		//$("#nombre").removeAttr("readonly");
        removeClassAtrb(".newPass","hidden");
        removeClassAtrb("#btnGuardarPerfil","hidden");
        removeClassAtrb("#btnCancelarPerfil","hidden");
	});

	$("#form_perfilUsuario").submit(function(event){
		prueba();
		event.preventDefault();
	});
});
function prueba() {
	alert("Click");
}
function respAlert(tipoAlert, mensaje){
	var resp=document.getElementById("respuestaAlert");
	resp.innerHTML="<div class='alert alert-"+tipoAlert+" alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>"+mensaje+"</strong></div>";
}
function redireccionar(pagina){
	location.href=pagina;
}

function rmvAttr(idOb,atributo){
	$(idOb).removeAttr(atributo);
}

function addAttr(idOb,atributo, valor) {
	$(idOb).attr(atributo,valor);
}

function addClassAtrb(idOb,clase){
    $(idOb).addClass(clase);
}

function removeClassAtrb(idOb,clase) {
    $(idOb).removeClass(clase);
}