# 11 dias desde payment acceped hasta shipped
use prestashopprueba;

# con categorias
/*
SELECT catlang.name,catproduct.id_category,orderdetail.product_id,pais_lang.name as pais,direccion.city,orders.reference,orders.total_paid,customer.firstname,customer.lastname,customer.email,orders.id_customer,orderhistory.date_add,orderhistory.id_order,orderhistory.id_order_state 
from ps_order_history as orderhistory  
LEFT JOIN ps_orders as orders 
ON orders.id_order = orderhistory.id_order
LEFT JOIN ps_order_detail as orderdetail 
ON orderdetail.id_order = orders.id_order
LEFT JOIN ps_category_product as catproduct 
ON catproduct.id_product = orderdetail.product_id  
LEFT JOIN ps_category_lang as catlang 
ON catlang.id_category = catproduct.id_category
LEFT JOIN ps_customer as customer
ON orders.id_customer = customer.id_customer
LEFT JOIN ps_address as direccion
ON direccion.id_customer = customer.id_customer
LEFT JOIN ps_country as pais
ON direccion.id_country = pais.id_country
LEFT JOIN ps_country_lang as pais_lang
ON pais_lang.id_country = pais.id_country
where orderhistory.date_add >= '2016/12/01'
and orderhistory.date_add <= '2016/12/31'
and orderhistory.id_order_state = 2
and pais_lang.id_lang = 1
and catlang.id_lang = 1
OR orderhistory.date_add >= '2016/12/01'
and orderhistory.date_add <= '2016/12/31'
and orderhistory.id_order_state = 4
and pais_lang.id_lang = 1
and catlang.id_lang = 1
order by orders.id_order;
*/



SELECT pais_lang.name as pais,direccion.city,orders.reference,orders.total_paid,customer.firstname,customer.lastname,customer.email,orders.id_customer,orderhistory.date_add,orderhistory.id_order,orderhistory.id_order_state from ps_order_history as orderhistory 
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
where orderhistory.date_add >= "2016/11/16"
and orderhistory.date_add <= "2016/12/31"
and orderhistory.id_order_state = 2
and pais_lang.id_lang = 1 
OR orderhistory.date_add >= "2016/11/16"
and orderhistory.date_add <= "2016/12/31"
and orderhistory.id_order_state = 4
and pais_lang.id_lang = 1;
