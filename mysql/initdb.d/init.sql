DROP DATABASE IF EXISTS webapp_db;
CREATE DATABASE webapp_db;
USE webapp_db;



-- contents_list
DROP TABLE IF EXISTS contents_list;
CREATE TABLE contents_list  (
  content_id VARCHAR(2) NOT NULL PRIMARY KEY,
  learning_content VARCHAR(20) NOT NULL
) CHARSET=utf8;

INSERT INTO contents_list(content_id, learning_content) VALUES
    ('C0', 'N予備校'),
    ('C1', 'ドットインストール'),
    ('C2', 'POSSE課題');



-- languages_list
DROP TABLE IF EXISTS languages_list;
CREATE TABLE languages_list  (
  language_id VARCHAR(2) NOT NULL PRIMARY KEY,
  learning_language VARCHAR(20) NOT NULL
) CHARSET=utf8;

INSERT INTO languages_list(language_id, learning_language) VALUES
    ('L0', 'HTML'),
    ('L1', 'CSS'),
    ('L2', 'JavaScript'),
    ('L3', 'PHP'),
    ('L4', 'Laravel'),
    ('L5', 'SQL'),
    ('L6', 'SHELL'),
    ('L7', '情報システム基礎知識（その他）');



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
  contents_id VARCHAR(2) NOT NULL,
  FOREIGN KEY (hist_id) REFERENCES learned_history(id),
  FOREIGN KEY (contents_id) REFERENCES contents_list(content_id)
) CHARSET=utf8;

INSERT INTO learned_contents(hist_id, contents_id) VALUES
    (1, 'C0'),
    (2, 'C0'),
    (3, 'C0'),
    (4, 'C1'),
    (4, 'C2'),
    (5, 'C0'),
    (6, 'C0'),
    (6, 'C1'),
    (7, 'C2');



-- learned_languages
DROP TABLE IF EXISTS learned_languages;
CREATE TABLE learned_languages  (
  id INT AUTO_INCREMENT PRIMARY KEY,
  hist_id INT NOT NULL,
  languages_id VARCHAR(2) NOT NULL,
  FOREIGN KEY (hist_id) REFERENCES learned_history(id),
  FOREIGN KEY (languages_id) REFERENCES languages_list(language_id)
) CHARSET=utf8;

INSERT INTO learned_languages(hist_id, languages_id) VALUES
    (1, 'L0'),
    (2, 'L0'),
    (2, 'L1'),
    (3, 'L1'),
    (4, 'L1'),
    (4, 'L2'),
    (5, 'L1'),
    (6, 'L0'),
    (6, 'L1'),
    (6, 'L2'),
    (7, 'L1'),
    (7, 'L2'),
    (7, 'L3');