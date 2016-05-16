CREATE TABLE book(
  id INT AUTO_INCREMENT PRIMARY KEY,
  isbn CHAR(13) DEFAULT '' NOT NULL,
  title TEXT NOT NULL,
  publisher VARCHAR(50) DEFAULT '' NOT NULL,
  year INT DEFAULT 0 NOT NULL,
  price INT DEFAULT 0 NOT NULL,
  UNIQUE (isbn)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO book VALUES (1,'9784756144119','The Art of Computer Programming 1',
                         'アスキー',2004,10290);
INSERT INTO book VALUES (2,'9784756142818','フリーソフトウェアと自由な社会',
                         'アスキー',2003,3360);
INSERT INTO book VALUES (3,'9784894711631','計算機プログラムの構造と解釈',
                         'ピアソンエデュケーション',2000,4830);
INSERT INTO book VALUES (4,'9784756136497','プログラミング作法','アスキー',2000,2940);
INSERT INTO book VALUES (5,'9784756140845','ハッカーズ大辞典','アスキー',2002,3990);

CREATE TABLE creator(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO creator (id,name) VALUES
(1,'Donald E. Knuth'),
(2,'有澤 誠'),
(3,'和田 英一'),
(4,'青木 孝'),
(5,'筧 一彦'),
(6,'鈴木 健一'),
(7,'長尾 高弘'),
(8,'Richard M. Stallman'),
(9,'Gerald Jay Sussman'),
(10,'Julie Sussman'),
(11,'Harold Abelson'),
(12,'Brian Kernighan'),
(13,'Rob Pike'),
(14,'福崎 俊博'),
(15,'Eric S. Raymond'),
(16,'Guy L., Jr. Steele');

CREATE TABLE bookCreator(
  id int AUTO_INCREMENT PRIMARY KEY,
  bookId INT NOT NULL,
  creatorId INT NOT NULL,
  role VARCHAR(10) DEFAULT '' NOT NULL,
  FOREIGN KEY (bookId) REFERENCES book(id),
  FOREIGN KEY (creatorId) REFERENCES creator(id)
) ENGINE=InnoDB;

INSERT INTO bookCreator (bookId,creatorId) VALUES
 (1,1), (1,2), (1,3), (1,4), (1,5),
 (1,6), (1,7), (2,8), (2,7), (3,9),
 (3,10), (3,11), (3,3), (4,12), (4,13),
 (4,14), (5,15), (5,14), (5,16);
