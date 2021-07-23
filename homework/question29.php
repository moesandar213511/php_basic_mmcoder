1.
// LEFT JOIN

SELECT * FROM users
LEFT JOIN
user_details
ON
users.id = user_details.user_id

// RIGHT JOIN

SELECT * FROM users
RIGHT JOIN
user_details
ON
users.id = user_details.user_id


// INNER JOIN

SELECT * FROM users
INNER JOIN
user_details
ON
users.id  = user_details.user_id


2. sql subquery 

SELECT *, 
(SELECT count(id) FROM posts WHERE posts.user_id = users.id) as posts_count
FROM users

3. 

SELECT users.id,users.name,user_details.about FROM users
LEFT JOIN user_details
ON
address_table.id = user_table.address_id

