SELECT book.id,title,bookCreator.id,bookId,creatorId
FROM book,bookCreator;

SELECT book.id,title,bookId,creatorId
FROM book,bookCreator
WHERE book.id=bookCreator.bookId;

SELECT book.id,book.title,creator.name
FROM book,bookCreator,creator
WHERE book.id=bookCreator.bookId AND creator.id=bookCreator.creatorId;

SELECT book.id,book.title,creator.name
FROM book
JOIN bookCreator ON book.id=bookCreator.bookId
JOIN creator ON creator.id=bookCreator.creatorId;
