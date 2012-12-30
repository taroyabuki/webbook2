SELECT DISTINCT publisher FROM book;
 
SELECT publisher, AVG(price)
FROM book
GROUP BY publisher;
 
SELECT publisher, AVG(price) AS x
FROM book
GROUP BY (publisher)
HAVING x>5000;
 
SELECT title,price
FROM book
ORDER BY price;

