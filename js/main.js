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
		rmvAttr("#apellido","disabled");
		rmvAttr("#selectUnidad","disabled");
		rmvAttr("#selectTipoUsuario","disabled");
		rmvAttr("#selectZona","disabled");
		rmvAttr("#selectPuesto","disabled");
		rmvAttr("#selectEstadoUsuario","disabled");
        addAttr("#btnModificarPerfil","disabled","disabled")
        //removeClassAtrb(".newPass","hidden");
        removeClassAtrb("#btnGuardarPerfil","hidden");
        removeClassAtrb("#btnCancelarPerfil","hidden");
        removeClassAtrb(".checkOculto","hidden");
	});

	$("#chkCambiarPassPerfil").click(function(){
		if(document.getElementById("chkCambiarPassPerfil").checked){
			removeClassAtrb(".newPass","hidden");
			addAttr("#newPass","required","required");
			addAttr("#confirmarPass","required","required");
		}else{
			addClassAtrb(".newPass","hidden");
			rmvAttr("#newPass","required");
			rmvAttr("#confirmarPass","required");
		}
	});
	$("#btnModificarPerfilCooper").click(function(){
		rmvAttr("#nombreCoop","disabled");
		rmvAttr("#contactoCoop","disabled");
		rmvAttr("#emailContactoCoop","disabled");
		rmvAttr("#telefonoCoop","disabled");
		rmvAttr("#direccionCoop","disabled");
		rmvAttr("#abreviaturaCoop","disabled");
		removeClassAtrb("#btnGuardarPerfilCooper","hidden");
        removeClassAtrb("#btnCancelarPerfilCooper","hidden");
        removeClassAtrb(".checkOculto","hidden");
	});
	$("#form_perfilCooperativa").submit(function(event){
		var codigoCoop = $("#codigoCoop").val();
		var pass = $("#pass").val();
		var newPass = $("#newPass").val();
		var confirmarPass = $("#confirmarPass").val();
		var nombreCoop = $("#nombreCoop").val();
		var abreviaturaCoop = $("#abreviaturaCoop").val();
		var contactoCoop = $("#contactoCoop").val();
		var emailContactoCoop = $("#emailContactoCoop").val();
		var telefonoCoop = $("#telefonoCoop").val();
		var direccionCoop = $("#direccionCoop").val();
		var check1 = $("#chkCambiarPassPerfil").prop("checked");
		var flag = true;
		if(check1){
			flag = false;
			if(newPass==confirmarPass){
				pass = newPass;
				flag = true;
			}else{
				respAlert("warning","No coinciden las contrase&ntilde;as");
				flag = false;
			}
		}
		if(flag){
			$.ajax({
				url: 'actualizar.php',
				type: 'POST',
				data:{
					opc:2,
					codigoCoop:codigoCoop,
					pass:pass,
					nombreCoop:nombreCoop,
					abreviaturaCoop:abreviaturaCoop,
					contactoCoop:contactoCoop,
					emailContactoCoop:emailContactoCoop,
					telefonoCoop:telefonoCoop,
					direccionCoop:direccionCoop
				},
				beforeSend:function(){
					console.log("codigoCoop: "+codigoCoop);
					respAlert("info","Actualizando informaci&oacute;n...");
				},
				success:function(data){
					console.log(data);
					//respAlert("info","prueba");
					switch(data[0]){
						case "0":
							respAlert("warning","No se ha podido actualizar la informacion de la cooperativa: "+codigoCoop);
						break;
						case "1":
							setTimeout(function(){
								respAlert("success","Correcto...redireccionando al inicio");
								redireccionar("perfil_cooperativa.php?codCooper="+codigoCoop);
							},1000);
						break;
					}
				},
				error:function(data){
					console.log(data);
					respAlert("danger","Error...");
				}
			});
		}
		event.preventDefault();
	});
	$("#form_perfilUsuario").submit(function(event){
		var email = document.getElementById("email").value;
		var pass = document.getElementById("pass").value;
		var newPass = document.getElementById("newPass").value;
		var confirmarPass = document.getElementById("confirmarPass").value;
		var nombre = document.getElementById("nombre").value;
		var apellido = document.getElementById("apellido").value;
		var tipoUsuario = $("#selectTipoUsuario").val();
		var unidad = $("#selectUnidad").val();
		var puesto = $("#selectPuesto").val();
		var zona = $("#selectZona").val();
		var check1 = document.getElementById("chkCambiarPassPerfil").checked;
		var flag = true;
		if(check1){ //habra pass nuevo
			flag = false;
			if(newPass==confirmarPass){
				//alert("son iguales");
				pass = newPass;
				flag = true;
			}else{
				//alert("no son iguales");
				respAlert("warning","No coinciden las contrase&ntilde;as");
				flag = false;
			}
		}

		if (flag) {
			$.ajax({
				url:'actualizar.php',
				type: 'POST',
				data:{
					opc: 1,
					email: email,
					pass: pass,
					nombre: nombre,
					apellido: apellido,
					tipoUsuario: tipoUsuario,
					unidad: unidad,
					puesto: puesto,
					zona: zona
				},
				beforeSend: function(){
					console.log("email: "+email);
					respAlert("info","Actualizando informaci&oacute;n...");
				},
				success: function(data){
					console.log(data);
					//respAlert("info","prueba");
					switch(data[0]){
						case "0":
							respAlert("warning","No se ha podido actualizar la informacion del usuario: "+email);
						break;
						case "1":
							setTimeout(function(){
								respAlert("success","Correcto...redireccionando al inicio");
								redireccionar("perfil_usuario.php?email="+email);
							},1000);
						break;
					}
				},
				error: function(data){
					console.log(data);
					respAlert("danger","Error...");
				}
			});			
			//alert("guardar!");
		}else{
			//alert("no guardar");
		}
		event.preventDefault();
	});




//Modificar Actividad



$("#form_actualizarActividad").submit(function(event){
		var actividadProgramada = document.getElementById("actProgramada").value;
		var codCooperativa = $("#selectCoop").val();
		var idEstadoActividad= 1;
		var codSemanal = document.getElementById("CodigoSemanal").value;
		var diaSemana = $("#diaSemana").val();
		var HoraIni = document.getElementById("HoraIni").value;
		var HoraFin = document.getElementById("HoraFin").value;
		var idActividad =document.getElementById("idAct").value;	
		var flag = true;

		if(HoraIni<HoraFin){
			var flag = true;
		}else{
				//alert("no son iguales");
				respAlert("warning","La Hora Inicial es Mayor");
				flag = false;
		}
		if (flag) {
			$.ajax({
				url:'actualizar.php',
				type: 'POST',
				data:{
					opc: 3,
					idActividad: idActividad,
					actividadProgramada: actividadProgramada,
					codCooperativa: codCooperativa,
					idEstadoActividad: idEstadoActividad,
					codSemanal: codSemanal,
					diaSemana: diaSemana,
					HoraIni: HoraIni,
					HoraFin: HoraFin
				},
				beforeSend: function(){
					respAlert("info","Actualizando informaci&oacute;n...");
				},
				success: function(data){
					console.log(data);
					//respAlert("info","prueba");
					switch(data[0]){
						case "0":
							respAlert("warning","No se ha podido actualizar la informacion de la actividad: ");
						break;
						case "1":
							setTimeout(function(){
								respAlert("success","Correcto...redireccionando al inicio");
								redireccionar("perfil_semanal.php?actividad="+idActividad);
							},1000);
						break;
					}
				},
				error: function(data){
					console.log(data);
					respAlert("danger","Error...");
				}
			});			
			//alert("guardar!");
		}else{
			//alert("no guardar");
		}

		event.preventDefault();
	});























	$("#btnRegistrarActividad").click(function(){
		var codSemanal = $("#CodigoSemanal").val();
		var actividadProgramada = document.getElementById("actProgramada").value;
		//alert(actividadProgramada);
		var codCooperativa = $("#selectCoop").val();
		var idEstadoActividad= 1;
		var codSemanal = document.getElementById("CodigoSemanal").value;
		var diaSemana = $("#diaSemana").val();
		var HoraIni = document.getElementById("HoraIni").value;
		var HoraFin = document.getElementById("HoraFin").value;
		//numero de semana Ini
		var diaProyectado = document.getElementById("semanalN").value;
		//fin
		var flag = true;

		if(HoraIni<HoraFin){
			var flag = true;
		}else{
				//alert("no son iguales");
				respAlert("warning","La Hora Inicial es Mayor");
				flag = false;
		}
		if (flag) {
			$.ajax({
				url:'agregar.php',
				type: 'POST',
				data:{
					opc:4,
					actividadProgramada: actividadProgramada,
					codCooperativa: codCooperativa,
					idEstadoActividad: idEstadoActividad,
					codSemanal: codSemanal,
					diaSemana: diaSemana,
					HoraIni: HoraIni,
					HoraFin: HoraFin
				},
			success: function(data){
				console.log(data);
				switch(data[0]){
					case "0":
						respAlert("warning","Ya existe la actividad");
					break;
					case "1":
						respAlert("warning","No se ha podido insertar a la BD");
					break;
					case "2":
						setTimeout(function(){
							respAlert("success","Correcto...redireccionando");
							redireccionar("semanal.php?semanalN="+diaProyectado);
						},1000);
					break;
				}
			},
			error: function(data){
				console.log(data);
				respAlert("danger","Error...");
			}
			});			
			//alert("guardar!");
		}else{
			//alert("no guardar");
		}
	});






































	$("#form_agregarCooper").submit(function(event){
		var codigoCoop = $("#codigoCoop").val();
		var nombreCoop = $("#nombreCoop").val();
		var abreviaturaCoop = $("#abreviaturaCoop").val();
		var direccionCoop = $("#direccionCoop").val();
		var contactoCoop = $("#contactoCoop").val();
		var emailContactoCoop = $("#emailContactoCoop").val();
		var telefonoCoop = $("#telefonoCoop").val();
		if(emailContactoCoop==""){
			emailContactoCoop = "null";
		}
		console.log(emailContactoCoop);
		$.ajax({
			url: 'agregar.php',
			type: "POST",
			data:{
				opc:2,
				codigoCoop:codigoCoop,
				nombreCoop:nombreCoop,
				abreviaturaCoop:abreviaturaCoop,
				direccionCoop:direccionCoop,
				contactoCoop:contactoCoop,
				emailContactoCoop:emailContactoCoop,
				telefonoCoop:telefonoCoop
			},
			beforeSend:function(){
				console.log("codigoCoop: "+codigoCoop);
				respAlert("info","Agregando una nueva cooperativa...");
			}, 
			success: function(data){
				console.log(data);
				switch(data[0]){
					case "0":
						respAlert("warning","Ya existe la cooperativa: "+codigoCoop);
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
		event.preventDefault();
	});

	/*$("#btnAgregarProyectado").click(function(){
		prueba();
	});*/
});
function prueba() {
	alert("Click");
}






function insertarSemanal(codSemanal,semana,correo,registroSemanal){
	//alert("codSemanal: "+codSemanal+" - semana: "+semana+" - correo: "+correo+" - registroSemanal: "+registroSemanal);
	$.ajax({
			url: 'agregar.php',
			type: "POST",
			data:{
				opc:3,
				codSemanal:codSemanal,
				correoUsuario:correo,
				registroSemanal:registroSemanal,
				semana:semana
			},
			beforeSend:function(){
				console.log("codSemanal: "+codSemanal);
				respAlert("info","Agregando proyectado...");
			}, 
			success: function(data){
				console.log(data);
				switch(data[0]){
					case "0":
						respAlert("warning","Ya existe el proyectado: "+codSemanal);
					break;
					case "1":
						respAlert("warning","No se ha podia la BD");
					break;
					case "2":
						setTimeout(function(){
							respAlert("success","Correcto...redireccionando");
							redireccionar("semanal.php");
						},1000);
					break;
				}
			},
			error: function(data){
				console.log(data);
				respAlert("danger","Error...");
			}
		});
}
function respAlert(tipoAlert, mensaje){
	var resp=document.getElementById("respuestaAlert");
	resp.innerHTML="<div class='alert alert-"+tipoAlert+" alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>"+mensaje+"</strong></div>";
}
function redireccionar(pagina){
	location.href=pagina;
}

function recargarPagina(pagina){
	window.location.reload(pagina);
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