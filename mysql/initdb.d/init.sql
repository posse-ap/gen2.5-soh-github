DROP DATABASE IF EXISTS quizy_db;
CREATE DATABASE quizy_db;
USE quizy_db;

DROP TABLE IF EXISTS big_questions;
CREATE TABLE big_questions (
  id INT PRIMARY KEY,
  pref_name VARCHAR(4)
) CHARSET=utf8;

INSERT INTO big_questions(id, pref_name) VALUES (1, '東京'), (2, '広島');