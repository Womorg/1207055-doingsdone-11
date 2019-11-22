USE doings_done;

INSERT INTO users (email,name,password)
VALUES
('email1@example.com','Кирилл','123'),
('email2@example.com','Александр','1234'),
('email3@example.com','Алексей','12345');

INSERT INTO projects (user_id,name,alias) VALUES
(1,'Входящие', 'incoming'),
(3,'Учеба', 'study'),
(1,'Работа', 'job'),
(3,'Домашние дела', 'houseworks'),
(2,'Авто', 'auto');

INSERT INTO tasks (user_id,project_id,status,title, deadline)
VALUES
(1,3,0,'Собеседование в IT компании','2019-11-23 19:30:49' ),
(2,3,0,'Выполнить тестовое задание', '2019-11-24 19:30:49'),
(3,2,0,'Сделать задание первого раздела', '2019-11-22 19:30:49'),
(1,1,0,'Встреча с другом', '2019-11-25 19:30:49'),
(3,4,1,'Купить корм для кота', '2019-11-26 19:30:49'),
(3,4,0,'Заказать пиццу', '2019-11-27 19:30:49');

SELECT * FROM tasks WHERE user_id = 1;

SELECT * FROM tasks WHERE project_id = 3;

UPDATE tasks SET STATUS = 1 WHERE tasks.id = 2;
SELECT * FROM tasks;

UPDATE tasks SET title = "Встреча с родителями" WHERE id = 4;
SELECT * FROM tasks;
