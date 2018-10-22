use prestashop16;

SELECT psi.id_image,psp.id_product,psp.reference,psp.id_category_default
FROM ps_product as psp
LEFT JOIN ps_image as psi
ON psp.id_product = psi.id_product
WHERE psp.reference = "demo_1" or
psp.reference = "demo_2" or
psp.reference = "demo_3" or
psp.reference = "demo_4" or
psp.reference = "demo_5" or
psp.reference = "demo_6" or
psp.reference = "demo_7";



/*
left join from ps_product_attribute as psa
on psa.id_product = psp.id_product
left join ps_attribute
*/