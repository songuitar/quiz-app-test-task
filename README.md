**Установка**

1) Установить и запустить проект: \
`docker compose up`
2) Накатить миграции: \
`docker exec text-magic-test-task-php-app-1  php bin/console doctrine:migrations:migrate --no-interaction`
3) Накатить тестовые данные: \
`docker exec text-magic-test-task-php-app-1  php bin/console doctrine:fixtures:load --no-interaction`

Проект будет доступен по адресу - http://127.0.0.1:8080
