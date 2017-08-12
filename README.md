# StatsCommand

Консольная команда для Yii 1 для HighLoad проектов (допустим в таблице users 1 000 000 000 записей и всего 512 Мб ОЗУ на боевом сервере)

Вывод списка представленных в таблице 'users' почтовых доменов с количеством пользователей по каждому домену

Пример использования:

    root@481312dad57c:/app/protected# php yiic.php stats --limit=5
    
Результат выполнения команды:

    ==================================================
    [
        'почтовый домен' => 'количество пользователей'
    ]
    ==================================================
    [
        [gmail.com] => 6
        [mail.ru] => 3
        [yahoo.com] => 1
        [yandex.ru] => 1
        [jabra.com] => 2
        [ya.ru] => 1
        [bk.ru] => 1
    ]
    ==================================================


Таблица users (пример содержимого таблицы):

    id	nick_name	email
    1	maxim	maxim.avramenko@gmail.com
    2	john	john@gmail.com, forza@mail.ru
    3	mikel	mikel@yahoo.com
    4	linda	linda@mail.ru, ghfjd@yandex.ru
    5	patrik	patrik@gmail.com
    6	jora	jora@mail.ru, gigizmond@gmail.com
    7	konor	konor@jabra.com
    8	norman	norman@gmail.com
    9	forza	forza@ya.ru
    10	geez	geez@gmail.com
    12	goga	goga@jabra.com
    13	dodik	dodik@bk.ru
    
