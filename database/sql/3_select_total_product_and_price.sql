SELECT od.product_id , SUM(od.qrt) AS qty , CAST(od.price AS INTEGER )  AS price  
,  CAST(od.price AS INTEGER ) * SUM(od.qrt) AS total_price , p.`name` , p.image_product_id 
FROM order_detail od
JOIN order_header o 
ON od.order_header_id = o.id
JOIN product p
ON od.product_id = p.product_id
WHERE od.seller_id = 70 AND o.`status` = 'COMPLETED' GROUP BY od.product_id;