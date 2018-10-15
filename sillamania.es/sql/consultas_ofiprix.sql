# Menu
# INSERT INTO `ps_hook` (`id_hook`, `name`, `title`, `description`, `position`, `live_edit`) VALUES ( null, `displayOfiprixmenu`,`Ofiprixmenu`, `Modulo para menu ofiprix`, 1,1 );
# INSERT INTO `ps_hook_alias` (`id_hook_alias`, `alias`, `name`) VALUES ( null, `displayOfiprixmenu`,`Ofiprixmenu`, `Modulo para menu ofiprix`, 1,1 );

# id_hook_alias, alias, name
# '1', 'payment', 'displayPayment'

# id_hook_alias, alias, name
# '1', 'payment', 'displayPayment'

/*
use sillamaniaes_dos;
SELECT a.`id_category`, `name`, `description`, sa.`position` AS `position`, `active` , sa.position position
FROM `ps_category` a 
LEFT JOIN `ps_category_lang` b ON (b.`id_category` = a.`id_category` AND b.`id_lang` = 1 AND b.`id_shop` = 1)
LEFT JOIN `ps_category_shop` sa ON (a.`id_category` = sa.`id_category` AND sa.id_shop = 1)  
WHERE 1   AND `id_parent` = 2 
ORDER BY sa.`position` ASC
*/

# tiendas

/*
SELECT SQL_CALC_FOUND_ROWS a.* , cl.`name` country, st.`name` state FROM `ps_store` a 
LEFT JOIN `ps_country_lang` cl
ON (cl.`id_country` = a.`id_country`
AND cl.`id_lang` = 1)
LEFT JOIN `ps_state` st
ON (st.`id_state` = a.`id_state`) 
WHERE 1  
ORDER BY a.`id_store` ASC
*/


# Attribute list
/*
SELECT SQL_CALC_FOUND_ROWS b.*, a.*
FROM `ps_attribute_group` a 
LEFT JOIN `ps_attribute_group_lang` b ON (b.`id_attribute_group` = a.`id_attribute_group` AND b.`id_lang` = 1)
WHERE 1  
ORDER BY a.`position` ASC
*/

# Attribute list pasando le parametros
SELECT SQL_CALC_FOUND_ROWS b.*, a.*
FROM `ps_attribute` a 
LEFT JOIN `ps_attribute_lang` b ON (b.`id_attribute` = a.`id_attribute` AND b.`id_lang` = 1)
WHERE 1  AND a.`id_attribute_group` = 1 
ORDER BY a.`position` ASC
