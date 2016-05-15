-- テーブルの作成

DROP TABLE IF EXISTS zip;

CREATE TABLE zip(
  id INT AUTO_INCREMENT PRIMARY KEY,
  jis CHAR(10) DEFAULT '' NOT NULL,
  oldcode CHAR(5) NOT NULL,
  code CHAR(7) NOT NULL,
  address1ruby VARCHAR(10) DEFAULT '' NOT NULL,
  address2ruby TEXT NOT NULL,
  address3ruby TEXT NOT NULL,
  address1 VARCHAR(10) DEFAULT '' NOT NULL,
  address2 TEXT NOT NULL,
  address3 TEXT NOT NULL,
  address4 TEXT NOT NULL,
  officeruby TEXT NOT NULL,
  office TEXT NOT NULL,
  KEY (code)
) DEFAULT CHARACTER SET utf8;


-- 住所の郵便番号のインポート

LOAD DATA LOCAL INFILE "~/ken_all_utf8.csv" INTO TABLE zip
FIELDS TERMINATED BY ',' ENCLOSED BY '"'
(jis,oldcode,code,address1ruby,address2ruby,address3ruby,address1,address2,address3);


-- 大口事業所等個別番号のインポート

LOAD DATA LOCAL INFILE "~/jigyosyo_utf8.csv" INTO TABLE zip
FIELDS TERMINATED BY ',' ENCLOSED BY '"'
(jis,officeruby,office,address1,address2,address3,address4,code,oldcode);


-- 結果の確認

SELECT * FROM zip limit 10\G