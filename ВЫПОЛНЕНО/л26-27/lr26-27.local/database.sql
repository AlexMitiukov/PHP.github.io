create database pssip;


use pssip;
CREATE TABLE Категория (
    idКатегории INT PRIMARY KEY AUTO_INCREMENT,
    Название VARCHAR(255) NOT NULL
);

INSERT INTO Категория
VALUES (1, 'Деревянные'),
	   (2, 'Бетонные');

use pssip;
CREATE TABLE Товары (
    IdТовара INT PRIMARY KEY AUTO_INCREMENT,
    idКатегории INT,
    Цена DECIMAL(10, 2) NOT NULL,
    Название VARCHAR(255) NOT NULL,
    FOREIGN KEY (idКатегории) REFERENCES Категория(idКатегории)
);

insert into Товары 
values (1, 2, 20, 'Каркасные дома'),
	   (2, 2, 40, 'Дома из клееного бруса'),
       (3, 2, 60, 'Фахверковые дома'),
       (4, 2, 80, 'Дома из брёвен'),
       (5, 2, 100, 'Беседки'),
       (6, 2, 120, 'Ремонт и отделка');

use pssip;
CREATE TABLE Услуги (
    idУслуги INT PRIMARY KEY AUTO_INCREMENT,
    idКатегории INT,
    Название VARCHAR(255) NOT NULL,
    Цена DECIMAL(10, 2) NOT NULL,  -- Используем DECIMAL для точного хранения денежных значений
    FOREIGN KEY (idКатегории) REFERENCES Категория(idКатегории)
);

insert into Услуги
values (1, 2, 'Демонтаж', 20),
	   (2, 2, 'Бетонные работы', 40),
       (3, 2, 'Возведение стен', 60),
       (4, 2, 'Кровельные работы', 80),
       (5, 2, 'Отделка фасадов', 100),
       (6, 2, 'Инженерные работы', 120);