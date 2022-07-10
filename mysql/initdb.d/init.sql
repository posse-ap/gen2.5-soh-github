DROP DATABASE IF EXISTS quizy_db;
CREATE DATABASE quizy_db;
USE quizy_db;

CREATE TABLE big_questions (
  pref_id INT,
  pref_name VARCHAR(255)
) CHARSET=utf8;

INSERT INTO big_questions(pref_id, pref_name) VALUES (1, '東京'), (2, '広島');