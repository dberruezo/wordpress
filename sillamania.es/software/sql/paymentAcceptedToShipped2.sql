use ted_web_live;
# pais_lang.name as pais,
# direccion.city,

/*
SELECT customer.firstname,customer.lastname,customer.email,orders.reference,orders.total_paid,orders.id_customer,orderhistory.date_add,orderhistory.id_order,orderhistory.id_order_state 
from ps_order_history as orderhistory 
LEFT JOIN ps_orders as orders 
ON orders.id_order = orderhistory.id_order  
LEFT JOIN ps_customer as customer
ON orders.id_customer = customer.id_customer
where orderhistory.date_add >= "2016/10/01"
and orderhistory.date_add <= "2016/10/15"
and orderhistory.id_order_state = 4
order by orders.id_order;
*/

# Consulta para ver los pedidos
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
where orders.date_add >= "2016/10/01"
AND orders.date_add < "2016/10/24"
AND orders.current_state = orderhistory.id_order_state 
AND pais_lang.id_lang = 1
AND statelang.id_lang = 1
GROUP BY (orders.id_order)
order by orders.id_order ASC;
*/



# Consulta para ver los pedidos resultantes con estados 2 y 4
/*
SELECT orders.id_order,pais_lang.name as pais,direccion.city,orders.reference,orders.total_paid,customer.firstname,customer.lastname,customer.email,orders.id_customer,orderhistory.date_add,orderhistory.id_order_state,statelang.name as nombreestado
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
ON statelang.id_order_state = orderhistory.id_order_state
where orderhistory.id_order = 92
AND orderhistory.id_order_state = 2
AND pais_lang.id_lang = 1
AND statelang.id_lang = 1
OR orderhistory.id_order = 92
AND orderhistory.id_order_state = 4
AND pais_lang.id_lang = 1
AND statelang.id_lang = 1;
*/

# Consulta para ver las categorias de los pedidos
SELECT DISTINCT orders.date_add,catlang.name,catproduct.id_category,orderdetail.product_id,pais_lang.name as pais,direccion.city,orders.reference,orders.total_paid,customer.firstname,customer.lastname,customer.email,orders.id_customer,orderhistory.date_add,orderhistory.id_order,orderhistory.id_order_state 
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
ON statelang.id_order_state = orderhistory.id_order_state
LEFT JOIN ps_order_detail as orderdetail 
ON orderdetail.id_order = orders.id_order
LEFT JOIN ps_category_product as catproduct 
ON catproduct.id_product = orderdetail.product_id  
LEFT JOIN ps_category_lang as catlang 
ON catlang.id_category = catproduct.id_category
where orderhistory.id_order = 92
AND orderhistory.id_order_state = 2
AND pais_lang.id_lang = 1
AND statelang.id_lang = 1
AND catlang.id_lang = 1
AND catproduct.id_category <> 3
AND catproduct.id_category <> 70
AND catproduct.id_category <> 71
AND catproduct.id_category <> 72
AND catproduct.id_category <> 73
AND catproduct.id_category <> 189
AND catproduct.id_category <> 253;


