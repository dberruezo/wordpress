#drop database mrbsperiodos;
#CREATE DATABASE mrbsperiodos CHARACTER SET utf8 COLLATE utf8_general_ci;

# use mrbsperiodos;

#
# MySQL MRBS table creation script
#
# $Id: tables.my.sql 2211 2011-12-24 09:27:00Z cimorrison $
#
# Notes:
# (1) If you have decided to change the prefix of your tables from 'mrbs_'
#     to something else using $db_tbl_prefix then you must edit each
#     'CREATE TABLE' and 'INSERT INTO' line below to replace 'mrbs_' with
#     your new table prefix.
#
# (2) If you change the varchar lengths here, then you should check
#     to see whether a corresponding length has been defined in the config file
#     in the array $maxlength.
#
# (3) If you add new fields then you should also change the global variable
#     $standard_fields.   Note that if you are just adding custom fields for
#     a single site then this is not necessary.

CREATE TABLE mrbs_area
(
  id                        int NOT NULL auto_increment,
  disabled                  tinyint(1) DEFAULT 0 NOT NULL,
  area_name                 varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci,
  timezone                  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci,
  area_admin_email          text CHARACTER SET utf8 COLLATE utf8_general_ci,
  resolution                int,
  default_duration          int,
  default_duration_all_day  tinyint(1) DEFAULT 0 NOT NULL,
  morningstarts             int,
  morningstarts_minutes     int,
  eveningends               int,
  eveningends_minutes       int,
  private_enabled           tinyint(1),
  private_default           tinyint(1),
  private_mandatory         tinyint(1),
  private_override          varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci,
  min_book_ahead_enabled    tinyint(1),
  min_book_ahead_secs       int,
  max_book_ahead_enabled    tinyint(1),
  max_book_ahead_secs       int,
  custom_html               text CHARACTER SET utf8 COLLATE utf8_general_ci,
  approval_enabled          tinyint(1),
  reminders_enabled         tinyint(1),
  enable_periods            tinyint(1),
  confirmation_enabled      tinyint(1),
  confirmed_default         tinyint(1),

  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_room
(
  id               int NOT NULL auto_increment,
  disabled         tinyint(1) DEFAULT 0 NOT NULL,
  area_id          int DEFAULT '0' NOT NULL,
  room_name        varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  sort_key         varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  description      varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci,
  capacity         int DEFAULT '0' NOT NULL,
  room_admin_email text CHARACTER SET utf8 COLLATE utf8_general_ci,
  custom_html      text CHARACTER SET utf8 COLLATE utf8_general_ci,

  PRIMARY KEY (id),
  KEY idxSortKey (sort_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_entry
(
  id             int NOT NULL auto_increment,
  start_time     int DEFAULT '0' NOT NULL,
  end_time       int DEFAULT '0' NOT NULL,
  entry_type     int DEFAULT '0' NOT NULL,
  repeat_id      int DEFAULT '0' NOT NULL,
  room_id        int DEFAULT '1' NOT NULL,
  timestamp      timestamp,
  create_by      varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  name           varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  type           char DEFAULT 'E' NOT NULL,
  description    text CHARACTER SET utf8 COLLATE utf8_general_ci,
  status         tinyint unsigned NOT NULL DEFAULT 0,
  reminded       int,
  info_time      int,
  info_user      varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci,
  info_text      text CHARACTER SET utf8 COLLATE utf8_general_ci,
  ical_uid       varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  ical_sequence  smallint DEFAULT 0 NOT NULL,
  ical_recur_id  varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,

  PRIMARY KEY (id),
  KEY idxStartTime (start_time),
  KEY idxEndTime   (end_time)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_repeat
(
  id             int NOT NULL auto_increment,
  start_time     int DEFAULT '0' NOT NULL,
  end_time       int DEFAULT '0' NOT NULL,
  rep_type       int DEFAULT '0' NOT NULL,
  end_date       int DEFAULT '0' NOT NULL,
  rep_opt        varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  room_id        int DEFAULT '1' NOT NULL,
  timestamp      timestamp,
  create_by      varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  name           varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  type           char DEFAULT 'E' NOT NULL,
  description    text CHARACTER SET utf8 COLLATE utf8_general_ci,
  rep_num_weeks  smallint NULL, 
  status         tinyint unsigned NOT NULL DEFAULT 0,
  reminded       int,
  info_time      int,
  info_user      varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci,
  info_text      text CHARACTER SET utf8 COLLATE utf8_general_ci,
  ical_uid       varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  ical_sequence  smallint DEFAULT 0 NOT NULL,
  
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_variables
(
  id               int NOT NULL auto_increment,
  variable_name    varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci,
  variable_content text CHARACTER SET utf8 COLLATE utf8_general_ci,
      
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_zoneinfo
(
  id                 int NOT NULL auto_increment,
  timezone           varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  outlook_compatible tinyint unsigned NOT NULL DEFAULT 0,
  vtimezone          text CHARACTER SET utf8 COLLATE utf8_general_ci,
  last_updated       int NOT NULL DEFAULT 0,
      
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_users
(
  /* The first four fields are required. Don't remove. */
  id        int NOT NULL auto_increment,
  level     smallint DEFAULT '0' NOT NULL,  /* play safe and give no rights */
  name      varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci,
  password  varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci,
  email     varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci,

  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO mrbs_variables (variable_name, variable_content)
  VALUES ( 'db_version', '29');
INSERT INTO mrbs_variables (variable_name, variable_content)
  VALUES ( 'local_db_version', '1');



#CREATE DATABASE mrbsperiodos CHARACTER SET utf8 COLLATE utf8_general_ci;
#use mrbsperiodos;

#
# MySQL MRBS table creation script
#
# $Id$
#
# Notes:
# (1) If you have decided to change the prefix of your tables from 'mrbs_'
#     to something else using $db_tbl_prefix then you must edit each
#     'CREATE TABLE' and 'INSERT INTO' line below to replace 'mrbs_' with
#     your new table prefix.
#
# (2) If you add new fields then you should also change the global variable
#     $standard_fields.   Note that if you are just adding custom fields for
#     a single site then this is not necessary.

/*
CREATE TABLE mrbs_area
(
  id                        int NOT NULL auto_increment,
  disabled                  tinyint(1) DEFAULT 0 NOT NULL,
  area_name                 varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci,
  timezone                  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci,
  area_admin_email          text CHARACTER SET utf8 COLLATE utf8_general_ci,
  resolution                int,
  default_duration          int,
  default_duration_all_day  tinyint(1) DEFAULT 0 NOT NULL,
  morningstarts             int,
  morningstarts_minutes     int,
  eveningends               int,
  eveningends_minutes       int,
  private_enabled           tinyint(1),
  private_default           tinyint(1),
  private_mandatory         tinyint(1),
  private_override          varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci,
  min_create_ahead_enabled  tinyint(1),
  min_create_ahead_secs     int,
  max_create_ahead_enabled  tinyint(1),
  max_create_ahead_secs     int,
  min_delete_ahead_enabled  tinyint(1),
  min_delete_ahead_secs     int,
  max_delete_ahead_enabled  tinyint(1),
  max_delete_ahead_secs     int,
  max_per_day_enabled       tinyint(1) DEFAULT 0 NOT NULL,
  max_per_day               int DEFAULT 0 NOT NULL,
  max_per_week_enabled      tinyint(1) DEFAULT 0 NOT NULL,
  max_per_week              int DEFAULT 0 NOT NULL,
  max_per_month_enabled     tinyint(1) DEFAULT 0 NOT NULL,
  max_per_month             int DEFAULT 0 NOT NULL,
  max_per_year_enabled      tinyint(1) DEFAULT 0 NOT NULL,
  max_per_year              int DEFAULT 0 NOT NULL,
  max_per_future_enabled    tinyint(1) DEFAULT 0 NOT NULL,
  max_per_future            int DEFAULT 0 NOT NULL,
  max_duration_enabled      tinyint(1) DEFAULT 0 NOT NULL,
  max_duration_secs         int DEFAULT 0 NOT NULL,
  max_duration_periods      int DEFAULT 0 NOT NULL,
  custom_html               text CHARACTER SET utf8 COLLATE utf8_general_ci,
  approval_enabled          tinyint(1),
  reminders_enabled         tinyint(1),
  enable_periods            tinyint(1),
  confirmation_enabled      tinyint(1),
  confirmed_default         tinyint(1),

  PRIMARY KEY (id),
  UNIQUE KEY uq_area_name (area_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_room
(
  id               int NOT NULL auto_increment,
  disabled         tinyint(1) DEFAULT 0 NOT NULL,
  area_id          int DEFAULT '0' NOT NULL,
  room_name        varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  sort_key         varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  description      varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci,
  capacity         int DEFAULT '0' NOT NULL,
  room_admin_email text CHARACTER SET utf8 COLLATE utf8_general_ci,
  custom_html      text CHARACTER SET utf8 COLLATE utf8_general_ci,

  PRIMARY KEY (id),
  FOREIGN KEY (area_id) 
    REFERENCES mrbs_area(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
  UNIQUE KEY uq_room_name (area_id, room_name),
  KEY idxSortKey (sort_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_repeat
(
  id             int NOT NULL auto_increment,
  start_time     int DEFAULT '0' NOT NULL,
  end_time       int DEFAULT '0' NOT NULL,
  rep_type       int DEFAULT '0' NOT NULL,
  end_date       int DEFAULT '0' NOT NULL,
  rep_opt        varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  room_id        int DEFAULT '1' NOT NULL,
  timestamp      timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  create_by      varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  modified_by    varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  name           varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  type           char DEFAULT 'E' NOT NULL,
  description    text CHARACTER SET utf8 COLLATE utf8_general_ci,
  rep_num_weeks  smallint NULL,
  month_absolute smallint DEFAULT NULL,
  month_relative varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  status         tinyint unsigned NOT NULL DEFAULT 0,
  reminded       int,
  info_time      int,
  info_user      varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci,
  info_text      text CHARACTER SET utf8 COLLATE utf8_general_ci,
  ical_uid       varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  ical_sequence  smallint DEFAULT 0 NOT NULL,
  
  PRIMARY KEY (id),
  FOREIGN KEY (room_id) 
    REFERENCES mrbs_room(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_entry
(
  id             int NOT NULL auto_increment,
  start_time     int DEFAULT '0' NOT NULL,
  end_time       int DEFAULT '0' NOT NULL,
  entry_type     int DEFAULT '0' NOT NULL,
  repeat_id      int DEFAULT NULL,
  room_id        int DEFAULT '1' NOT NULL,
  timestamp      timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  create_by      varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  modified_by    varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  name           varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  type           char DEFAULT 'E' NOT NULL,
  description    text CHARACTER SET utf8 COLLATE utf8_general_ci,
  status         tinyint unsigned NOT NULL DEFAULT 0,
  reminded       int,
  info_time      int,
  info_user      varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci,
  info_text      text CHARACTER SET utf8 COLLATE utf8_general_ci,
  ical_uid       varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  ical_sequence  smallint DEFAULT 0 NOT NULL,
  ical_recur_id  varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,

  PRIMARY KEY (id),
  FOREIGN KEY (room_id) 
    REFERENCES mrbs_room(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
  FOREIGN KEY (repeat_id) 
    REFERENCES mrbs_repeat(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
  KEY idxStartTime (start_time),
  KEY idxEndTime   (end_time)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_variables
(
  id               int NOT NULL auto_increment,
  variable_name    varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci,
  variable_content text CHARACTER SET utf8 COLLATE utf8_general_ci,
      
  PRIMARY KEY (id),
  UNIQUE KEY uq_variable_name (variable_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_zoneinfo
(
  id                 int NOT NULL auto_increment,
  timezone           varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  outlook_compatible tinyint unsigned NOT NULL DEFAULT 0,
  vtimezone          text CHARACTER SET utf8 COLLATE utf8_general_ci,
  last_updated       int NOT NULL DEFAULT 0,
      
  PRIMARY KEY (id),
  UNIQUE KEY uq_timezone (timezone, outlook_compatible)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_users
(
  id        int NOT NULL auto_increment,
  level     smallint DEFAULT '0' NOT NULL,  
  name      varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci,
  password_hash  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci,
  email     varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci,

  PRIMARY KEY (id),
  UNIQUE KEY uq_name (name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO mrbs_variables (variable_name, variable_content)
  VALUES ( 'db_version', '47');
INSERT INTO mrbs_variables (variable_name, variable_content)
  VALUES ( 'local_db_version', '1');

*/

/*
 * Alter and drop varias
 */
/*
ALTER TABLE mrbs_area_horario ADD disabled int;
ALTER TABLE mrbs_room drop column fecha;
drop table mrbs_horario;
drop table mrbs_horario_periodos;
ALTER TABLE mrbs_room_fechas ADD start_fecha timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE mrbs_room_fechas ADD end_fecha timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE contacts ADD email VARCHAR(60);
ALTER TABLE mrbs_room_fechas ADD ;
GROUP BY areahorario.fecha
ALTER TABLE mrbs_area_horario ADD id_area int;
AND date(areahorario.fecha) >= date(now())
ORDER BY areahorario.fecha DESC;
ALTER TABLE mrbs_horario_periodos ADD id_horario int;
ALTER TABLE mrbs_room_fechas drop column start_fecha;
ALTER TABLE mrbs_room_fechas drop column end_fecha;
ALTER TABLE mrbs_area_horario ADD start_fecha datetime NOT NULL;
ALTER TABLE mrbs_area_horario ADD end_fecha datetime NOT NULL;
*/


/*
 * Consultas
 */

# SELECT * FROM mrbs_area_horario_periodos as periodos WHERE periodos.id_horario=3


# Otra consulta
/*
SELECT area.id as areaid,areahorario.fecha as fechahorario,areahorario.start_fecha,areahorario.end_fecha
FROM mrbs_area_horario as areahorario
LEFT JOIN mrbs_area as area 
ON area.id = areahorario.id_area 
WHERE area.id = 1;

# Consulta peridos areas

SELECT area.id as areaid,areahorario.fecha as fechahorario,areahorario.start_fecha,areahorario.end_fecha,areahorarioperiodos.fecha
FROM mrbs_area_horario as areahorario
LEFT JOIN mrbs_area_horario_periodos as areahorarioperiodos 
ON areahorarioperiodos.id_horario = areahorario.id
LEFT JOIN mrbs_area as area 
ON area.id = areahorario.id_area 
WHERE area.id = 1;

SELECT R.room_name, R.capacity, R.id, R.description,fechas.fecha,fechas.start_fecha,fechas.end_fecha
FROM mrbs_room as R
LEFT JOIN mrbs_area as A 
ON A.id = R.area_id
LEFT JOIN mrbs_room_fechas as fechas 
ON fechas.idroom = R.id 
WHERE R.area_id  = 1 
AND R.disabled = 0
AND A.disabled = 0
AND R.id=1
AND fechas.end_fecha > '2016-12-26'
ORDER BY sort_key;
*/


/*
SELECT area.id as areaid,areahorario.fecha as fechahorario,areahorarioperiodos.fecha
FROM mrbs_area_horario as areahorario
LEFT JOIN mrbs_area_horario_periodos as areahorarioperiodos 
ON areahorarioperiodos.id_horario = areahorario.id
LEFT JOIN mrbs_area as area 
ON area.id = areahorario.id_area 
WHERE area.id = 1 
AND areahorario.disabled = 1
ORDER BY areahorario.fecha desc;
*/

/*
SELECT R.room_name, R.capacity, R.id, R.description,fechas.fecha,fechas.start_fecha,fechas.end_fecha
FROM mrbs_room as R
LEFT JOIN mrbs_area as A 
ON A.id = R.area_id
LEFT JOIN mrbs_room_fechas as fechas 
ON fechas.idroom = R.id 
WHERE R.area_id  = 1 
AND R.disabled = 0
AND A.disabled = 0
AND fechas.start_fecha <= '2016-09-01'
AND fechas.end_fecha >= '2016-12-27'
ORDER BY sort_key
*/


/*
 * Create tables
 */
 
/*
CREATE TABLE mrbs_area_horario(
	id int NOT NULL auto_increment,
    id_area int,
    fecha timestamp,
    disabled int,
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_area_horario_periodos(
	id int NOT NULL auto_increment,
    id_horario int,
    fecha time,
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_horario(
	id int NOT NULL auto_increment,
    fecha timestamp,
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_horario_periodos(
	id int NOT NULL auto_increment,
    fecha time,
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/

# CREATE DATABASE bookedscheduler CHARACTER SET utf8 COLLATE utf8_general_ci;

#use bookedscheduler;

# CREATE DATABASE templatemilanomanual CHARACTER SET utf8 COLLATE utf8_general_ci;

/*
use mrbsperiodosmrbs_area;
CREATE TABLE mrbs_area
(
  id                        int NOT NULL auto_increment,
  disabled                  tinyint(1) DEFAULT 0 NOT NULL,
  area_name                 varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci,
  timezone                  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci,
  area_admin_email          text CHARACTER SET utf8 COLLATE utf8_general_ci,
  resolution                int,
  default_duration          int,
  default_duration_all_day  tinyint(1) DEFAULT 0 NOT NULL,
  morningstarts             int,
  morningstarts_minutes     int,
  eveningends               int,
  eveningends_minutes       int,
  private_enabled           tinyint(1),
  private_default           tinyint(1),
  private_mandatory         tinyint(1),
  private_override          varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci,
  min_create_ahead_enabled  tinyint(1),
  min_create_ahead_secs     int,
  max_create_ahead_enabled  tinyint(1),
  max_create_ahead_secs     int,
  min_delete_ahead_enabled  tinyint(1),
  min_delete_ahead_secs     int,
  max_delete_ahead_enabled  tinyint(1),
  max_delete_ahead_secs     int,
  max_per_day_enabled       tinyint(1) DEFAULT 0 NOT NULL,
  max_per_day               int DEFAULT 0 NOT NULL,
  max_per_week_enabled      tinyint(1) DEFAULT 0 NOT NULL,
  max_per_week              int DEFAULT 0 NOT NULL,
  max_per_month_enabled     tinyint(1) DEFAULT 0 NOT NULL,
  max_per_month             int DEFAULT 0 NOT NULL,
  max_per_year_enabled      tinyint(1) DEFAULT 0 NOT NULL,
  max_per_year              int DEFAULT 0 NOT NULL,
  max_per_future_enabled    tinyint(1) DEFAULT 0 NOT NULL,
  max_per_future            int DEFAULT 0 NOT NULL,
  max_duration_enabled      tinyint(1) DEFAULT 0 NOT NULL,
  max_duration_secs         int DEFAULT 0 NOT NULL,
  max_duration_periods      int DEFAULT 0 NOT NULL,
  custom_html               text CHARACTER SET utf8 COLLATE utf8_general_ci,
  approval_enabled          tinyint(1),
  reminders_enabled         tinyint(1),
  enable_periods            tinyint(1),
  confirmation_enabled      tinyint(1),
  confirmed_default         tinyint(1),

  PRIMARY KEY (id),
  UNIQUE KEY uq_area_name (area_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_room
(
  id               int NOT NULL auto_increment,
  disabled         tinyint(1) DEFAULT 0 NOT NULL,
  area_id          int DEFAULT '0' NOT NULL,
  room_name        varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  sort_key         varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  description      varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci,
  capacity         int DEFAULT '0' NOT NULL,
  room_admin_email text CHARACTER SET utf8 COLLATE utf8_general_ci,
  custom_html      text CHARACTER SET utf8 COLLATE utf8_general_ci,

  PRIMARY KEY (id),
  FOREIGN KEY (area_id) 
    REFERENCES mrbs_area(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
  UNIQUE KEY uq_room_name (area_id, room_name),
  KEY idxSortKey (sort_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_repeat
(
  id             int NOT NULL auto_increment,
  start_time     int DEFAULT '0' NOT NULL,
  end_time       int DEFAULT '0' NOT NULL,
  rep_type       int DEFAULT '0' NOT NULL,
  end_date       int DEFAULT '0' NOT NULL,
  rep_opt        varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  room_id        int DEFAULT '1' NOT NULL,
  timestamp      timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  create_by      varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  modified_by    varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  name           varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  type           char DEFAULT 'E' NOT NULL,
  description    text CHARACTER SET utf8 COLLATE utf8_general_ci,
  rep_num_weeks  smallint NULL,
  month_absolute smallint DEFAULT NULL,
  month_relative varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  status         tinyint unsigned NOT NULL DEFAULT 0,
  reminded       int,
  info_time      int,
  info_user      varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci,
  info_text      text CHARACTER SET utf8 COLLATE utf8_general_ci,
  ical_uid       varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  ical_sequence  smallint DEFAULT 0 NOT NULL,
  
  PRIMARY KEY (id),
  FOREIGN KEY (room_id) 
    REFERENCES mrbs_room(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_entry
(
  id             int NOT NULL auto_increment,
  start_time     int DEFAULT '0' NOT NULL,
  end_time       int DEFAULT '0' NOT NULL,
  entry_type     int DEFAULT '0' NOT NULL,
  repeat_id      int DEFAULT NULL,
  room_id        int DEFAULT '1' NOT NULL,
  timestamp      timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  create_by      varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  modified_by    varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  name           varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  type           char DEFAULT 'E' NOT NULL,
  description    text CHARACTER SET utf8 COLLATE utf8_general_ci,
  status         tinyint unsigned NOT NULL DEFAULT 0,
  reminded       int,
  info_time      int,
  info_user      varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci,
  info_text      text CHARACTER SET utf8 COLLATE utf8_general_ci,
  ical_uid       varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  ical_sequence  smallint DEFAULT 0 NOT NULL,
  ical_recur_id  varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,

  PRIMARY KEY (id),
  FOREIGN KEY (room_id) 
    REFERENCES mrbs_room(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
  FOREIGN KEY (repeat_id) 
    REFERENCES mrbs_repeat(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
  KEY idxStartTime (start_time),
  KEY idxEndTime   (end_time)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_variables
(
  id               int NOT NULL auto_increment,
  variable_name    varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci,
  variable_content text CHARACTER SET utf8 COLLATE utf8_general_ci,
      
  PRIMARY KEY (id),
  UNIQUE KEY uq_variable_name (variable_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_zoneinfo
(
  id                 int NOT NULL auto_increment,
  timezone           varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' NOT NULL,
  outlook_compatible tinyint unsigned NOT NULL DEFAULT 0,
  vtimezone          text CHARACTER SET utf8 COLLATE utf8_general_ci,
  last_updated       int NOT NULL DEFAULT 0,
      
  PRIMARY KEY (id),
  UNIQUE KEY uq_timezone (timezone, outlook_compatible)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE mrbs_users
(
  
  id        int NOT NULL auto_increment,
  level     smallint DEFAULT '0' NOT NULL,  
  name      varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci,
  password_hash  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci,
  email     varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci,

  PRIMARY KEY (id),
  UNIQUE KEY uq_name (name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO mrbs_variables (variable_name, variable_content)
  VALUES ( 'db_version', '47');
INSERT INTO mrbs_variables (variable_name, variable_content)
  VALUES ( 'local_db_version', '1');
*/

#CREATE DATABASE mrbsperiodos CHARACTER SET utf8 COLLATE utf8_general_ci;

#ALTER TABLE mrbs_room ADD fecha timestamp;

#CREATE DATABASE prestashopnuevo CHARACTER SET utf8 COLLATE utf8_general_ci;

#drop database prestashopnuevo;
#drop database prestashopnginx;
#drop database prestashopprueba;
#drop database milano2;
#drop database milano3;
#drop database milano4;

#CREATE DATABASE prestashopprueba CHARACTER SET utf8 COLLATE utf8_general_ci;

#CREATE DATABASE pisosman_resa CHARACTER SET utf8 COLLATE utf8_general_ci;


# drop database templatemilano1;
# drop database templatemilano2;
# drop database templatemilano4;
# drop database templatemilano5;
# CREATE DATABASE templatemilano2 CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE dev_makeyoursuit CHARACTER SET utf8 COLLATE utf8_general_ci;

#CREATE DATABASE templateblackwite1 CHARACTER SET utf8 COLLATE utf8_general_ci;
#CREATE DATABASE templateblackwite2 CHARACTER SET utf8 COLLATE utf8_general_ci;
#CREATE DATABASE templateblackwite3 CHARACTER SET utf8 COLLATE utf8_general_ci;

#CREATE DATABASE templatemilano1 CHARACTER SET utf8 COLLATE utf8_general_ci;
#CREATE DATABASE templatemilano2 CHARACTER SET utf8 COLLATE utf8_general_ci;
#CREATE DATABASE templatemilano3 CHARACTER SET utf8 COLLATE utf8_general_ci;
#CREATE DATABASE templatemilano4 CHARACTER SET utf8 COLLATE utf8_general_ci;
#CREATE DATABASE templatemilano5 CHARACTER SET utf8 COLLATE utf8_general_ci;
#CREATE DATABASE templatemilano6 CHARACTER SET utf8 COLLATE utf8_general_ci;
#CREATE DATABASE templatemilano7 CHARACTER SET utf8 COLLATE utf8_general_ci;
#CREATE DATABASE templatemilano8 CHARACTER SET utf8 COLLATE utf8_general_ci;

# Tablas davidberruezo
# CREATE DATABASE davidber_blog CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE davidber_opensource CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE davidber_web CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE prestashop15dosa CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE prestashop16paris CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE yourspan_wine CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE berruezo_blog CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE berruezo_tienda CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE ecommerc_blog CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE ecommerc_wordpress CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE ecommerc_zf2tutorial CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE todopara_blog CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE todopara_prestashop CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE espaicli_marketplace  CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE phpandfr_blog CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE fruteria_gaite CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE ibergrap_blog CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE ibergrap_prestashop CHARACTER SET utf8 COLLATE utf8_general_ci;
# drop database prueba_prestashop;
# CREATE DATABASE prueba_prestashop CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE ted_web_dev CHARACTER SET utf8 COLLATE utf8_general_ci;
# use ted_web_dev;
# drop database ted_web_dev;
# CREATE DATABASE ted_web_dev CHARACTER SET utf8 COLLATE utf8_general_ci
# CREATE DATABASE ted_web_live CHARACTER SET utf8 COLLATE utf8_general_ci
# drop database prestashop_agile;
# CREATE DATABASE prestashopagile CHARACTER SET utf8 COLLATE utf8_general_ci
# drop database osclass;
# CREATE DATABASE prestashopprueba CHARACTER SET utf8 COLLATE utf8_general_ci;
# drop database phpandfr_blog;
# CREATE DATABASE phpandfr_blog CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE prestashoppruebawordpress CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE defursac CHARACTER SET utf8 COLLATE utf8_general_ci;
# drop database defursac;

# CREATE DATABASE milano CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE milano2 CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE milano2 CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE milano3 CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE milano4 CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE milano5 CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE milano6 CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE milano7 CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE milano8 CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE milano CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE milanobuena CHARACTER SET utf8 COLLATE utf8_general_ci;
# drop database milanobuena;
# CREATE DATABASE milano9 CHARACTER SET utf8 COLLATE utf8_general_ci;
# ps_hook_moduleCREATE DATABASE milano10 CHARACTER SET utf8 COLLATE utf8_general_ci;

# CREATE DATABASE milano11 CHARACTER SET utf8 COLLATE utf8_general_ci;
# CREATE DATABASE milano12 CHARACTER SET utf8 COLLATE utf8_general_ci;

/*
CREATE DATABASE templatemilano1 CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE templatemilano2 CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE templatemilano3 CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE templatemilano4 CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE templatemilano5 CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE templatemilano6 CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE templatemilano7 CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE DATABASE templatemilano8 CHARACTER SET utf8 COLLATE utf8_general_ci;
*/

#drop database milano;
#drop database milano1;
#drop database milano2;
#drop database milano3;
#drop database milano4;
#drop database milano5;
#drop database milano6;
#drop database milano7;
#drop database milano8;
#drop database milano9;
#drop database milano10;
#drop database milano11;
#drop database milano12;

/*
use milano1;

# smart blog
CREATE TABLE ps_smart_blog_category (
  `id_smart_blog_category` int(11) NOT NULL auto_increment,
  `level_depth` TINYINT(3) UNSIGNED NOT NULL DEFAULT 0,
  `id_parent` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `desc_limit` varchar(45) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id_smart_blog_category`)
) ENGINE=innodb DEFAULT CHARSET=utf8;


CREATE TABLE ps_smart_blog_category_lang(
  `id_smart_blog_category` int(11) NOT NULL auto_increment,
  `id_lang` int(11) NOT NULL,
  `name` VARCHAR(128) NOT NULL ,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_keyword` varchar(200) DEFAULT NULL,
  `meta_description` varchar(350) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `link_rewrite` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_smart_blog_category`,`id_lang`)
) ENGINE=innodb DEFAULT CHARSET=utf8;


CREATE TABLE ps_smart_blog_category_shop (  
  `id_smart_blog_category` int(11) NOT NULL,
  `id_shop` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_smart_blog_category`)
)ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE ps_smart_blog_comment(
  `id_smart_blog_comment` int(11) NOT NULL auto_increment,
  `id_parent` int(11) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `website` varchar(128) DEFAULT NULL,
  `content` text,
  `active` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id_smart_blog_comment`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE ps_smart_blog_comment_shop( 
  `id_smart_blog_comment` int(11) NOT NULL,
  `id_shop` int(11) DEFAULT NULL,  
  PRIMARY KEY (`id_smart_blog_comment`)
)ENGINE=innodb DEFAULT CHARSET=utf8;



CREATE TABLE ps_smart_blog_media (
  `id_media` int(11) NOT NULL auto_increment,
  `id_post` int(11) DEFAULT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `media_path` varchar(45) DEFAULT NULL,
  `media_name` varchar(45) DEFAULT NULL,
  `media_description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_media`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE ps_smart_blog_post (
  `id_smart_blog_post` int(11) NOT NULL auto_increment,
  `id_author` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `available` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified`  datetime DEFAULT NULL,
  `viewed` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `comment_status` int(11) DEFAULT NULL,
  `post_type` varchar(45) DEFAULT NULL,
  `image` varchar(245) DEFAULT NULL,
  `associations` TEXT NULL,
  PRIMARY KEY (`id_smart_blog_post`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE ps_smart_blog_post_lang (
  `id_smart_blog_post` int(11) NOT NULL,
  `id_lang` varchar(45) DEFAULT NULL,
  `meta_title` varchar(150) DEFAULT NULL,
  `meta_keyword` varchar(200) DEFAULT NULL,
  `meta_description` varchar(450) DEFAULT NULL,
  `short_description` varchar(450) DEFAULT NULL,
  `content` text,
  `link_rewrite` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_smart_blog_post`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE ps_smart_blog_post_shop (  
  `id_smart_blog_post` int(11) NOT NULL,
  `id_shop` int(11) NOT NULL,  
    PRIMARY KEY (`id_smart_blog_post`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE ps_smart_blog_post_meta (  
  `id_smart_blog_post_meta` int(11) NOT NULL auto_increment,
  `id_smart_blog_post` int(11) NOT NULL,  
  `meta_key` VARCHAR(50) NOT NULL,  
  `meta_value` LONGTEXT,  
    PRIMARY KEY (`id_smart_blog_post_meta`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE ps_smart_blog_post_category (
  `id_smart_blog_category` int(11) NOT NULL,
  `id_smart_blog_post` int(11) DEFAULT NULL,
    PRIMARY KEY (`id_smart_blog_category`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE ps_smart_blog_post_related (
  `id_smart_blog_post` int(11) NOT NULL,
  `related_post_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_smart_blog_post`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE ps_smart_blog_tag (
  `id_tag` int(11) NOT NULL auto_increment,
  `id_lang` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=innodb DEFAULT CHARSET=utf8;


CREATE TABLE ps_smart_blog_post_tag (
  `id_tag` int(11) NOT NULL,
  `id_post` int(11) DEFAULT NULL
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE ps_smart_blog_imagetype(
  `id_smart_blog_imagetype` int(11) NOT NULL auto_increment,
  `type_name` varchar(45) DEFAULT NULL,
  `width` varchar(45) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_smart_blog_imagetype`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE ps_smart_blog_gallary_images (
      `id_smart_blog_gallary_images` INT(11) NOT NULL AUTO_INCREMENT,
      `id_smart_blog_post` int(11) NOT NULL,
      `position` int(11) NOT NULL,
       PRIMARY KEY (`id_smart_blog_gallary_images`)
    ) ENGINE=innodb DEFAULT CHARSET=utf8;

CREATE TABLE ps_smart_blog_gallary_images_lang (
        `id_smart_blog_gallary_images` INT(11) NOT NULL,
        `id_lang` int(11) NOT NULL,
        `legend` varchar(256) NOT NULL,
        PRIMARY KEY (`id_smart_blog_gallary_images`)
) ENGINE=innodb DEFAULT CHARSET=utf8;
*/

use bookedscheduler;

/*
SET foreign_key_checks = 0;

--
-- Table structure for table `announcements`
--

#DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements` (
 `announcementid` mediumint(8) unsigned NOT NULL auto_increment,
 `announcement_text` text NOT NULL,
 `priority` mediumint(8),
 `start_date` datetime,
 `end_date` datetime,
 PRIMARY KEY (`announcementid`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

--
-- Table structure for table `layouts`
--

#DROP TABLE IF EXISTS `layouts`;
CREATE TABLE `layouts` (
 `layout_id` mediumint(8) unsigned NOT NULL auto_increment,
 `timezone` varchar(50) NOT NULL,
 PRIMARY KEY (`layout_id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

--
-- Table structure for table `time_blocks`
--

#DROP TABLE IF EXISTS `time_blocks`;
CREATE TABLE `time_blocks` (
 `block_id` mediumint(8) unsigned NOT NULL auto_increment,
 `label` varchar(85),
 `end_label` varchar(85),
 `availability_code` tinyint(2) unsigned NOT NULL,
 `layout_id` mediumint(8) unsigned NOT NULL,
 `start_time` time NOT NULL,
 `end_time` time NOT NULL,
 PRIMARY KEY (`block_id`),
 INDEX (`layout_id`),
 FOREIGN KEY (`layout_id`) 
	REFERENCES layouts(`layout_id`)
	ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

--
-- Table structure for table `schedules`
--

#DROP TABLE IF EXISTS `schedules`;
CREATE TABLE `schedules` (
 `schedule_id` smallint(5) unsigned NOT NULL auto_increment,
 `name` varchar(85) NOT NULL,
 `isdefault` tinyint(1) unsigned NOT NULL,
 `weekdaystart` tinyint(2) unsigned NOT NULL,
 `daysvisible` tinyint(2) unsigned NOT NULL default '7',
 `layout_id` mediumint(8) unsigned NOT NULL,
 `legacyid` char(16),
 PRIMARY KEY (`schedule_id`),
 INDEX (`layout_id`),
 FOREIGN KEY (`layout_id`)
	REFERENCES layouts(`layout_id`)
	ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;


--
-- Table structure for table `groups`
--

#DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
 `group_id` smallint(5) unsigned NOT NULL auto_increment,
 `name` varchar(85) NOT NULL,
 `admin_group_id` smallint(5) unsigned,
 `legacyid` char(16),
 PRIMARY KEY (`group_id`),
 FOREIGN KEY (`admin_group_id`)
	REFERENCES groups(`group_id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;


--
-- Table structure for table `roles`
--

#DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
 `role_id` tinyint(2) unsigned NOT NULL,
 `name` varchar(85),
 `role_level` tinyint(2) unsigned,
 PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

--
-- Table structure for table `user_roles`
--

#DROP TABLE IF EXISTS `group_roles`;
CREATE TABLE `group_roles` (
 `group_id` smallint(8) unsigned NOT NULL,
 `role_id` tinyint(2) unsigned NOT NULL,
 PRIMARY KEY (`group_id`, `role_id`),
 INDEX (`group_id`),
 FOREIGN KEY (`group_id`)
	REFERENCES groups(`group_id`)
	ON UPDATE CASCADE ON DELETE CASCADE,
 INDEX (`role_id`),
 FOREIGN KEY (`role_id`)
	REFERENCES roles(`role_id`)
	ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

--
-- Table structure for table `user_statuses`
--

#DROP TABLE IF EXISTS `user_statuses`;
CREATE TABLE `user_statuses` (
 `status_id` tinyint(2) unsigned NOT NULL,
 `description` varchar(85),
 PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

--
-- Table structure for table `users`
--

#DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
 `user_id` mediumint(8) unsigned NOT NULL auto_increment,
 `fname` varchar(85),
 `lname` varchar(85),
 `username` varchar(85),
 `email` varchar(85) NOT NULL,
 `password` varchar(85) NOT NULL,
 `salt` varchar(85) NOT NULL,
 `organization` varchar(85),
 `position` varchar(85),
 `phone` varchar(85),
 `timezone` varchar(85) NOT NULL,
 `language` VARCHAR(10) NOT NULL,
 `homepageid` tinyint(2) unsigned NOT NULL default '1',
 `date_created` datetime NOT NULL,
 `last_modified` timestamp,
 `lastlogin` datetime,
 `status_id` tinyint(2) unsigned NOT NULL,
 `legacyid` char(16),
 `legacypassword` varchar(32),
 PRIMARY KEY (`user_id`),
 INDEX (`status_id`),
 FOREIGN KEY (`status_id`) 
	REFERENCES user_statuses(`status_id`)
	ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

--
-- Table structure for table `user_groups`
--

#DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE `user_groups` (
 `user_id` mediumint(8) unsigned NOT NULL,
 `group_id` smallint(5) unsigned NOT NULL,
 PRIMARY KEY (`group_id`, `user_id`),
 INDEX (`user_id`),
 FOREIGN KEY (`user_id`) 
	REFERENCES users(`user_id`)
	ON UPDATE CASCADE ON DELETE CASCADE,
 INDEX (`group_id`),
 FOREIGN KEY (`group_id`) 
	REFERENCES groups(`group_id`)
	ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;


--
-- Table structure for table `resources`
--

#DROP TABLE IF EXISTS `resources`;
CREATE TABLE `resources` (
 `resource_id` smallint(5) unsigned NOT NULL auto_increment,
 `name` varchar(85) NOT NULL,
 `location` varchar(85),
 `contact_info` varchar(85),
 `description` text,
 `notes` text,
 `isactive` tinyint(1) unsigned NOT NULL default '1',
 `min_duration` int,
 `min_increment` int,
 `max_duration` int,
 `unit_cost` dec(7,2),
 `autoassign` tinyint(1) unsigned NOT NULL default '1',
 `requires_approval` tinyint(1) unsigned NOT NULL,
 `allow_multiday_reservations` tinyint(1) unsigned NOT NULL default '1',
 `max_participants` mediumint(8) unsigned,
 `min_notice_time` int,
 `max_notice_time` int,
 `image_name` varchar(50),
 `schedule_id` smallint(5) unsigned NOT NULL,
 `legacyid` char(16),
 PRIMARY KEY (`resource_id`),
 INDEX (`schedule_id`),
 FOREIGN KEY (`schedule_id`)
	REFERENCES schedules(`schedule_id`)
	ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

--
-- Table structure for table `user_resource_permissions`
--

#DROP TABLE IF EXISTS `user_resource_permissions`;
CREATE TABLE `user_resource_permissions` (
 `user_id` mediumint(8) unsigned NOT NULL,
 `resource_id` smallint(5) unsigned NOT NULL,
 `permission_id` tinyint(2) unsigned NOT NULL default '1',
 PRIMARY KEY (`user_id`, `resource_id`),
 INDEX (`user_id`),
 FOREIGN KEY (`user_id`) 
	REFERENCES users(`user_id`)
	ON UPDATE CASCADE ON DELETE CASCADE,
 INDEX (`resource_id`),
 FOREIGN KEY (`resource_id`) 
	REFERENCES resources(`resource_id`)
	ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

--
-- Table structure for table `group_resource_permissions`
--

#DROP TABLE IF EXISTS `group_resource_permissions`;
CREATE TABLE `group_resource_permissions` (
 `group_id` smallint(5) unsigned NOT NULL,
 `resource_id` smallint(5) unsigned NOT NULL,
 PRIMARY KEY (`group_id`, `resource_id`),
 INDEX (`group_id`),
 FOREIGN KEY (`group_id`) 
	REFERENCES groups(`group_id`) 
	ON UPDATE CASCADE ON DELETE CASCADE,
INDEX (`resource_id`),
FOREIGN KEY (`resource_id`) 
	REFERENCES resources(`resource_id`) 
	ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

--
-- Table structure for table `reservation_types`
--

#DROP TABLE IF EXISTS `reservation_types`;
CREATE TABLE `reservation_types` (
 `type_id` tinyint(2) unsigned NOT NULL,
 `label` varchar(85) NOT NULL,
 PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

--
-- Table structure for table `reservation_statuses`
--

#DROP TABLE IF EXISTS `reservation_statuses`;
CREATE TABLE `reservation_statuses` (
 `status_id` tinyint(2) unsigned NOT NULL,
 `label` varchar(85) NOT NULL,
 PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

--
-- Table structure for table `reservation_series`
--
#DROP TABLE IF EXISTS `reservation_series`;
CREATE TABLE  `reservation_series` (
  `series_id` int unsigned NOT NULL auto_increment,
  `date_created` datetime NOT NULL,
  `last_modified` datetime,
  `title` varchar(85) NOT NULL,
  `description` text,
  `allow_participation` tinyint(1) unsigned NOT NULL,
  `allow_anon_participation` tinyint(1) unsigned NOT NULL,
  `type_id` tinyint(2) unsigned NOT NULL,
  `status_id` tinyint(2) unsigned NOT NULL,
  `repeat_type` varchar(10) default NULL,
  `repeat_options` varchar(255) default NULL,
  `owner_id` mediumint(8) unsigned NOT NULL,
  `legacyid` char(16),
  PRIMARY KEY  (`series_id`),
  KEY `type_id` (`type_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `reservations_type` FOREIGN KEY (`type_id`) REFERENCES `reservation_types` (`type_id`) ON UPDATE CASCADE,
  CONSTRAINT `reservations_status` FOREIGN KEY (`status_id`) REFERENCES `reservation_statuses` (`status_id`) ON UPDATE CASCADE,
  CONSTRAINT `reservations_owner` FOREIGN KEY (`owner_id`) REFERENCES `users` (`user_id`)  ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Table structure for table `reservation_instances`
--

#DROP TABLE IF EXISTS `reservation_instances`;
CREATE TABLE  `reservation_instances` (
  `reservation_instance_id` int unsigned NOT NULL auto_increment,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `reference_number` varchar(50) NOT NULL,
  `series_id` int unsigned NOT NULL,
  PRIMARY KEY  (`reservation_instance_id`),
  KEY `start_date` (`start_date`),
  KEY `end_date` (`end_date`),
  KEY `reference_number` (`reference_number`),
  KEY `series_id` (`series_id`),
  CONSTRAINT `reservations_series` FOREIGN KEY (`series_id`) REFERENCES `reservation_series` (`series_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Table structure for table `reservation_users`
--

#DROP TABLE IF EXISTS `reservation_users`;
CREATE TABLE `reservation_users` (
  `reservation_instance_id` int unsigned NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `reservation_user_level` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY  (`reservation_instance_id`,`user_id`),
  KEY `reservation_instance_id` (`reservation_instance_id`),
  KEY `user_id` (`user_id`),
  KEY `reservation_user_level` (`reservation_user_level`),
  FOREIGN KEY (`reservation_instance_id`) REFERENCES `reservation_instances` (`reservation_instance_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Table structure for table `reservation_resources`
--

#DROP TABLE IF EXISTS `reservation_resources`;
CREATE TABLE `reservation_resources` (
 `series_id` int unsigned NOT NULL,
 `resource_id` smallint(5) unsigned NOT NULL,
 `resource_level_id` tinyint(2) unsigned NOT NULL,
 PRIMARY KEY (`series_id`, `resource_id`),
 INDEX (`resource_id`),
 FOREIGN KEY (`resource_id`) 
	REFERENCES resources(`resource_id`)
	ON UPDATE CASCADE ON DELETE CASCADE,
 INDEX (`series_id`),
 FOREIGN KEY (`series_id`) 
	REFERENCES reservation_series(`series_id`)
	ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

--
-- Table structure for table `blackout_series`
--
#DROP TABLE IF EXISTS `blackout_series`;
CREATE TABLE  `blackout_series` (
  `blackout_series_id` int unsigned NOT NULL auto_increment,
  `date_created` datetime NOT NULL,
  `last_modified` datetime,
  `title` varchar(85) NOT NULL,
  `description` text,
  `owner_id` mediumint(8) unsigned NOT NULL,
  `resource_id` mediumint(8) unsigned NOT NULL,
  `legacyid` char(16),
  PRIMARY KEY  (`blackout_series_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Table structure for table `blackout_instances`
--

#DROP TABLE IF EXISTS `blackout_instances`;
CREATE TABLE  `blackout_instances` (
  `blackout_instance_id` int unsigned NOT NULL auto_increment,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `blackout_series_id` int unsigned NOT NULL,
  PRIMARY KEY  (`blackout_instance_id`),
  INDEX `start_date` (`start_date`),
  INDEX `end_date` (`end_date`),
  INDEX `blackout_series_id` (`blackout_series_id`),
  FOREIGN KEY (`blackout_series_id`)
  	REFERENCES `blackout_series` (`blackout_series_id`)
  	ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Table structure for table `user_email_preferences`
--

#DROP TABLE IF EXISTS `user_email_preferences`;
CREATE TABLE `user_email_preferences` (
  `user_id` mediumint(8) unsigned NOT NULL,
  `event_category` varchar(45) NOT NULL,
  `event_type` varchar(45) NOT NULL,
 PRIMARY KEY (`user_id`, `event_category`, `event_type`),
 FOREIGN KEY (`user_id`)
	REFERENCES users(`user_id`)
	ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `quotas`
--

#DROP TABLE IF EXISTS `quotas`;
CREATE TABLE `quotas` (
 `quota_id` mediumint(8) unsigned NOT NULL auto_increment,
 `quota_limit` decimal(7,2) unsigned NOT NULL,
 `unit` varchar(25) NOT NULL,
 `duration` varchar(25) NOT NULL,
 `resource_id` smallint(5) unsigned,
 `group_id` smallint(5) unsigned,
 `schedule_id` smallint(5) unsigned,
 PRIMARY KEY (`quota_id`),
 FOREIGN KEY (`resource_id`)
	REFERENCES resources(`resource_id`)
	ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (`group_id`)
	REFERENCES groups(`group_id`)
	ON UPDATE CASCADE ON DELETE CASCADE,
 FOREIGN KEY (`schedule_id`)
	REFERENCES schedules(`schedule_id`)
	ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

--
-- Table structure for table `accessories`
--

#DROP TABLE IF EXISTS `accessories`;
CREATE TABLE `accessories` (
 `accessory_id` smallint(5) unsigned NOT NULL auto_increment,
 `accessory_name` varchar(85) NOT NULL,
 `accessory_quantity` tinyint(2) unsigned,
 `legacyid` char(16),
 PRIMARY KEY (`accessory_id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

--
-- Table structure for table `accessories`
--

#DROP TABLE IF EXISTS `reservation_accessories`;
CREATE TABLE `reservation_accessories` (
 `series_id` int unsigned NOT NULL,
 `accessory_id` smallint(5) unsigned NOT NULL,
 `quantity` tinyint(2) unsigned NOT NULL,
 PRIMARY KEY (`series_id`, `accessory_id`),
 INDEX (`accessory_id`),
 FOREIGN KEY (`accessory_id`)
	REFERENCES accessories(`accessory_id`)
	ON UPDATE CASCADE ON DELETE CASCADE,
 INDEX (`series_id`),
 FOREIGN KEY (`series_id`)
	REFERENCES reservation_series(`series_id`)
	ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

SET foreign_key_checks = 1;

-- UPGRADE TO VERSION 2.1



#DROP TABLE IF EXISTS `dbversion`;
CREATE TABLE `dbversion` (
 `version_number` DOUBLE unsigned NOT NULL DEFAULT 0,
 `version_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

ALTER TABLE `resources` ADD COLUMN `admin_group_id` SMALLINT(5) unsigned;
ALTER TABLE `resources` ADD CONSTRAINT `admin_group_id` FOREIGN KEY (`admin_group_id`) REFERENCES groups(`group_id`) ON DELETE SET NULL;

ALTER TABLE `users` ADD COLUMN `public_id` VARCHAR(20);
CREATE UNIQUE INDEX `public_id` ON `users` (`public_id`);

ALTER TABLE `resources` ADD COLUMN `public_id` VARCHAR(20);
CREATE UNIQUE INDEX `public_id` ON `resources` (`public_id`);

ALTER TABLE `schedules` ADD COLUMN `public_id` VARCHAR(20);
CREATE UNIQUE INDEX `public_id` ON `schedules` (`public_id`);

ALTER TABLE `users` ADD COLUMN `allow_calendar_subscription` TINYINT(1) NOT NULL DEFAULT 0;
ALTER TABLE `resources` ADD COLUMN `allow_calendar_subscription` TINYINT(1) NOT NULL DEFAULT 0;
ALTER TABLE `schedules` ADD COLUMN `allow_calendar_subscription` TINYINT(1) NOT NULL DEFAULT 0;

-- UPGRADE TO VERSION 2.2



#DROP TABLE IF EXISTS `custom_attributes`;
CREATE TABLE `custom_attributes` (
 `custom_attribute_id` mediumint(8) unsigned NOT NULL auto_increment,
 `display_label` varchar(50) NOT NULL,
 `display_type` tinyint(2) unsigned NOT NULL,
 `attribute_category` tinyint(2) unsigned NOT NULL,
 `validation_regex` varchar(50),
 `is_required` tinyint(1) unsigned NOT NULL,
 `possible_values` text,
 `sort_order` tinyint(2) unsigned,
  PRIMARY KEY (`custom_attribute_id`),
  INDEX (`attribute_category`),
  INDEX (`display_label`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

#DROP TABLE IF EXISTS `custom_attribute_values`;
CREATE TABLE `custom_attribute_values` (
 `custom_attribute_value_id` mediumint(8) unsigned NOT NULL auto_increment,
 `custom_attribute_id` mediumint(8) unsigned NOT NULL,
 `attribute_value` text NOT NULL,
 `entity_id` mediumint(8) unsigned NOT NULL,
 `attribute_category`  tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`custom_attribute_value_id`),
  INDEX (`custom_attribute_id`),
  INDEX `entity_category` (`entity_id`, `attribute_category`),
  INDEX `entity_attribute` (`entity_id`, `custom_attribute_id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

#DROP TABLE IF EXISTS `account_activation`;
CREATE TABLE `account_activation` (
 `account_activation_id` mediumint(8) unsigned NOT NULL auto_increment,
 `user_id` mediumint(8) unsigned NOT NULL,
 `activation_code` varchar(30) NOT NULL,
 `date_created` datetime NOT NULL,
  PRIMARY KEY (`account_activation_id`),
  INDEX (`activation_code`),
  UNIQUE KEY (`activation_code`),
  FOREIGN KEY (`user_id`)
	REFERENCES users(`user_id`)
	ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

#DROP TABLE IF EXISTS `reservation_files`;
CREATE TABLE IF NOT EXISTS `reservation_files` (
  `file_id` int unsigned NOT NULL auto_increment,
  `series_id` int unsigned NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `file_type` varchar(15) NOT NULL,
  `file_size` varchar(45) NOT NULL,
  `file_extension` varchar(10) NOT NULL,
  PRIMARY KEY  (`file_id`),
  FOREIGN KEY (`series_id`)
  	REFERENCES reservation_series(`series_id`)
  	ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

-- UPGRADE TO VERSION 2.3



ALTER TABLE `schedules` ADD COLUMN `admin_group_id` SMALLINT(5) unsigned;
ALTER TABLE `schedules` ADD CONSTRAINT `schedules_groups_admin_group_id` FOREIGN KEY (`admin_group_id`) REFERENCES groups(`group_id`) ON DELETE SET NULL;

#DROP TABLE IF EXISTS `saved_reports`;
CREATE TABLE `saved_reports` (
 `saved_report_id` mediumint(8) unsigned NOT NULL auto_increment,
 `report_name` varchar(50),
 `user_id` mediumint(8) unsigned NOT NULL,
 `date_created` datetime NOT NULL,
 `report_details` varchar(500) NOT NULL,
  PRIMARY KEY (`saved_report_id`),
  FOREIGN KEY (`user_id`)
	REFERENCES users(`user_id`)
	ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

ALTER TABLE `resources` ADD COLUMN `sort_order` TINYINT(2) unsigned;

-- UPGRADE TO VERSION 2.4



#DROP TABLE IF EXISTS `user_session`;
CREATE TABLE `user_session` (
 `user_session_id` mediumint(8) unsigned NOT NULL auto_increment,
 `user_id` mediumint(8) unsigned NOT NULL,
 `last_modified` datetime NOT NULL,
 `session_token` varchar(50) NOT NULL,
 `user_session_value` text NOT NULL,
  PRIMARY KEY (`user_session_id`),
  INDEX `user_session_user_id` (`user_id`),
  INDEX `user_session_session_token` (`session_token`),
  FOREIGN KEY (`user_id`)
	REFERENCES users(`user_id`)
	ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

ALTER TABLE `time_blocks` ADD COLUMN `day_of_week` SMALLINT(5) unsigned;

#DROP TABLE IF EXISTS `reminders`;
CREATE TABLE `reminders` (
 `reminder_id` int(11) unsigned NOT NULL auto_increment,
 `user_id` mediumint(8) unsigned NOT NULL,
 `address` text NOT NULL,
 `message` text NOT NULL,
 `sendtime` datetime NOT NULL,
 `refnumber` text NOT NULL,
 PRIMARY KEY (`reminder_id`),
 INDEX `reminders_user_id` (`user_id`),
 FOREIGN KEY (`user_id`)
 	REFERENCES users(`user_id`)
 	ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

#DROP TABLE IF EXISTS `reservation_reminders`;
CREATE TABLE `reservation_reminders` (
 `reminder_id` int(11) unsigned NOT NULL auto_increment,
 `series_id` int unsigned NOT NULL,
 `minutes_prior` int unsigned NOT NULL,
 `reminder_type` tinyint(2) unsigned NOT NULL,
 PRIMARY KEY (`reminder_id`),
 FOREIGN KEY (`series_id`)
  	REFERENCES reservation_series(`series_id`)
  	ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

ALTER TABLE `users` ADD COLUMN `default_schedule_id` smallint(5) unsigned;

-- UPGRADE TO VERSION 2.5



ALTER TABLE `custom_attributes` ADD COLUMN `entity_id` mediumint(8) unsigned;

ALTER TABLE `resources` ADD COLUMN `resource_type_id` mediumint(8) unsigned;

#DROP TABLE IF EXISTS `resource_group_assignment`;

#DROP TABLE IF EXISTS `resource_groups`;
CREATE TABLE `resource_groups` (
 `resource_group_id` mediumint(8) unsigned NOT NULL auto_increment,
 `resource_group_name` VARCHAR(75),
 `parent_id` mediumint(8) unsigned,
  PRIMARY KEY (`resource_group_id`),
  INDEX `resource_groups_parent_id` (`parent_id`),
  FOREIGN KEY (`parent_id`)
	REFERENCES resource_groups(`resource_group_id`)
	ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

#DROP TABLE IF EXISTS `resource_types`;
CREATE TABLE `resource_types` (
 `resource_type_id` mediumint(8) unsigned NOT NULL auto_increment,
 `resource_type_name` VARCHAR(75),
 `resource_type_description` TEXT,
  PRIMARY KEY (`resource_type_id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

ALTER TABLE `resources` ADD FOREIGN KEY (`resource_type_id`) REFERENCES resource_types(`resource_type_id`) ON DELETE SET NULL;

#DROP TABLE IF EXISTS `resource_group_assignment`;
CREATE TABLE `resource_group_assignment` (
 `resource_group_id` mediumint(8) unsigned NOT NULL,
 `resource_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`resource_group_id`, `resource_id`),
  INDEX `resource_group_assignment_resource_id` (`resource_id`),
  INDEX `resource_group_assignment_resource_group_id` (`resource_group_id`),
  FOREIGN KEY (`resource_group_id`)
		REFERENCES resource_groups(`resource_group_id`)
		ON DELETE CASCADE,
	FOREIGN KEY (`resource_id`)
		REFERENCES resources(`resource_id`)
	ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

#DROP TABLE IF EXISTS `blackout_series_resources`;
CREATE TABLE `blackout_series_resources` (
 `blackout_series_id` int unsigned NOT NULL,
 `resource_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`blackout_series_id`, `resource_id`),
	FOREIGN KEY (`blackout_series_id`)
		REFERENCES blackout_series(`blackout_series_id`)
		ON DELETE CASCADE,
	FOREIGN KEY (`resource_id`)
		REFERENCES resources(`resource_id`)
	ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;
*/

# ESTO NO
/*
DELETE blackout_series
FROM blackout_series
LEFT JOIN resources ON blackout_series.resource_id = resources.resource_id
WHERE resources.resource_id IS NULL;
*/

/*
INSERT INTO blackout_series_resources SELECT blackout_series_id, resource_id FROM blackout_series;

ALTER TABLE `blackout_series` DROP COLUMN `resource_id`;
ALTER TABLE `blackout_series` ADD COLUMN `repeat_type` varchar(10) default NULL;
ALTER TABLE `blackout_series` ADD COLUMN `repeat_options` varchar(255) default NULL;

#DROP TABLE IF EXISTS `user_preferences`;
CREATE TABLE `user_preferences` (
 `user_preferences_id` int unsigned NOT NULL auto_increment,
 `user_id` mediumint(8) unsigned NOT NULL,
 `name` varchar(100) NOT NULL,
 `value` varchar(100),
 PRIMARY KEY (`user_preferences_id`),
 INDEX (`user_id`),
 FOREIGN KEY (`user_id`)
    REFERENCES users(`user_id`)
    ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;

ALTER TABLE `accessories` MODIFY COLUMN accessory_quantity smallint(5) unsigned;
ALTER TABLE `reservation_accessories` MODIFY COLUMN quantity smallint(5) unsigned;

#DROP TABLE IF EXISTS `resource_status_reasons`;
CREATE TABLE `resource_status_reasons` (
 `resource_status_reason_id` smallint(5) unsigned NOT NULL auto_increment,
 `status_id` tinyint unsigned NOT NULL,
 `description` varchar(100),
 PRIMARY KEY (`resource_status_reason_id`),
 INDEX (`status_id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8;


ALTER TABLE `resources` ADD COLUMN `status_id` tinyint unsigned NOT NULL DEFAULT 1;
ALTER TABLE `resources` ADD COLUMN `resource_status_reason_id` smallint(5) unsigned;
ALTER TABLE `resources` ADD FOREIGN KEY (`resource_status_reason_id`) REFERENCES resource_status_reasons(`resource_status_reason_id`) ON DELETE SET NULL;
#UPDATE resources SET status_id = isactive;
ALTER TABLE `resources` DROP COLUMN `isactive`;
ALTER TABLE `resources` ADD COLUMN `buffer_time` int unsigned;

-- UPGRADE TO VERSION 2.6



# noinspection SqlNoDataSourceInspectionForFile
ALTER TABLE `custom_attributes`
  ADD COLUMN `admin_only` TINYINT(1) UNSIGNED;

ALTER TABLE `user_preferences`
  CHANGE COLUMN `value` `value` TEXT;

ALTER TABLE `reservation_files`
  CHANGE COLUMN `file_type` `file_type` VARCHAR(75);

#DROP TABLE IF EXISTS `reservation_color_rules`;
CREATE TABLE `reservation_color_rules` (
		`reservation_color_rule_id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
		`custom_attribute_id`       MEDIUMINT(8) UNSIGNED NOT NULL,
		`attribute_type`            SMALLINT UNSIGNED,
		`required_value`            TEXT,
		`comparison_type`           SMALLINT UNSIGNED,
		`color`                     VARCHAR(50),
  PRIMARY KEY (`reservation_color_rule_id`),
  FOREIGN KEY (`custom_attribute_id`)
  REFERENCES custom_attributes (`custom_attribute_id`)
    ON DELETE CASCADE
)
		ENGINE = InnoDB
		DEFAULT CHARACTER SET utf8;

#DROP TABLE IF EXISTS `resource_accessories`;

CREATE TABLE `resource_accessories` (
		`resource_accessory_id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
		`resource_id`           SMALLINT(5) UNSIGNED  NOT NULL,
		`accessory_id`          SMALLINT(5) UNSIGNED  NOT NULL,
		`minimum_quantity`      SMALLINT              NULL,
		`maximum_quantity`      SMALLINT              NULL,
		PRIMARY KEY (`resource_accessory_id`),
		FOREIGN KEY (`resource_id`)
		REFERENCES resources (`resource_id`)
				ON DELETE CASCADE,
		FOREIGN KEY (`accessory_id`)
		REFERENCES accessories (`accessory_id`)
				ON DELETE CASCADE
)
		ENGINE = InnoDB
		DEFAULT CHARACTER SET utf8;


ALTER TABLE `custom_attributes` ADD COLUMN `secondary_category` TINYINT(2) UNSIGNED;
ALTER TABLE `custom_attributes` ADD COLUMN `secondary_entity_ids` VARCHAR(2000);
ALTER TABLE `custom_attributes` ADD COLUMN `is_private` TINYINT(1) UNSIGNED;

ALTER TABLE `resource_groups`
  ADD COLUMN `public_id` VARCHAR(20);

ALTER TABLE `resources`
  MODIFY COLUMN `contact_info` VARCHAR(255);
ALTER TABLE `resources`
  MODIFY COLUMN `location` VARCHAR(255);

#DROP TABLE IF EXISTS `resource_type_assignment`;
CREATE TABLE `resource_type_assignment` (
		`resource_id`      SMALLINT(5) UNSIGNED  NOT NULL,
		`resource_type_id` MEDIUMINT(8) UNSIGNED NOT NULL,
		PRIMARY KEY (`resource_id`, `resource_type_id`),
		FOREIGN KEY (`resource_id`)
		REFERENCES resources (`resource_id`)
				ON DELETE CASCADE,
		FOREIGN KEY (`resource_type_id`)
		REFERENCES resource_types (`resource_type_id`)
				ON DELETE CASCADE
)
		ENGINE = InnoDB
		DEFAULT CHARACTER SET utf8;

#DROP TABLE IF EXISTS `custom_attribute_entities`;
CREATE TABLE `custom_attribute_entities` (
		`custom_attribute_id` MEDIUMINT(8) UNSIGNED NOT NULL,
		`entity_id`           MEDIUMINT(8) UNSIGNED NOT NULL,
		PRIMARY KEY (`custom_attribute_id`, `entity_id`),
		FOREIGN KEY (`custom_attribute_id`)
		REFERENCES custom_attributes (`custom_attribute_id`)
				ON DELETE CASCADE
)
		ENGINE = InnoDB
		DEFAULT CHARACTER SET utf8;

INSERT INTO custom_attribute_entities (custom_attribute_id, entity_id) (SELECT
																																						custom_attribute_id,
																																						entity_id
																																				FROM `custom_attributes`
																																				WHERE entity_id IS NOT NULL AND entity_id <> 0);

ALTER TABLE custom_attributes
  DROP COLUMN `entity_id`;

ALTER TABLE `quotas`
  ADD COLUMN `enforced_days` VARCHAR(15);
ALTER TABLE `quotas`
  ADD COLUMN `enforced_time_start` TIME;
ALTER TABLE `quotas`
  ADD COLUMN `enforced_time_end` TIME;
ALTER TABLE `quotas`
  ADD COLUMN `scope` VARCHAR(25);

ALTER TABLE `resources`
  ADD COLUMN `enable_check_in` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0;
ALTER TABLE `resources`
  ADD COLUMN `auto_release_minutes` SMALLINT UNSIGNED;
ALTER TABLE `resources` ADD INDEX( `auto_release_minutes`);
ALTER TABLE `resources`
  ADD COLUMN `color` VARCHAR(10);
ALTER TABLE `resources`
  ADD COLUMN `allow_display` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0;

ALTER TABLE `reservation_instances`
  ADD COLUMN `checkin_date` DATETIME;
ALTER TABLE `reservation_instances` ADD INDEX( `checkin_date`);
ALTER TABLE `reservation_instances`
  ADD COLUMN `checkout_date` DATETIME;
ALTER TABLE `reservation_instances`
  ADD COLUMN `previous_end_date` DATETIME;
ALTER TABLE `reservation_series`
  ADD COLUMN `last_action_by` MEDIUMINT(8) UNSIGNED;

#DROP TABLE IF EXISTS `reservation_guests`;
CREATE TABLE `reservation_guests` (
		`reservation_instance_id` INT UNSIGNED        NOT NULL,
		`email`                   VARCHAR(255)        NOT NULL,
		`reservation_user_level`  TINYINT(2) UNSIGNED NOT NULL,
		PRIMARY KEY (`reservation_instance_id`, `email`),
		KEY `reservation_guests_reservation_instance_id` (`reservation_instance_id`),
		KEY `reservation_guests_email_address` (`email`),
		KEY `reservation_guests_reservation_user_level` (`reservation_user_level`),
		FOREIGN KEY (`reservation_instance_id`) REFERENCES `reservation_instances` (`reservation_instance_id`)
				ON DELETE CASCADE
				ON UPDATE CASCADE
)
		ENGINE = InnoDB
		DEFAULT CHARACTER SET utf8;

ALTER TABLE `users`
  ADD COLUMN `credit_count` DECIMAL(7, 2) UNSIGNED;
ALTER TABLE `resources`
  ADD COLUMN `credit_count` DECIMAL(7, 2) UNSIGNED;
ALTER TABLE `resources`
  ADD COLUMN `peak_credit_count` DECIMAL(7, 2) UNSIGNED;
ALTER TABLE `reservation_instances`
  ADD COLUMN `credit_count` DECIMAL(7, 2) UNSIGNED;


#DROP TABLE IF EXISTS `peak_times`;
CREATE TABLE `peak_times` (
		`peak_times_id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
		`schedule_id`   SMALLINT(5) UNSIGNED  NOT NULL,
		`all_day`   TINYINT(1) UNSIGNED  NOT NULL,
		`start_time`   VARCHAR(10),
		`end_time`   VARCHAR(10),
		`every_day`   TINYINT(1) UNSIGNED  NOT NULL,
		`peak_days`   VARCHAR(13),
		`all_year`   TINYINT(1) UNSIGNED  NOT NULL,
		`begin_month`   TINYINT(1) UNSIGNED  NOT NULL,
		`begin_day`   TINYINT(1) UNSIGNED  NOT NULL,
		`end_month`   TINYINT(1) UNSIGNED  NOT NULL,
		`end_day`   TINYINT(1) UNSIGNED  NOT NULL,
		PRIMARY KEY (`peak_times_id`),
		FOREIGN KEY (`schedule_id`)
		REFERENCES `schedules` (`schedule_id`)
				ON DELETE CASCADE
)
		ENGINE = InnoDB
		DEFAULT CHARACTER SET utf8;

#DROP TABLE IF EXISTS `announcement_groups`;
CREATE TABLE `announcement_groups` (
		`announcementid` MEDIUMINT(8) UNSIGNED NOT NULL,
		`group_id` SMALLINT(5) UNSIGNED NOT NULL,
		PRIMARY KEY (`announcementid`, `group_id`),
		FOREIGN KEY (`announcementid`)
		REFERENCES `announcements` (`announcementid`)
				ON DELETE CASCADE,
    FOREIGN KEY (`group_id`)
		REFERENCES `groups` (`group_id`)
				ON DELETE CASCADE
		)
    ENGINE = InnoDB
		DEFAULT CHARACTER SET utf8;

#DROP TABLE IF EXISTS `announcement_resources`;
CREATE TABLE `announcement_resources` (
		`announcementid` MEDIUMINT(8) UNSIGNED NOT NULL,
		`resource_id` SMALLINT(5) UNSIGNED NOT NULL,
		PRIMARY KEY (`announcementid`, `resource_id`),
		FOREIGN KEY (`announcementid`)
		REFERENCES `announcements` (`announcementid`)
				ON DELETE CASCADE,
    FOREIGN KEY (`resource_id`)
		REFERENCES `resources` (`resource_id`)
				ON DELETE CASCADE
		)
    ENGINE = InnoDB
		DEFAULT CHARACTER SET utf8;

#DROP TABLE IF EXISTS `reservation_waitlist_requests`;
CREATE TABLE `reservation_waitlist_requests` (
  `reservation_waitlist_request_id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` MEDIUMINT(8) UNSIGNED NOT NULL,
  `resource_id` SMALLINT(5) UNSIGNED NOT NULL,
  `start_date` DATETIME,
  `end_date` DATETIME,
  PRIMARY KEY (`reservation_waitlist_request_id`),
  FOREIGN KEY (`user_id`)
  REFERENCES `users` (`user_id`)
    ON DELETE CASCADE,
  FOREIGN KEY (`resource_id`)
  REFERENCES `resources` (`resource_id`)
    ON DELETE CASCADE
)
  ENGINE = InnoDB
  DEFAULT CHARACTER SET utf8;

ALTER TABLE `custom_attribute_values`
  CHANGE `custom_attribute_value_id`  `custom_attribute_value_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT;

*/

/*
insert into user_statuses values (1, 'Active'), (2, 'Awaiting'), (3, 'Inactive');
insert into roles values (1, 'Group Admin', 1);
insert into roles values (2, 'Application Admin', 2);
insert into reservation_types values (1, 'Reservation'), (2, 'Blackout');
insert into reservation_statuses values (1, 'Created'), (2, 'Deleted'), (3, 'Pending');

insert into layouts values (1, 'America/Chicago');

insert into time_blocks (availability_code, layout_id, start_time, end_time) values
(2, 1, '00:00', '08:00'),
(1, 1, '08:00', '08:30'),
(1, 1, '08:30', '09:00'),
(1, 1, '09:00', '09:30'),
(1, 1, '09:30', '10:00'),
(1, 1, '10:00', '10:30'),
(1, 1, '10:30', '11:00'),
(1, 1, '11:00', '11:30'),
(1, 1, '11:30', '12:00'),
(1, 1, '12:00', '12:30'),
(1, 1, '12:30', '13:00'),
(1, 1, '13:00', '13:30'),
(1, 1, '13:30', '14:00'),
(1, 1, '14:00', '14:30'),
(1, 1, '14:30', '15:00'),
(1, 1, '15:00', '15:30'),
(1, 1, '15:30', '16:00'),
(1, 1, '16:00', '16:30'),
(1, 1, '16:30', '17:00'),
(1, 1, '17:00', '17:30'),
(1, 1, '17:30', '18:00'),
(2, 1, '18:00', '00:00');

insert into schedules (schedule_id, name, isdefault, weekdaystart, layout_id) values (1, 'Default', 1, 0, 1);

-- UPGRADE TO VERSION 2.1



insert into roles values (3, 'Resource Admin', 3);

insert into dbversion values('2.1', now());

-- UPGRADE TO VERSION 2.2



insert into dbversion values('2.2', now());

-- UPGRADE TO VERSION 2.3



insert into roles values (4, 'Schedule Admin', 4);

insert into dbversion values('2.3', now());

-- UPGRADE TO VERSION 2.4



insert into dbversion values('2.4', now());

-- UPGRADE TO VERSION 2.5



insert into dbversion values('2.5', now());

-- UPGRADE TO VERSION 2.6



insert into dbversion values('2.6', now());
*/














/*
SET foreign_key_checks = 0;

delete from groups where admin_group_id is not null;
delete from groups;
alter table groups AUTO_INCREMENT = 1;
delete from resources;
alter table resources AUTO_INCREMENT = 1;
delete from accessories;
alter table accessories AUTO_INCREMENT = 1;
delete from users;
alter table users AUTO_INCREMENT = 1;

insert into groups (group_id, name) values (1, 'Group Administrators'), (2, 'Application Administrators'), (3, 'Resource Administrators'), (4, 'Schedule Administrators');

insert into group_roles values (1, 1);
insert into group_roles values (2, 2);
insert into group_roles values (4, 4);

insert into users (fname, lname, email, username, password, salt, timezone, lastlogin, status_id, date_created, language, organization)
	values ('User', 'User', 'user@example.com', 'user', '7b6aec38ff9b7650d64d0374194307bdde711425', '3b3dbb9b', 'America/Chicago', '2008-09-16 01:59:00', 1, now(), 'en_us', 'XYZ Org Inc.');
insert into users (fname, lname, email, username, password, salt, timezone, lastlogin, status_id, date_created, language, organization)
	values ('Admin', 'Admin', 'admin@example.com', 'admin', '70f3e748c6801656e4aae9dca6ee98ab137d952c', '4a04db87', 'America/Chicago', '2010-03-26 12:44:00', 1, now(), 'en_us', 'ABC Org Inc.');

insert into user_groups values (2,2);	
	
insert into resources (`resource_id`, `name`, `location`, `contact_info`, `description`, `notes`, `min_duration`, `min_increment`, `max_duration`, `unit_cost`, `autoassign`, `requires_approval`, `allow_multiday_reservations`, `max_participants`, `min_notice_time`, `max_notice_time`, `image_name`, `legacyid`, `schedule_id`) VALUES
(1, 'Conference Room 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource1.jpg', NULL, 1),
(2, 'Conference Room 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL, NULL, 'resource2.jpg', NULL, 1);

insert into accessories (`accessory_id`, `accessory_name`, `accessory_quantity`) values
(1, 'accessory limited to 10', 10),
(2, 'accessory limited to 2', 2),
(3, 'unlimited accessory', NULL);

truncate table user_resource_permissions;
insert into user_resource_permissions values (1,1,1),(1,2,1),(2,1,1),(2,2,1);

truncate table custom_attributes;
insert into custom_attributes(`custom_attribute_id`,`display_label`,`display_type`,`attribute_category`,`validation_regex`,`is_required`,`possible_values`) VALUES
(1, 'Test Number', 1, 1, null, false, null),
(2, 'Test String', 1, 1, null, false, null),
(3, 'Test Number', 1, 4, null, false, null),
(4, 'Test String', 1, 4, null, false, null);

SET foreign_key_checks = 1;
*/


