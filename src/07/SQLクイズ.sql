-- 1
SELECT title,price
FROM book;

-- 2
SELECT *
FROM book
WHERE title LIKE '%プログラ%';

-- 3
SELECT bookId,creatorId
FROM bookCreator
WHERE bookId=4;

-- 4
SELECT bookId,creator.name
FROM bookCreator
JOIN creator ON creator.id=creatorId
WHERE bookId=4;

-- 5
SELECT book.title,creator.name
FROM bookCreator
JOIN creator ON creator.id=creatorId
JOIN book ON bookId=book.id
WHERE bookId=4;

-- 6
SELECT id,title,price
FROM book
ORDER BY price DESC;

-- 7
SELECT SUM(price)
FROM book;

-- 8
SELECT AVG(price)
FROM book;

-- 9
SELECT publisher,AVG(price)
FROM book
GROUP BY publisher;

-- 10
SELECT name,COUNT(bookid) AS c
FROM creator
JOIN bookCreator ON bookCreator.creatorId=creator.id
GROUP BY creatorId
ORDER BY c DESC;

-- 11
SELECT name,COUNT(bookid) AS c
FROM creator
JOIN bookCreator ON bookCreator.creatorId=creator.id
GROUP BY creatorId
HAVING c>1;
