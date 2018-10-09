/*
Hombre
74 - sudadera - 50$
75 - Con capucha - 55$
76 - Chaquetas- 60$
77 - Camisetas - 30$
78 - Tirantes - 25$
198 - Pantalones cortos - 40$
200 - Long t-shirt - 30$
192 - Calcetines - 15$
195 - Chándals - 40$
250 - Bañador - 40$
Mujer:
79 - Sudadera - 50$
80- Con capucha - 55$
81 - Con cremallera - 60$
82 - Camisetas - 30$
83 - Tirantes - 25$
194 - Crop tops - 25$
196 - Shorts - 25$
199 - Leggings - 30$
207 - bikinis - 40$
HOGAR:
201 - cojines - 20$
203 - toalla - 40$
204 - mantas - 40$
206 - posters - 50$
*/
use ted_web_live;

UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 50
where category.id_category = 74;

UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 55
where category.id_category = 75;

UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 60
where category.id_category = 76;

UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 30
where category.id_category = 77;

UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 25
where category.id_category = 78;


UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 40
where category.id_category = 198;


UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 30
where category.id_category = 200;

UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 15
where category.id_category = 192;


UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 40
where category.id_category = 195;


UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 40
where category.id_category = 250;

UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 50
where category.id_category = 79;

UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 55
where category.id_category = 80;

UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 60
where category.id_category = 81;

UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 30
where category.id_category = 82;


UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 25
where category.id_category = 83;


UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 25
where category.id_category = 194;


UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 25
where category.id_category = 196;


UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 30
where category.id_category = 199;

UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 40
where category.id_category = 207;

UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 20
where category.id_category = 201;

UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 20
where category.id_category = 201;

UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 40
where category.id_category = 203;

UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 40
where category.id_category = 204;


UPDATE ps_product_shop as shop 
JOIN ps_category_product as category 
ON shop.id_product = category.id_product  
SET shop.price = 50
where category.id_category = 206;
