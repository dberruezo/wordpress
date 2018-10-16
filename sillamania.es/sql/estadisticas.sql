# use prestashopprueba;

#sql_mode=only_full_group_by;

#SET sql_mode = '';



/*
SELECT COUNT(o.id_order) as orderCount, SUM(o.total_paid_real / o.conversion_rate) as orderSum
FROM ps_orders as o
LEFT JOIN ps_address a
ON o.id_address_delivery = a.id_address
WHERE o.valid = 1
AND o.invoice_date >= "2016-12-18"
AND o.invoice_date <= "2016-12-19";
*/

/*
SELECT count(*) as totalPedidos
FROM ps_orders as orders
where orders.date_add >= "2016-12-18"
AND orders.date_add < "2016-12-19"
*/


/*
SELECT o.id_order,product_id as idproducto,pd.name,od.product_reference,cl.name as nombrecategoria
FROM ps_orders as o
LEFT JOIN ps_order_detail as od 
ON od.id_order = o.id_order
LEFT JOIN ps_product_lang as pd 
ON pd.id_product = od.product_id
LEFT JOIN ps_address as a 
ON o.id_address_delivery = a.id_address
LEFT JOIN ps_category_product as cp 
ON cp.id_product = od.product_id
LEFT JOIN ps_category_lang as cl 
ON cl.id_category = cp.id_category
WHERE o.valid = 1
AND o.invoice_date >= "2016-12-01"
AND o.invoice_date <= "2017-01-15"
AND pd.id_lang = 1
*/

/*
AND cp.id_category <> 3 
AND cp.id_category <> 70 
AND cp.id_category <> 71 
AND cp.id_category <> 72
AND cp.id_category <> 73
AND cp.id_category <> 189
AND cp.id_category <> 253
AND cp.id_category <> 2
*/

/*
SELECT o.date_add,o.total_paid_tax_incl
FROM ps_orders as o
LEFT JOIN ps_address a
ON o.id_address_delivery = a.id_address
WHERE o.valid = 1
AND o.invoice_date >= "2016-12-01"
AND o.invoice_date <= "2017-01-31"
*/

/*
SELECT o.date_add
FROM ps_orders as o
LEFT JOIN ps_address a
ON o.id_address_delivery = a.id_address
WHERE o.valid = 1
AND o.invoice_date >= "2016-12-01"
AND o.invoice_date <= "2017-01-15"; 
*/

/*
SELECT DISTINCT statelang.name as nombreestado,orders.id_order,pais_lang.name as pais,direccion.city,orders.reference,orders.total_paid,customer.firstname,customer.lastname,customer.email,orders.id_customer,orderhistory.date_add,orderhistory.id_order_state 
from ps_order_history as orderhistory 
LEFT JOIN ps_orders as orders 
ON orders.id_order = orderhistory.id_order  
LEFT JOIN ps_customer as customer
ON orders.id_customer = customer.id_customer
LEFT JOIN ps_address as direccion
ON direccion.id_customer = customer.id_customer
LEFT JOIN ps_country as pais
ON direccion.id_country = pais.id_country
LEFT JOIN ps_country_lang as pais_lang
ON pais_lang.id_country = pais.id_country
LEFT JOIN ps_order_state_lang as statelang
ON statelang.id_order_state = orders.current_state
where orders.date_add >= "2016-11-01"
AND orders.date_add < "2017-01-13"
AND orders.current_state = orderhistory.id_order_state
and pais_lang.id_lang = 1
AND statelang.id_lang = 1
GROUP BY (orders.id_order)
order by orders.id_order ASC;
*/



# Pedidos
# Total Pedidos
# Total Dinero en pedidos
/*
SELECT COUNT(o.id_order) as orderCount, SUM(o.total_paid_real / o.conversion_rate) as orderSum
FROM ps_orders as o
LEFT JOIN ps_address a 
ON o.id_address_delivery = a.id_address
WHERE o.valid = 1
AND o.invoice_date >= '2016-12-01'
AND o.invoice_date <= '2017-01-08';
#AND a.id_country = 6
*/

# orderCount, orderSum
# '3', 		  '1508.4500000000'


# La misma consulta pero con la fecha de los pedidos
/*
SELECT o.id_order,o.date_add as fecha
FROM ps_orders as o
LEFT JOIN ps_address a 
ON o.id_address_delivery = a.id_address
WHERE o.valid = 1
AND o.invoice_date >= '2016-12-01'
AND o.invoice_date <= '2017-01-08';
*/


/*
# Pedidos
# Número total de productos
SELECT SUM(od.product_quantity) as products
FROM ps_orders o
LEFT JOIN ps_order_detail od ON od.id_order = o.id_order
LEFT JOIN ps_address a ON o.id_address_delivery = a.id_address
WHERE o.valid = 1
AND o.invoice_date >= '2016-12-01'
AND o.invoice_date <= '2017-01-08';


# Pedido medio
# La cantidad media de los pedidos
SELECT DISTINCT orders.id_order,orders.reference,orders.total_paid,orders.id_customer,orderhistory.date_add,orderhistory.id_order_state 
from ps_order_history as orderhistory 
LEFT JOIN ps_orders as orders 
ON orders.id_order = orderhistory.id_order  
where orders.date_add >= "2016-01-01"
AND orders.date_add < "2017-01-03"
AND orderhistory.id_order_state = 2
OR 
orders.date_add >= "2016-01-01"
AND orders.date_add < "2017-01-03"
AND orderhistory.id_order_state = 4
GROUP BY (orders.id_order);
#order by orders.id_order ASC;

# Todos los pedidos
SELECT count(*) as totalPedidos
FROM ps_orders as orders
where orders.date_add >= "2016-12-01"
AND orders.date_add < "2017-01-08";

# Total pedidos
# El total de los pedidos que hayan pasado por el estado 2
SELECT count(*)
from ps_order_history as orderhistory 
LEFT JOIN ps_orders as orders 
ON orders.id_order = orderhistory.id_order  
where orders.date_add >= "2016-11-01"
AND orders.date_add < "2017-01-03"
AND orderhistory.id_order_state = 2


# Media de los productos comprados por pedido
# La media del número de productos de todos los pedidos
SELECT detalle.product_quantity,orders.id_order,orders.reference,orders.total_paid,orders.id_customer,orderhistory.date_add,orderhistory.id_order_state 
from ps_order_history as orderhistory 
LEFT JOIN ps_orders as orders 
ON orders.id_order = orderhistory.id_order  
LEFT JOIN ps_order_detail as detalle 
ON detalle.id_order = orderhistory.id_order
where orders.date_add >= "2016-01-01"
AND orders.date_add < "2017-01-03"
AND orderhistory.id_order_state = 2
*/

# Las mejores categorias
#SELECT COUNT(o.id_order) as orderCount, SUM(o.total_paid_real / o.conversion_rate) as orderSum
/*
SELECT SUM(orderdetail.total_price_tax_incl) as totalPrecio,COUNT(orderdetail.product_id) as productosPorPedido,o.id_order,categorylang.name as nombrecategoria
FROM ps_orders as o
LEFT JOIN ps_address a
ON o.id_address_delivery = a.id_address
LEFT JOIN ps_order_detail as orderdetail
ON orderdetail.id_order = o.id_order
LEFT JOIN ps_category_product as categoryproduct
ON categoryproduct.id_product = orderdetail.product_id
LEFT JOIN ps_category_lang as categorylang
ON categorylang.id_category = categoryproduct.id_category
WHERE o.valid = 1
AND categorylang.id_lang = 1
AND o.invoice_date >= "2016-12-01"
AND o.invoice_date <= "2017-01-10"
GROUP BY o.id_order,categorylang.name;


# Número total de descuentos
SELECT SUM(od.product_quantity) as products
FROM ps_orders o
LEFT JOIN ps_order_detail od ON od.id_order = o.id_order
LEFT JOIN ps_address a ON o.id_address_delivery = a.id_address
WHERE o.valid = 1
AND o.invoice_date >= '2016-12-01'
AND o.invoice_date <= '2017-01-10'
AND o.total_discounts > 0;
*/


# Los top quinze productos
/*
SELECT product_id as idproducto,pd.name,od.product_reference,cl.name as nombrecategoria
FROM ps_orders as o
LEFT JOIN ps_order_detail as od 
ON od.id_order = o.id_order
LEFT JOIN ps_product_lang as pd 
ON pd.id_product = od.product_id
LEFT JOIN ps_address as a 
ON o.id_address_delivery = a.id_address
LEFT JOIN ps_category_product as cp 
ON cp.id_product = od.product_id
LEFT JOIN ps_category_lang as cl 
ON cl.id_category = cp.id_category
WHERE o.valid = 1
AND o.invoice_date >= '2016-12-01'
AND o.invoice_date <= '2017-01-10'
AND pd.id_lang = 1;
#AND o.total_discounts > 0;
*/

# Clientes su segunda compra
# pd.name
# LEFT JOIN ps_product_lang as pd 
# ON pd.id_product = od.product_id
# LEFT JOIN ps_order_detail as od 
# ON od.id_order = o.id_order
/*
SELECT o.id_order,cu.firstname,cu.lastname,cu.email,o.total_paid_tax_incl
FROM ps_orders as o
LEFT JOIN ps_address as a 
ON o.id_address_delivery = a.id_address
LEFT JOIN ps_customer as cu 
ON cu.id_customer = o.id_customer
WHERE o.valid = 1
AND o.invoice_date >= '2016-12-01'
AND o.invoice_date <= '2017-01-10';
*/

/*
SELECT o.id_order,id_order_state
FROM ps_orders as o
LEFT JOIN ps_order_history as orderhistory 
ON orderhistory.id_order = o.id_order
AND o.invoice_date >= '2016-12-01'
AND o.invoice_date <= '2017-01-10'
AND orderhistory.id_order_state = 7;
*/


/*
SELECT SQL_CALC_FOUND_ROWS c.`id_customer`, c.`lastname`, c.`firstname`, c.`email`,
COUNT(co.`id_connections`) as totalVisits,
IFNULL((
SELECT ROUND(SUM(IFNULL(op.`amount`, 0) / cu.conversion_rate), 2)
FROM `'._DB_PREFIX_.'orders` o
LEFT JOIN `'._DB_PREFIX_.'order_payment` op ON o.reference = op.order_reference
LEFT JOIN `'._DB_PREFIX_.'currency` cu ON o.id_currency = cu.id_currency
WHERE o.id_customer = c.id_customer
AND o.invoice_date BETWEEN '.$this->getDate().'
AND o.valid
), 0) as totalMoneySpent,
IFNULL((
SELECT COUNT(*)
FROM `'._DB_PREFIX_.'orders` o
WHERE o.id_customer = c.id_customer
AND o.invoice_date BETWEEN '.$this->getDate().'
AND o.valid
), 0) as totalValidOrders
FROM `'._DB_PREFIX_.'customer` c
LEFT JOIN `'._DB_PREFIX_.'guest` g ON c.`id_customer` = g.`id_customer`
LEFT JOIN `'._DB_PREFIX_.'connections` co ON g.`id_guest` = co.`id_guest`
WHERE co.date_add BETWEEN '.$this->getDate()
.Shop::addSqlRestriction(Shop::SHARE_CUSTOMER, 'c').
'GROUP BY c.`id_customer`, c.`lastname`, c.`firstname`, c.`email`';
*/


# Los mejores descuentos
# ROUND(SUM(o.total_paid_real) / o.conversion_rate,2) as ca
/*
SELECT COUNT(ocr.id_cart_rule) as total,cr.code, ocr.name 
FROM ps_order_cart_rule as ocr
LEFT JOIN ps_orders as o 
ON o.id_order = ocr.id_order
LEFT JOIN ps_cart_rule as cr 
ON cr.id_cart_rule = ocr.id_cart_rule
WHERE o.valid = 1
AND o.invoice_date <= "2017-01-09"
GROUP BY ocr.id_cart_rule;
*/

	
/*
SELECT SQL_CALC_FOUND_ROWS p.reference, p.id_product, pl.name,
ROUND(AVG(od.product_price / o.conversion_rate), 2) as avgPriceSold,
IFNULL(stock.quantity, 0) as quantity,
IFNULL(SUM(od.product_quantity), 0) AS totalQuantitySold,
ROUND(IFNULL(IFNULL(SUM(od.product_quantity), 0) / (1 + LEAST(TO_DAYS('.$array_date_between[1].'), TO_DAYS(NOW())) - GREATEST(TO_DAYS('.$array_date_between[0].'), TO_DAYS(product_shop.date_add))), 0), 2) as averageQuantitySold,
ROUND(IFNULL(SUM((od.product_price * od.product_quantity) / o.conversion_rate), 0), 2) AS totalPriceSold,
(
SELECT IFNULL(SUM(pv.counter), 0)
	FROM '._DB_PREFIX_.'page pa
	LEFT JOIN '._DB_PREFIX_.'page_viewed pv ON pa.id_page = pv.id_page
	LEFT JOIN '._DB_PREFIX_.'date_range dr ON pv.id_date_range = dr.id_date_range
	WHERE pa.id_object = p.id_product AND pa.id_page_type = '.(int)Page::getPageTypeByName('product').'
AND dr.time_start BETWEEN '.$date_between.'
AND dr.time_end BETWEEN '.$date_between.'
) AS totalPageViewed,
product_shop.active
FROM '._DB_PREFIX_.'product p
'.Shop::addSqlAssociation('product', 'p').'
LEFT JOIN '._DB_PREFIX_.'product_lang pl ON (p.id_product = pl.id_product AND pl.id_lang = '.(int)$this->getLang().' '.Shop::addSqlRestrictionOnLang('pl').')
LEFT JOIN '._DB_PREFIX_.'order_detail od ON od.product_id = p.id_product
LEFT JOIN '._DB_PREFIX_.'orders o ON od.id_order = o.id_order
'.Shop::addSqlRestriction(Shop::SHARE_ORDER, 'o').'
'.Product::sqlStock('p', 0).'
WHERE o.valid = 1
AND o.invoice_date BETWEEN '.$date_between.'
GROUP BY od.product_id';
*/




/*
SELECT SQL_CALC_FOUND_ROWS ca.`id_category`, CONCAT(parent.name, \' > \', calang.`name`) as name,
IFNULL(SUM(t.`totalQuantitySold`), 0) AS totalQuantitySold,
ROUND(IFNULL(SUM(t.`totalPriceSold`), 0), 2) AS totalPriceSold,
ROUND(IFNULL(SUM(t.`totalWholeSalePriceSold`), 0), 2) AS totalWholeSalePriceSold,
(
	SELECT IFNULL(SUM(pv.`counter`), 0)
	FROM `'._DB_PREFIX_.'page` p
	LEFT JOIN `'._DB_PREFIX_.'page_viewed` pv ON p.`id_page` = pv.`id_page`
	LEFT JOIN `'._DB_PREFIX_.'date_range` dr ON pv.`id_date_range` = dr.`id_date_range`
	LEFT JOIN `'._DB_PREFIX_.'product` pr ON CAST(p.`id_object` AS UNSIGNED INTEGER) = pr.`id_product`
	LEFT JOIN `'._DB_PREFIX_.'category_product` capr2 ON capr2.`id_product` = pr.`id_product`
	WHERE capr.`id_category` = capr2.`id_category`
	AND p.`id_page_type` = 1
	AND dr.`time_start` BETWEEN '.$date_between.'
	AND dr.`time_end` BETWEEN '.$date_between.'
) AS totalPageViewed,
(
    SELECT COUNT(id_category) FROM '._DB_PREFIX_.'category WHERE `id_parent` = ca.`id_category`
) AS hasChildren
FROM `'._DB_PREFIX_.'category` ca
LEFT JOIN `'._DB_PREFIX_.'category_lang` calang ON (ca.`id_category` = calang.`id_category` AND calang.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('calang').')
LEFT JOIN `'._DB_PREFIX_.'category_lang` parent ON (ca.`id_parent` = parent.`id_category` AND parent.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('parent').')
LEFT JOIN `'._DB_PREFIX_.'category_product` capr ON ca.`id_category` = capr.`id_category`
LEFT JOIN (
	SELECT pr.`id_product`, t.`totalQuantitySold`, t.`totalPriceSold`, t.`totalWholeSalePriceSold`
	FROM `'._DB_PREFIX_.'product` pr
	LEFT JOIN (
		SELECT pr.`id_product`, pa.`wholesale_price`,
			IFNULL(SUM(cp.`product_quantity`), 0) AS totalQuantitySold,
			IFNULL(SUM(cp.`product_price` * cp.`product_quantity`), 0) / o.conversion_rate AS totalPriceSold,
			IFNULL(SUM(
				CASE
					WHEN cp.`original_wholesale_price` <> "0.000000"
					THEN cp.`original_wholesale_price` * cp.`product_quantity`
					WHEN pa.`wholesale_price` <> "0.000000"
					THEN pa.`wholesale_price` * cp.`product_quantity`
					WHEN pr.`wholesale_price` <> "0.000000"
					THEN pr.`wholesale_price` * cp.`product_quantity`
				END
			), 0) / o.conversion_rate AS totalWholeSalePriceSold
		FROM `'._DB_PREFIX_.'product` pr
		LEFT OUTER JOIN `'._DB_PREFIX_.'order_detail` cp ON pr.`id_product` = cp.`product_id`
		LEFT JOIN `'._DB_PREFIX_.'orders` o ON o.`id_order` = cp.`id_order`
		LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa ON pa.`id_product_attribute` = cp.`product_attribute_id`
		'.Shop::addSqlRestriction(Shop::SHARE_ORDER, 'o').'
		WHERE o.valid = 1
		AND o.invoice_date BETWEEN '.$date_between.'
		GROUP BY pr.`id_product`
	) t ON t.`id_product` = pr.`id_product`
) t	ON t.`id_product` = capr.`id_product`
'.(($categories) ? 'WHERE ca.id_category IN ('.implode(', ', $categories).')' : '').'
'.$onlyChildren.'
GROUP BY ca.`id_category`
HAVING ca.`id_category` != 1';
*/


# Total de ingresos totales
# El número total en euros que se han pagado
/*
SELECT SUM(orders.total_paid)
from ps_order_history as orderhistory 
LEFT JOIN ps_orders as orders 
ON orders.id_order = orderhistory.id_order  
where orders.date_add >= "2016-01-01"
AND orders.date_add < "2017-01-03"
AND orderhistory.id_order_state = 2
*/

# El total de los produtos vendidos
# Miramos todos los productos de cada pedido
/*
SELECT count(*) 
from ps_order_history as orderhistory 
LEFT JOIN ps_orders as orders 
ON orders.id_order = orderhistory.id_order  
LEFT JOIN ps_order_detail as detalle 
ON detalle.id_order = orderhistory.id_order
where orders.date_add >= "2016-01-01"
AND orders.date_add < "2017-01-03"
AND orderhistory.id_order_state = 2;
*/

# Pedidos llega tarde mayor que 11 dias
/*
SELECT DISTINCT orders.id_order,orders.reference,orders.total_paid,orders.id_customer,orderhistory.date_add,orderhistory.id_order_state 
from ps_order_history as orderhistory 
LEFT JOIN ps_orders as orders 
ON orders.id_order = orderhistory.id_order  
where orders.date_add >= "2016-01-01"
AND orders.date_add < "2017-01-03"
AND orderhistory.id_order_state = 2
OR 
orders.date_add >= "2016-01-01"
AND orders.date_add < "2017-01-03"
AND orderhistory.id_order_state = 4
order by orders.id_order ASC;
*/

# Total de productos vendidos con descuento
/*
SELECT count(*)
from ps_order_history as orderhistory 
LEFT JOIN ps_orders as orders 
ON orders.id_order = orderhistory.id_order  
LEFT JOIN ps_order_detail as detalle 
ON detalle.id_order = orderhistory.id_order
where orders.date_add >= "2016-01-01"
AND orders.date_add <= "2017-01-05"
AND orderhistory.id_order_state = 2
AND orders.total_discounts = 0;
*/

# Compras recurrentes
/*
select * from ps_orders as orders
LEFT JOIN ps_customer as customers 
ON orders.id_customer = customers.id_customer
ORDER BY orders.id_order ASC;
*/

# Total ingresos por categorias
/* 
SELECT categorylang.name,detalle.product_quantity,orders.id_order,orders.reference,orders.total_paid,orders.id_customer,orderhistory.date_add,orderhistory.id_order_state 
from ps_order_history as orderhistory 
LEFT JOIN ps_orders as orders 
ON orders.id_order = orderhistory.id_order  
LEFT JOIN ps_order_detail as detalle 
ON detalle.id_order = orderhistory.id_order
LEFT JOIN ps_category_product as categoryproduct 
ON categoryproduct.id_product = detalle.product_id
LEFT JOIN ps_category_lang as categorylang 
ON categorylang.id_category = categoryproduct.id_category
where orders.date_add >= "2016-01-01"
AND orders.date_add < "2017-01-03"
AND orderhistory.id_order_state = 2
AND categorylang.id_lang = 2;
*/

use sillamaniaes_dos;

/*
 * Filtros de combinaciones
 * de productos en general
 * todos activos y luego
 * filtros pasando el parent
 * para mostrar los hijos
 */


/*
SELECT SQL_CALC_FOUND_ROWS b.*, a.*
FROM `ps_attribute_group` a 
LEFT JOIN `ps_attribute_group_lang` b ON (b.`id_attribute_group` = a.`id_attribute_group` AND b.`id_lang` = 1)
WHERE 1 ORDER BY a.`position` ASC
*/

/*
SELECT SQL_CALC_FOUND_ROWS b.*, a.*
FROM `ps_attribute` a 
LEFT JOIN `ps_attribute_lang` b ON (b.`id_attribute` = a.`id_attribute` AND b.`id_lang` = 1)
WHERE 1  AND a.`id_attribute_group` = 3 
ORDER BY a.`position` ASC
*/


/*
 * Combinaciones de productos
 */

# Tercera query combinaciones 

# Segunda query combinaciones 
# atgl.id_attribute_group as grupo_id,

SELECT m.name AS manufacturer, p.id_product, pl.name,GROUP_CONCAT(DISTINCT(atgl.name) SEPARATOR ",") AS grupo_nombre, GROUP_CONCAT(DISTINCT(atgl.id_attribute_group) SEPARATOR ",") AS grupo_id,GROUP_CONCAT(DISTINCT(al.name) SEPARATOR ",") AS combinations,GROUP_CONCAT(DISTINCT(al.id_attribute) SEPARATOR ",") AS combinations_id, 
GROUP_CONCAT(DISTINCT(cl.name) SEPARATOR ",") AS categories, p.price, pa.price, p.id_tax_rules_group, p.wholesale_price, 
p.reference, p.supplier_reference, p.id_supplier, p.id_manufacturer, p.upc, p.ecotax, p.weight, s.quantity, 
pl.description_short, pl.description, pl.meta_title, pl.meta_keywords, pl.meta_description, pl.link_rewrite, 
pl.available_now, pl.available_later, p.available_for_order, p.date_add, p.show_price, p.online_only, p.condition, 
p.id_shop_default
FROM ps_product p
LEFT JOIN ps_product_lang pl ON (p.id_product = pl.id_product)
LEFT JOIN ps_manufacturer m ON (p.id_manufacturer = m.id_manufacturer)
LEFT JOIN ps_category_product cp ON (p.id_product = cp.id_product)
LEFT JOIN ps_category_lang cl ON (cp.id_category = cl.id_category)
LEFT JOIN ps_category c ON (cp.id_category = c.id_category)
LEFT JOIN ps_stock_available s ON (p.id_product = s.id_product)
LEFT JOIN ps_product_tag pt ON (p.id_product = pt.id_product)
LEFT JOIN ps_product_attribute pa ON (p.id_product = pa.id_product)
LEFT JOIN ps_product_attribute_combination pac ON (pac.id_product_attribute = pa.id_product_attribute)
LEFT JOIN ps_attribute_lang al ON (al.id_attribute = pac.id_attribute)
LEFT JOIN ps_attribute att ON (att.id_attribute = al.id_attribute)
LEFT JOIN ps_attribute_group atg ON (atg.id_attribute_group = att.id_attribute_group)
LEFT JOIN ps_attribute_group_lang atgl ON (atgl.id_attribute_group = atg.id_attribute_group)
WHERE pl.id_lang = 1
AND cl.id_lang = 1
AND p.id_shop_default = 1
AND c.id_shop_default = 1	
AND c.id_category = 3
AND al.id_lang = 1
AND atgl.id_lang = 1
GROUP BY pac.id_product_attribute;

/*
 * Para features
 */
 
/*
use sillamaniaes_dos;
SELECT fp.id_product,fp.id_feature,fp.id_feature_value,fl.name as caracteristica,fvl.value as caracteristica_valor FROM ps_feature_product as fp
left join ps_feature_lang as fl
on fl.id_feature = fp.id_feature
left join ps_feature_value_lang as fvl
on fvl.id_feature_value = fp.id_feature_value
left join ps_category_product as cp
on fp.id_product = cp.id_product
where id_category = 3 and fl.id_lang= 1 and fvl.id_lang= 1 AND fp.id_feature = 5
or id_category = 3 and fl.id_lang= 1 and fvl.id_lang= 1 AND fp.id_feature = 6
or id_category = 3 and fl.id_lang= 1 and fvl.id_lang= 1 AND fp.id_feature = 7
order by id_product;
*/

/*
fvl.name as caracteristica_valor
left join ps_feature_value_lang as fvl
on fvl.id_feature_value = fp.id_feature_value
and fvl.id_lang= 1
OR id_category = 3 AND fp.id_feature = 6
OR id_category = 3 AND fp.id_feature = 7
*/


/*AND c.id_category = 244*/
/*AND c.id_category = 3*/
/*and atgl.id_attribute_group <> 1*/
/*and atgl.id_attribute_group = 1 AND atgl.id_attribute_group = 3*/ 

# Luego para features
/*
SELECT fp.id_product,fp.id_feature,fp.id_feature_value FROM ps_feature_product as fp
left join ps_category_product as cp
on fp.id_product = cp.id_product
where id_category = 3 AND fp.id_feature = 5
OR id_category = 3 AND fp.id_feature = 6
OR id_category = 3 AND fp.id_feature = 7;
*/


/*
# Primera query combinaciones
SELECT m.name AS manufacturer, p.id_product, pl.name, GROUP_CONCAT(DISTINCT(al.name) SEPARATOR ", ") AS combinations, 
GROUP_CONCAT(DISTINCT(cl.name) SEPARATOR ",") AS categories, p.price, pa.price, p.id_tax_rules_group, p.wholesale_price, 
p.reference, p.supplier_reference, p.id_supplier, p.id_manufacturer, p.upc, p.ecotax, p.weight, s.quantity, 
pl.description_short, pl.description, pl.meta_title, pl.meta_keywords, pl.meta_description, pl.link_rewrite, 
pl.available_now, pl.available_later, p.available_for_order, p.date_add, p.show_price, p.online_only, p.condition, 
p.id_shop_default
FROM ps_product p
LEFT JOIN ps_product_lang pl ON (p.id_product = pl.id_product)
LEFT JOIN ps_manufacturer m ON (p.id_manufacturer = m.id_manufacturer)
LEFT JOIN ps_category_product cp ON (p.id_product = cp.id_product)
LEFT JOIN ps_category_lang cl ON (cp.id_category = cl.id_category)
LEFT JOIN ps_category c ON (cp.id_category = c.id_category)
LEFT JOIN ps_stock_available s ON (p.id_product = s.id_product)
LEFT JOIN ps_product_tag pt ON (p.id_product = pt.id_product)
LEFT JOIN ps_product_attribute pa ON (p.id_product = pa.id_product)
LEFT JOIN ps_product_attribute_combination pac ON (pac.id_product_attribute = pa.id_product_attribute)
LEFT JOIN ps_attribute_lang al ON (al.id_attribute = pac.id_attribute)
WHERE pl.id_lang = 1
AND cl.id_lang = 1
AND p.id_shop_default = 1
AND c.id_shop_default = 1
GROUP BY pac.id_product_attribute
*/

/*
 * Caracteristicas en
 * general y luego enviando
 * parametro para las subcaracteristicas
 */

/* 
SELECT SQL_CALC_FOUND_ROWS
b.*, a.*
FROM `ps_feature` a 
LEFT JOIN `ps_feature_lang` b ON (b.`id_feature` = a.`id_feature` AND b.`id_lang` = 1)
WHERE 1  
ORDER BY a.`position` ASC;


 
SELECT SQL_CALC_FOUND_ROWS
b.*, a.*
FROM `ps_feature_value` a 
LEFT JOIN `ps_feature_value_lang` b ON (b.`id_feature_value` = a.`id_feature_value` AND b.`id_lang` = 1)
WHERE 1  AND `id_feature` = 14 AND (a.custom = 0 OR a.custom IS NULL) 
ORDER BY `id_feature` ASC;
*/
 
 
 

