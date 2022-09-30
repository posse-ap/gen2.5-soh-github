DROP DATABASE IF EXISTS webapp_db;
CREATE DATABASE webapp_db;
USE webapp_db;



-- contents_list
DROP TABLE IF EXISTS contents_list;
CREATE TABLE contents_list  (
  id INT AUTO_INCREMENT PRIMARY KEY,
  learning_content VARCHAR(20) NOT NULL
) CHARSET=utf8;

INSERT INTO contents_list(learning_content) VALUES
    ('N予備校'),
    ('ドットインストール'),
    ('POSSE課題');



-- languages_list
DROP TABLE IF EXISTS languages_list;
CREATE TABLE languages_list  (
  id INT AUTO_INCREMENT PRIMARY KEY,
  learning_language VARCHAR(20) NOT NULL
) CHARSET=utf8;

INSERT INTO languages_list(learning_language) VALUES
    ('HTML'),
    ('CSS'),
    ('JavaScript'),
    ('PHP'),
    ('Laravel'),
    ('SQL'),
    ('SHELL'),
    ('情報システム基礎知識（その他）');



-- learned_history
DROP TABLE IF EXISTS learned_history;
CREATE TABLE learned_history  (
  id INT AUTO_INCREMENT PRIMARY KEY,
  learned_date DATE NOT NULL,
  learned_hour INT NOT NULL
) CHARSET=utf8;

INSERT INTO learned_history(learned_date, learned_hour) VALUES
    ('2022-08-20', 1),
    ('2022-08-23', 1),
    ('2022-08-30', 1),
    ('2022-09-03', 3),
    ('2022-09-04', 1),
    ('2022-09-05', 8),
    ('2022-09-06', 5);



-- learned_contents
DROP TABLE IF EXISTS learned_contents;
CREATE TABLE learned_contents  (
  id INT AUTO_INCREMENT PRIMARY KEY,
  hist_id INT NOT NULL,
  contents_id INT NOT NULL,
  FOREIGN KEY (hist_id) REFERENCES learned_history(id),
  FOREIGN KEY (contents_id) REFERENCES contents_list(id)
) CHARSET=utf8;

INSERT INTO learned_contents(hist_id, contents_id) VALUES
    (1, '1'),
    (2, '1'),
    (3, '1'),
    (4, '2'),
    (4, '3'),
    (5, '1'),
    (6, '1'),
    (6, '2'),
    (7, '3');



-- learned_languages
DROP TABLE IF EXISTS learned_languages;
CREATE TABLE learned_languages  (
  id INT AUTO_INCREMENT PRIMARY KEY,
  hist_id INT NOT NULL,
  languages_id INT NOT NULL,
  FOREIGN KEY (hist_id) REFERENCES learned_history(id),
  FOREIGN KEY (languages_id) REFERENCES languages_list(id)
) CHARSET=utf8;

INSERT INTO learned_languages(hist_id, languages_id) VALUES
    (1, '1'),
    (2, '1'),
    (2, '2'),
    (3, '2'),
    (4, '2'),
    (4, '3'),
    (5, '2'),
    (6, '1'),
    (6, '2'),
    (6, '3'),
    (7, '2'),
    (7, '3'),
    (7, '4');