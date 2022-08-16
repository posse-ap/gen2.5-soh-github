DROP DATABASE IF EXISTS quizy_db;
CREATE DATABASE quizy_db;
USE quizy_db;

-- BIG_QUESTIONS
DROP TABLE IF EXISTS big_questions;
CREATE TABLE big_questions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  pref_name VARCHAR(4)
) CHARSET=utf8;

INSERT INTO big_questions(pref_name) VALUES ('東京'), ('広島');

-- QUESTIONS
DROP TABLE IF EXISTS questions;
CREATE TABLE questions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  big_question_id INT,
  img VARCHAR(140),
  FOREIGN KEY (big_question_id) REFERENCES big_questions(id)
) CHARSET=utf8;

INSERT INTO questions(big_question_id, img) VALUES 
    (1, 'takanawa.png'),
    (1, 'kameido.png'),
    (2, 'mukainada.png');

-- CHOICES
DROP TABLE IF EXISTS choices;
CREATE TABLE choices (
  id INT AUTO_INCREMENT PRIMARY KEY,
  question_id INT,
  name VARCHAR(140),
  valid INT,
  FOREIGN KEY (question_id) REFERENCES questions(id)

) CHARSET=utf8;

INSERT INTO choices(question_id, name, valid) VALUES
    (1, 'たかなわ', 1),
    (1, 'たかわ', 0),
    (1, 'こうわ', 0),
    (2, 'かめいど', 1),
    (2, 'かめと', 0),
    (2, 'かめど', 0),
    (3, 'むかいなだ', 1),
    (3, 'むこうひら', 0),
    (3, 'むきひら', 0);