### Инструкция по запуску проекта:

#### 1. Установить зависимости

```
composer install
```

#### 2. Поднять контейнеры

```
docker-compose up -d
```

#### 3. Скопировать .env.example-файл в .env-файл

```
docker exec -it app_app cp /var/www/.env.example /var/www/.env
```

#### 4. Установить необходимые права для файлов проекта

```
docker exec -it app_app chmod -R 777 /var/www
```

#### 5. Сгенерировать ключ приложения, кэшировать маршруты

```
docker exec -it app_app php /var/www/artisan key:generate
docker exec -it app_app php /var/www/artisan route:cache
```


#### 6. Выполнить миграцию БД

```
docker exec -it app_app php /var/www/artisan migrate --force
```

#### 7. Выполнить seed'ы

```
docker exec -it app_app php /var/www/artisan db:seed --force
docker exec -it app_app php /var/www/artisan db:seed --class=ImagesSeeder --force
```

#### Готово
```
localhost:8000 - точка входа в приложение
```
