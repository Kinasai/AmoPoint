# Laravel

## Задание

```text
Напишите Laravel проект, в состав которого обязательно входит
1. Консольная команда, которая каждые 5 минут получает информацию от любого API на ваш выбор и сохраняет её в таблицу БД
2. Route, отдающий массив записей таблицы в формате json
Например:   https://official-joke-api.appspot.com/random_joke
```

## Требования

- PHP >= 8.2
- Composer
- MySQL
- Node.js + npm

---

## Установка проекта

```bash
  git clone https://github.com/Kinasai/AmoPoint.git
  cd AmoPoint/laravel
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

## Планировщик задач

В проекте используется команда, которая запускается каждые 5 минут через Laravel Scheduler.

Проверка запуска команды вручную:

```bash
  php artisan api:request
```

Для работы scheduler необходимо добавить cron:

```bash
  * * * * * php /path-to-project/artisan schedule:run >> /dev/null 2>&1
```

Проверка запуска scheduler вручную:

```bash
  php artisan schedule:run
```

---

## API Endpoint

### Получить случайную шутку

```http
GET /api/random_joke
```

Маршрут:

```php
Route::get('/random_joke', [JokeController::class, 'random']);
```

Пример ответа:

```json
{
  "id": 2,
  "type": "general",
  "setup": "what do you call a dog that can do magic tricks?",
  "punchline": "a labracadabrador"
}
```

