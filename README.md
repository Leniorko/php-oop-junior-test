# Ход выполнения

## PHP

Задания выполнялись на стеке [WAMP](https://www.wampserver.com/en/).
PHP - 7.4.9
MySQL - 8.0.21

Несмотря на оговорку в 5 пунте задания. Я решил создать тестовую базу данных для наглядности.
Наполнение БД делал при помощи сервиса [Mockaroo](https://www.mockaroo.com)
Найти код работы с базой данных и её дамп можно в папке `./db/`.

Класс `Item` который необходимо было написать по заданию находится в файле `index.php`.

---

## SQL

Я обернул выполнение этого задания в функцию, что бы можно было проверить результат в коде.
Функция `joinTask` находится в файле `./db/db.php`.

---

## Jquery

Для этого задания взята маленькая `HTML` страничка. Вся логика содержится в файле `./js/index.js`.
По нажатию клавиши после `alert` `div` привязанный к клавише окрашивается в один из цветов из массива.
Это сделано как доказательство того, что после `alert` код продолжает исполняться.
