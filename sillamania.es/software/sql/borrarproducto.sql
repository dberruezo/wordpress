/*
 * Borramos un producto de prestashop 
 */
 
/*
DELETE * FROM ps_product as prod
LEFT JOIN ps_product_shop as prodshop 
ON prod.id_product = prodshop.id_product
WHERE prod.id_product = 8;
*/

use prestashopprueba;

DELETE FROM ps_product
WHERE id_product = 8;

DELETE FROM ps_product_shop
WHERE id_product = 8;

DELETE FROM ps_feature_product
WHERE id_product = 8;

DELETE FROM ps_product_lang
WHERE id_product = 8;

DELETE FROM ps_category_product
WHERE id_product = 8;

DELETE FROM ps_product_tag
WHERE id_product = 8;

DELETE FROM ps_tag
WHERE id_product = 8;

DELETE FROM ps_image
WHERE id_product = 8;

DELETE FROM ps_image_lang
WHERE id_product = 8;

DELETE FROM ps_image_shop
WHERE id_product = 8;

DELETE FROM ps_specific_price
WHERE id_product = 8;

DELETE FROM ps_specific_price_priority
WHERE id_product = 8;

DELETE FROM ps_product_carrier
WHERE id_product = 8;

DELETE FROM ps_cart_product
WHERE id_product = 8;

DELETE FROM ps_product_attachment
WHERE id_product = 8;

DELETE FROM ps_product_country_tax
WHERE id_product = 8;

DELETE FROM ps_product_download
WHERE id_product = 8;

DELETE FROM ps_product_group_reduction_cache
WHERE id_product = 8;

DELETE FROM ps_product_sale
WHERE id_product = 8;

DELETE FROM ps_product_supplier
WHERE id_product = 8;

DELETE FROM ps_product_supplier
WHERE id_product = 8;

DELETE FROM ps_warehouse_product_location
WHERE id_product = 8;

DELETE FROM ps_stock
WHERE id_product = 8;

DELETE FROM ps_stock_available
WHERE id_product = 8;

DELETE FROM ps_stock_mvt
WHERE id_product = 8;

DELETE FROM ps_customization
WHERE id_product = 8;

DELETE FROM ps_customization_field
WHERE id_product = 8;

DELETE FROM ps_supply_order_detail
WHERE id_product = 8;

DELETE FROM ps_attribute_impact
WHERE id_product = 8;

DELETE FROM ps_product_attribute
WHERE id_product = 8;

DELETE FROM ps_product_attribute_shop
WHERE id_product = 8;

DELETE FROM ps_product_attribute_combination
WHERE id_product = 8;

DELETE FROM ps_product_attribute_image
WHERE id_product = 8;

DELETE FROM ps_attribute_impact
WHERE id_product = 8;

DELETE FROM ps_attribute_lang
WHERE id_product = 8;

DELETE FROM ps_attribute_group
WHERE id_product = 8;

DELETE FROM ps_attribute_group_lang
WHERE id_product = 8;

DELETE FROM ps_attribute_group_shop
WHERE id_product = 8;

DELETE FROM ps_attribute_shop
WHERE id_product = 8;

DELETE FROM ps_product_attribute
WHERE id_product = 8;

DELETE FROM ps_product_attribute_shop
WHERE id_product = 8;

DELETE FROM ps_product_attribute_combination
WHERE id_product = 8;

DELETE FROM ps_product_attribute_image
WHERE id_product = 8;

DELETE FROM ps_stock_available
WHERE id_product = 8;

DELETE FROM ps_manufacturer
WHERE id_product = 8;

DELETE FROM ps_manufacturer_lang
WHERE id_product = 8;

DELETE FROM ps_manufacturer_shop
WHERE id_product = 8;

DELETE FROM ps_supplier
WHERE id_product = 8;

DELETE FROM ps_supplier
WHERE id_product = 8;

DELETE FROM ps_supplier_lang
WHERE id_product = 8;

DELETE FROM ps_supplier_shop
WHERE id_product = 8;

DELETE FROM ps_customization
WHERE id_product = 8;

DELETE FROM ps_customization_field
WHERE id_product = 8;

DELETE FROM customization_field_lang
WHERE id_product = 8;

DELETE FROM customized_data
WHERE id_product = 8;

DELETE FROM feature
WHERE id_product = 8;

DELETE FROM feature_lang
WHERE id_product = 8;

DELETE FROM feature_product
WHERE id_product = 8;

DELETE FROM feature_shop
WHERE id_product = 8;

DELETE FROM feature_value
WHERE id_product = 8;

DELETE FROM feature_value_lang
WHERE id_product = 8;

DELETE FROM pack
WHERE id_product = 8;

DELETE FROM search_index
WHERE id_product = 8;

DELETE FROM search_word
WHERE id_product = 8;

DELETE FROM specific_price
WHERE id_product = 8;

DELETE FROM specific_price_priority
WHERE id_product = 8;

DELETE FROM specific_price_rule
WHERE id_product = 8;

DELETE FROM specific_price_rule_condition
WHERE id_product = 8;

DELETE FROM specific_price_rule_condition_group
WHERE id_product = 8;

DELETE FROM stock
WHERE id_product = 8;

DELETE FROM stock_available
WHERE id_product = 8;

DELETE FROM stock_mvt
WHERE id_product = 8;

DELETE FROM warehouse
WHERE id_product = 8;