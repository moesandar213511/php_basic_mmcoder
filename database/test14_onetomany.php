 <!-- one to many -->

SELECT * FROM articles
LEFT JOIN
category
ON
articles.category_id = category.id

SELECT *,category.name as category_name FROM articles 
LEFT JOIN category 
ON 
articles.category_id = category.id
