**Установка**

1) Установить и запустить проект: \
`docker compose up`
2) Накатить миграции: \
`docker exec quiz-app-test-task-php-app-1 php bin/console doctrine:migrations:migrate --no-interaction`
3) Накатить тестовые данные: \
`docker exec quiz-app-test-task-php-app-1 php bin/console doctrine:fixtures:load --no-interaction`

Проект будет доступен по адресу - http://127.0.0.1:8080

Траблшутинг:
1) убедиться что свободны порты 5432 и 8080  
2) убедиться что имя контейнера с php у вас такое же как в коммандах 2 и 3 - *quiz-app-test-task-php-app-1* выполнив `docker ps`, если не совпадает - подставить нужное из вывода команды
