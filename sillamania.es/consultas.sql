use sillamaniaes;

/*
 * Consultas para sillamania
 */
 
 
/* Consulta mejores productos*/
/* Fuente de información modulo statsbestproducts función getData */
/* Lo miramos por estadisticas del panel de control */


/*
SELECT SQL_CALC_FOUND_ROWS p.reference, p.id_product, pl.name,
ROUND(AVG(od.product_price / o.conversion_rate), 2) as avgPriceSold,
IFNULL(stock.quantity, 0) as quantity,
IFNULL(SUM(od.product_quantity), 0) AS totalQuantitySold,
ROUND(IFNULL(IFNULL(SUM(od.product_quantity), 0) / (1 + LEAST(TO_DAYS('01/09/2018'), TO_DAYS(NOW())) - GREATEST(TO_DAYS('31/09/2018'), TO_DAYS(product_shop.date_add))), 0), 2) as averageQuantitySold,
ROUND(IFNULL(SUM((od.product_price * od.product_quantity) / o.conversion_rate), 0), 2) AS totalPriceSold,
(
	SELECT IFNULL(SUM(pv.counter), 0)
	FROM '._DB_PREFIX_.'page pa
	LEFT JOIN '._DB_PREFIX_.'page_viewed pv ON pa.id_page = pv.id_page
	LEFT JOIN '._DB_PREFIX_.'date_range dr ON pv.id_date_range = dr.id_date_range
	WHERE pa.id_object = p.id_product AND pa.id_page_type = '.(int)Page::getPageTypeByName('product').'
	AND dr.time_start BETWEEN '01/09/2018'
	AND dr.time_end BETWEEN '31/09/2018'
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


/* Consulta productos por categoria */
/* Fuente de información clase Category función getProducts */

/*
'SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) AS quantity'.(Combination::isFeatureActive() ? ', IFNULL(product_attribute_shop.id_product_attribute, 0) AS id_product_attribute,
					product_attribute_shop.minimal_quantity AS product_attribute_minimal_quantity' : '').', pl.`description`, pl.`description_short`, pl.`available_now`,
					pl.`available_later`, pl.`link_rewrite`, pl.`meta_description`, pl.`meta_keywords`, pl.`meta_title`, pl.`name`, image_shop.`id_image` id_image,
					il.`legend` as legend, m.`name` AS manufacturer_name, cl.`name` AS category_default,
					DATEDIFF(product_shop.`date_add`, DATE_SUB("'.date('Y-m-d').' 00:00:00",
					INTERVAL '.(int) $nbDaysNewProduct.' DAY)) > 0 AS new, product_shop.price AS orderprice
				FROM `'._DB_PREFIX_.'category_product` cp
				LEFT JOIN `'._DB_PREFIX_.'product` p
					ON p.`id_product` = cp.`id_product`
				'.Shop::addSqlAssociation('product', 'p').
                (Combination::isFeatureActive() ? ' LEFT JOIN `'._DB_PREFIX_.'product_attribute_shop` product_attribute_shop
				ON (p.`id_product` = product_attribute_shop.`id_product` AND product_attribute_shop.`default_on` = 1 AND product_attribute_shop.id_shop='.(int) $context->shop->id.')':'').'
				'.Product::sqlStock('p', 0).'
				LEFT JOIN `'._DB_PREFIX_.'category_lang` cl
					ON (product_shop.`id_category_default` = cl.`id_category`
					AND cl.`id_lang` = '.(int) $idLang.Shop::addSqlRestrictionOnLang('cl').')
				LEFT JOIN `'._DB_PREFIX_.'product_lang` pl
					ON (p.`id_product` = pl.`id_product`
					AND pl.`id_lang` = '.(int) $idLang.Shop::addSqlRestrictionOnLang('pl').')
				LEFT JOIN `'._DB_PREFIX_.'image_shop` image_shop
					ON (image_shop.`id_product` = p.`id_product` AND image_shop.cover=1 AND image_shop.id_shop='.(int)$context->shop->id.')
				LEFT JOIN `'._DB_PREFIX_.'image_lang` il
					ON (image_shop.`id_image` = il.`id_image`
					AND il.`id_lang` = '.(int) $idLang.')
				LEFT JOIN `'._DB_PREFIX_.'manufacturer` m
					ON m.`id_manufacturer` = p.`id_manufacturer`
				WHERE product_shop.`id_shop` = '.(int) $context->shop->id.'
					AND cp.`id_category` = '.(int) $this->id
                    .($active ? ' AND product_shop.`active` = 1' : '')
                    .($front ? ' AND product_shop.`visibility` IN ("both", "catalog")' : '')
                    .($idSupplier ? ' AND p.id_supplier = '.(int)$idSupplier : '');
*/