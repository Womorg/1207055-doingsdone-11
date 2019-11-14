USE doings_done;

INSERT INTO user (email,name,password)
VALUES
('email1@example.com','Кирилл','123'),
('email2@example.com','Александр','1234'),
('email3@example.com','Алексей','12345');

INSERT INTO project(user,name) VALUES
(1,'Входящие'),
(3,'Учеба'),
(1,'Работа'),
(3,'Домашние дела'),
(2,'Авто');

INSERT INTO task (user_id,project_id,status,title)
VALUES
(1,3,0,'Собеседование в IT компании'),
(2,3,0,'Выполнить тестовое задание'),
(3,2,1,'Сделать задание первого раздела'),
(1,1,0,'Встреча с другом'),
(3,4,0,'Купить корм для кота'),
(1,4,0,'Заказать пиццу');

SELECT * FROM task WHERE user_id = 1;

SELECT * FROM task WHERE project_id = 3;

UPDATE task SET STATUS = 1 WHERE task.id = 2;
SELECT * FROM task;

UPDATE task SET title = "Встреча с родителями" WHERE id = 4;
SELECT * FROM task;