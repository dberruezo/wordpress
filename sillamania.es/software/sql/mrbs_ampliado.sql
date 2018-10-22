use mrbsperiodosbuenos;

/*
CREATE TABLE mrbs_negocio(
	id int NOT NULL auto_increment,
    nombre varchar(128),
    responsable varchar(128),
    email varchar(128),
    telefono varchar(128),
    descripcion varchar (512),
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_repartidor(
	id int NOT NULL auto_increment,
    nombre varchar(128),
    email varchar(128),
    vehiculo varchar(128),
    descripcion varchar (512),
    telefono varchar(128),
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_contactar(
	id int NOT NULL auto_increment,
    nombre varchar(128),
    email varchar(128),
    telefono varchar(128),
    website varchar(128),
    descripcion varchar (512),
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_periodos_fechas_dias(
	id int NOT NULL auto_increment,
    id_mrbs_periodos_fechas int,
    start_fecha int(11),
    end_fecha int(11),
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_periodos_fechas(
	id int NOT NULL auto_increment,
    fecha timestamp,
    start_fecha int,
    end_fecha int,
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_periodos_horas_motoristas(
	id int NOT NULL auto_increment,
    id_periodos_fecha int,
    hora time,
    motoristas int,
    motorista_actual int(11)
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

*/

/*
SELECT pfechas.id,pfechas.id_area, pfechas.fecha, pfechas.start_fecha, pfechas.end_fecha,
pfechasdias.id as id_dias, pfechasdias.id_mrbs_periodos_fechas, pfechasdias.start_fecha as start_fecha_dias,pfechasdias.end_fecha as end_fecha_dias,
pfechasmotoristas.id as id_motorista,pfechasmotoristas.id_periodos_fecha,pfechasmotoristas.hora,pfechasmotoristas.motoristas,pfechasmotoristas.motorista_actual
FROM mrbs_periodos_fechas as pfechas
LEFT JOIN mrbs_periodos_fechas_dias as pfechasdias
ON pfechasdias.id_mrbs_periodos_fechas = pfechas.id
LEFT JOIN mrbs_periodos_horas_motoristas as pfechasmotoristas
ON pfechasmotoristas.id_periodos_fecha = pfechasdias.id
WHERE pfechas.start_fecha < $fin
AND pfechas.end_fecha > $inicio
AND pfechas.id_area=$area
*/


#drop database mrbsperiodos;
#CREATE DATABASE hoteldruid CHARACTER SET utf8 COLLATE utf8_general_ci;

#use mrbsperiodosbuenos;	

# Consulta sql para saber todos los horarios
# del dia de hoy
/*
SELECT area.id as areaid,areahorario.id,areahorario.fecha as fechahorario,areahorario.start_fecha,areahorario.end_fecha,areahorarioperiodos.fecha
FROM mrbs_area_horario as areahorario
LEFT JOIN mrbs_area_horario_periodos as areahorarioperiodos 
ON areahorarioperiodos.id_horario = areahorario.id
LEFT JOIN mrbs_area as area 
ON area.id = areahorario.id_area 
WHERE area.id = 1
AND areahorario.start_fecha <= "2017-1-5"
AND areahorario.end_fecha >= "2017-1-5";

# Consulta detección de errores para saber si 
# hay conflicto de fechas con los horarios

SELECT area.id as areaid,areahorario.id,areahorario.fecha as fechahorario,areahorario.start_fecha,areahorario.end_fecha,areahorarioperiodos.fecha
FROM mrbs_area_horario as areahorario
LEFT JOIN mrbs_area_horario_periodos as areahorarioperiodos 
ON areahorarioperiodos.id_horario = areahorario.id
LEFT JOIN mrbs_area as area 
ON area.id = areahorario.id_area 
WHERE area.id = 1
AND areahorario.start_fecha < "2017-01-08"
AND areahorario.end_fecha > "2017-01-02";
*/

# Consulta sql de todos los repartidores
# del dia de hoy
/*
SELECT area.id as areaid,room.room_name,roomfechas.start_fecha,roomfechas.end_fecha
FROM mrbs_area as area
LEFT JOIN mrbs_room as room 
ON room.area_id = area.id
LEFT JOIN mrbs_room_fechas as roomfechas 
ON roomfechas.id_room = room.id
WHERE area.id = 1
AND room.id = 1
AND roomfechas.start_fecha <= "2017-1-5"
AND roomfechas.end_fecha >= "2017-1-5";

# Consulta detección de errores para saber si 
# hay conflicto de fechas entre los repartidores
SELECT area.id as areaid,room.room_name,roomfechas.start_fecha,roomfechas.end_fecha
FROM mrbs_area as area
LEFT JOIN mrbs_room as room 
ON room.area_id = area.id
LEFT JOIN mrbs_room_fechas as roomfechas 
ON roomfechas.id_room = room.id
WHERE area.id = 1
AND room.id = 1
AND roomfechas.start_fecha < "2017-1-4"
AND roomfechas.end_fecha > "2017-1-2";
*/

# Ver los usuarios repartidores cuando se loginan con el mismo nombre 
# que las rooms (repartidores) que significa la unión entre el usuario(tabla user)
# y la tabla room .
/*
SELECT room.id as roomid,room.room_name,room.area_id,users.name,users.level,users.email,area.area_name
FROM mrbs_room as room
LEFT JOIN mrbs_users as users 
ON room.room_name = users.name
LEFT JOIN mrbs_area as area 
ON area.id = room.area_id
WHERE room.room_name = "repartidor1";


# Consulta para contar el numero de repartidores 
# con fecha dado de alta que van a aparecer en el mapa
SELECT COUNT(*)
FROM mrbs_room as R 
LEFT JOIN mrbs_area as A 
ON A.id = R.area_id
LEFT JOIN mrbs_room_fechas as roomfechas 
ON roomfechas.id_room = R.id
WHERE R.area_id=1
AND R.area_id = A.id
AND R.disabled = 0
AND A.disabled = 0
AND roomfechas.start_fecha <= "2017-1-7"
AND roomfechas.end_fecha >= "2017-1-7"


#DISTINCT(R.room_name),
#GROUP BY R.room_name;


SELECT DISTINCT R.room_name, R.capacity, R.id, R.description
FROM mrbs_room as R
LEFT JOIN mrbs_room_fechas as roomfechas 
ON roomfechas.id_room = R.id
LEFT JOIN mrbs_area as A 
ON A.id = R.area_id
WHERE R.area_id= 1
AND R.area_id = A.id
AND R.disabled = 0
AND A.disabled = 0
AND A.id = 1
AND roomfechas.start_fecha <= "2017-1-7"
AND roomfechas.end_fecha >= "2017-1-7";
*/

# Consulta para ver todas la habitacion dada de alta con el dia 
# actual con el mismo nombre que el usuario
/*
SELECT Distinct count(*) ,room.id as roomid,room.room_name,room.area_id,users.name,users.level,users.email,area.area_name
FROM mrbs_room as room
LEFT JOIN mrbs_users as users 
ON room.room_name = users.name
LEFT JOIN mrbs_area as area 
ON area.id = room.area_id
LEFT JOIN mrbs_room_fechas as roomfechas 
ON roomfechas.id_room = room.id
WHERE room.room_name = "repartidor1"
AND room.area_id= 1
AND room.disabled = 0
AND area.disabled = 0
AND area.id = 1
AND roomfechas.start_fecha <= "2017-1-7"
AND roomfechas.end_fecha >= "2017-1-7";
*/

/*
SELECT COUNT(*)
FROM $tbl_room R, $tbl_area A
WHERE R.area_id=$area
AND R.area_id = A.id
AND R.disabled = 0
AND A.disabled = 0
*/

/*
CREATE TABLE mrbs_area_horario(
	id int NOT NULL auto_increment,
    fecha timestamp,
    id_area int,
	disabled int,
    start_fecha datetime,
    end_fecha datetime,
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_area_horario_periodos(
	id int NOT NULL auto_increment,
    id_horario int,
    fecha time,
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_room_fechas(
	id int NOT NULL auto_increment,
    id_room int,
    fecha timestamp,
    start_fecha datetime,
    end_fecha datetime,
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/

/*
use mrbsperiodosbuenos;

# Periodos buenos

*/

/*
*/

#use mrbsperiodosbuenos;
#drop table mrbs_periodos_fechas;

# Conflicto de horas
/*
SELECT pfechas.id, pfechas.fecha, pfechas.start_fecha, pfechas.end_fecha
FROM mrbs_periodos_fechas as pfechas
LEFT JOIN mrbs_periodos_horas_motoristas as pfechasmotoristas
ON pfechasmotoristas.id_periodos_fecha = pfechas.id
WHERE pfechas.start_fecha < '2017-01-14 00:00:00'
AND pfechas.end_fecha > '2017-01-11 00:00:00';
*/

# Saber el dia exacto
/*
SELECT pfechas.id, pfechas.fecha, pfechas.start_fecha, pfechas.end_fecha
FROM mrbs_periodos_fechas as pfechas
LEFT JOIN mrbs_periodos_horas_motoristas as pfechasmotoristas
ON pfechasmotoristas.id_periodos_fecha = pfechas.id
WHERE pfechas.start_fecha <= '2017-01-10 00:00:00'
AND pfechas.end_fecha > '2017-01-11 00:00:00';
*/


