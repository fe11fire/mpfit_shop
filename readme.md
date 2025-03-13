Клонируем образ:

```
git clone https://github.com/fe11fire/mpfit_shop.git .
```

Устанавливаем зависимости:
```
docker-compose run --rm composer install
```

Запускаем окружение:
```
docker-compose up nginx --build -d
```

Добавляем тестовые данные:
```
docker-compose run --rm artisan migrate:fresh --seed
```

Тестовое задание:
```
http://localhost:8000/
```