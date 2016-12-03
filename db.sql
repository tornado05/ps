DROP SCHEMA IF EXISTS test;

CREATE SCHEMA test DEFAULT CHARSET utf8;

USE test;

CREATE TABLE User(
  id_user INTEGER AUTO_INCREMENT,
  login   VARCHAR(20) NOT NULL,
  pw      VARCHAR(50) NOT NULL,
  CONSTRAINT pkId_user PRIMARY KEY (id_user),
  CONSTRAINT uLogin UNIQUE(login)
);

INSERT INTO User(login, pw) VALUE
('root', md5('1'));

INSERT INTO User(login, pw) VALUES
('admin', md5('1')),
('just_user', md5('1'));

SELECT * FROM User;

SELECT id_user FROM User WHERE login = 'root' AND pw = md5('1');