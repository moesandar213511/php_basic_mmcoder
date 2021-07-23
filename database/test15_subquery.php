 <!-- Subquery -->
SELECT count(id) as article_count FROM articles WHERE category_id = 1 

SELECT *,
(SELECT count(id) FROM articles WHERE articles.category_id = category.id) as article_count
FROM category