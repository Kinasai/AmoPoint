# Laravel

## Задание

```text
Написать счетчик посещений страницы. Решение должно состоять из двух компонентов: 
-кода на js, который подключается к любому сайту. Скрипт должен собрать необходимые данные(ip, город, устройство) и отправлять на сервер.
 -бэк часть, который хранит данные в БД(sqllite или другой на выбор) и показывает график посещений по часам(по оси х - количество уникальных посещений за час, по оси y- время), круговую диаграмму с разбиением по городам.
Оформить в виде страницы просмотра статистики с авторизацией. Решение выложить на любой хостинг для возможности проверки
```

## JS скрипт для интеграции
```text
resources\js\tracker.js
```
- Добавлен на главной странице

## Статистика
```text
 http://127.0.0.1:8000/stats
```
- Страница доступна только авторизированным пользователям

---

## Требования

- PHP >= 8.2
- Composer
- MySQL
- Node.js + npm

---

## Установка проекта

```bash
  git clone https://github.com/Kinasai/AmoPoint.git
  cd AmoPoint/tracker
```

Установить зависимости:

```bash
  composer install
  npm install
```

Создать `.env`:

```bash
  cp .env.example .env
```

Сгенерировать ключ приложения:

```bash
  php artisan key:generate
```

Настроить подключение к БД в `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Запустить миграции:

```bash
  php artisan migrate
```

---

## Запуск проекта

Запуск локального сервера:

```bash
  php artisan serve
```

Frontend:

```bash
  npm run dev
```

Приложение будет доступно по адресу:

```text
http://127.0.0.1:8000
```

---


---

## API Endpoint

### Эндпоинт для приема входящих данных о пользователе.

```http
POST /api/track
```

Маршрут:

```php
Route::post('/track', [VisitController::class, 'store']);
```

### Запрос

**Method:** `POST`  
**Content-Type:** `application/json`

### Параметры запроса

| Поле   | Тип    | Описание                  | Пример           |
|--------|---------|---------------------------|------------------|
| ip     | string  | IP адрес пользователя     | `192.168.1.1`    |
| city   | string  | Город пользователя        | `Helsinki`       |
| device | string  | Устройство пользователя   | `Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36`   |

### Пример запроса

```bash
  curl -X POST http://127.0.0.1:8000/api/track \
      -H "Content-Type: application/json" \
      -d '{
        "ip": "192.168.1.1",
        "city": "Helsinki",
        "device": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36"
      }'
```
### Пример JSON

```json
{
    "ip": "192.168.1.1",
    "city": "Helsinki", 
    "device": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36"
}
```
