#Tula Web Cup 2019

Рабочий проект: [http://tulawebcup.terehinis.ru](http://tulawebcup.terehinis.ru)

Git репозиторий: [github.com/terehinis/TulaWebCup2019](https://github.com/terehinis/TulaWebCup2019)

Приложение использует [Laravel framework](https://laravel.com/)

Для фотогалерии используется: [lightgallery](https://github.com/sachinchoolur/lightGallery)

###Реализованные пункты
1. Авторизация пользователя в приложении: При помощи сервиса Яндекс.
2. Размещение изображений в приложении: Через API Яндекс.Диска.
3. Постраничная навигация списка изображений: (10, 20, 50, все изображения на странице)
4. Адаптация под различные разрешения экрана: (320px, 576px, 768px, 980px, 1200px, 1366px, 1440px, 1920px)
5. Исходный код в одном из открытых репозиториев: [github.com/terehinis/TulaWebCup2019](https://github.com/terehinis/TulaWebCup2019)

###Start
Для запуска приложения потребуется:
* PHP 7.2
* СУБД (в реализации используется sqlite 3), пустая бд находится в репозитории database/codeCup.db

Склонируйте репозиторий и запустите в папке проекта:
```bash
composer install
```
Скопируйте .env.example в .env и измените настройки под свое окружение:
```bash
YANDEX_KEY= ID приложения oauth
YANDEX_SECRET= Пароль приложения oauth
YANDEX_REDIRECT_URI= Callback URL приложения oauth
YANDEX_TOKEN= Токен авторизации в Я.Диск, для доступа к файлам
```
Для миграции БД запустить:
```bash
php artisan migrate
```