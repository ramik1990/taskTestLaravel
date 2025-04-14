# Task API

## Установка

1. `git clone ...`
2. `composer install`
3. Настрой `.env`
4. `php artisan migrate`
5. `php artisan serve`

## API Endpoints

- `GET /api/tasks`
- `POST /api/tasks`
- `GET /api/tasks/{id}`
- `PUT /api/tasks/{id}`
- `DELETE /api/tasks/{id}`
- `GET /api/tasks/priority`

## Документация

Файл `postman_collection.json` в корне проекта.




============================================
# Тестовое задание: REST API для управления списком задач

## Описание
Необходимо разработать REST API для управления списком задач с возможностью приоритизации на основе важности и дедлайна.

## Требования

### Технический стек
- Laravel 10+
- MySQL/PostgreSQL
- Laravel Request Validation
- API Resource
- OpenAPI/Swagger для документации

### Сущность Task
- id: bigInteger
- title: string
- description: string
- status: enum (TODO, IN_PROGRESS, COMPLETED)
- importance: integer (1-5)
- deadline: datetime
- created_at: timestamp
- updated_at: timestamp

### Необходимый функционал

1. CRUD операции для задач:
   - Создание новой задачи
   - Получение списка задач с возможностью фильтрации по статусу
   - Обновление задачи
   - Удаление задачи

2. Эндпоинт для автоматической приоритизации задач:
   - Должен возвращать отсортированный список задач
   - Приоритет рассчитывается по формуле: `priority = importance * (1 / daysUntilDeadline)`
   - Если срок задачи истёк, она должна быть помечена как просроченная

### API Endpoints
```
GET    /api/tasks           # Получение списка задач
POST   /api/tasks           # Создание задачи
GET    /api/tasks/{id}      # Получение задачи
PUT    /api/tasks/{id}      # Обновление задачи
DELETE /api/tasks/{id}      # Удаление задачи
GET    /api/tasks/priority  # Получение приоритизированного списка
```

### Обязательные требования
- Использовать миграции для создания структуры БД
- Применить Form Request Validation для валидации входных данных
- Использовать Resource классы для форматирования ответов
- Реализовать базовую обработку ошибок
- Добавить базовую документацию API (Swagger или Postman коллекция)
- Написать один тест для метода приоритизации задач

### Пример запроса создания задачи
```json
{
    "title": "Подготовить презентацию",
    "description": "Подготовить презентацию для заказчика",
    "status": "TODO",
    "importance": 4,
    "deadline": "2024-12-01 12:00:00"
}
```

### Пример ответа приоритизированного списка
```json
{
    "data": [
        {
            "id": 1,
            "title": "Срочная задача",
            "description": "Описание задачи",
            "status": "TODO",
            "importance": 5,
            "deadline": "2024-12-01 12:00:00",
            "is_overdue": false,
            "priority_score": 0.85,
            "created_at": "2024-11-25 10:00:00",
            "updated_at": "2024-11-25 10:00:00"
        }
    ]
}
```

### Критерии оценки
- Правильность реализации бизнес-логики
- Следование Laravel best practices
- Качество валидации и обработки ошибок
- Структура кода
- Работа с БД
- Документация API
- Тест для приоритизации

## Время выполнения
20-30 минут

## Результат
- Краткий README.md с инструкцией по развертыванию
- Документация API (Swagger или Postman коллекция)
