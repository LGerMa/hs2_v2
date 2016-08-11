use insafocoop;

-- insertar en zona

insert into zona(idZona,tipoZona)
	values
	('1','occidental'),
	('2','oriental'),
	('3','central'),
	('4','paracentral');

select * from zona;

-- insertar en estadoUsuario

insert into estadoUsuario(idEstadoUsuario,estadoUsuario)
	values
	('1','Activo'),
	('2','Permiso Temporal'),
	('3','Despedido');

select * from estadoUsuario;

-- tipoUsuario

insert into tipoUsuario(idTipoUsuario,tipoUsuario)
	values
	('1','admin'),
	('2','usuario');

select * from tipoUsuario;

-- puesto

insert into puesto(idPuesto,puesto)
	values
	('1','Jefe'),
	('2','Asesor'),
	('3','Auditor'),
	('4','Capacitador'),
	('5','Otro');

select * from puesto;

-- unidad

insert into unidad(idUnidad,unidad)
	values
	('1','FOMENTO Y ASISTENCIA TECNICA'),
	('2','VIGILANCIA Y FISCALIZACION'),
	('3','OFICINA REGIONAL'),
	('4','OTRA UNIDAD');

select * from unidad;

-- estado Actividad

insert into estadoActividad(idEstadoActividad, estadoActividad)
	values
	('1','Pendiente'),
	('2','En Desarrollo'),
	('3','Terminado');

select * from estadoActividad;

-- usuario

insert into usuario(correoUsuario,passUsuario,nombreUsuario,apellidoUsuario,
	idTipoUsuario,idUnidad,idPuesto,idZona,idEstadoUsuario,
	fechaRegistroUsuario,fechaModificadoUsuario)
	values
	('admin@insafocoop.gob.sv','admin123','admin','admin','1','4','5','3','1',now(),null);

select * from usuario;