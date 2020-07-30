# Менеджер задач

[![Action](https://github.com/zhekavafiev/php-project-lvl4/workflows/Task-manager-CI/badge.svg)](https://github.com/zhekavafiev/php-project-lvl4/blob/master/.github/workflows/task-manager-ci.yml)
[![Maintainability](https://api.codeclimate.com/v1/badges/e6c365e6f65b1bdca517/maintainability)](https://codeclimate.com/github/zhekavafiev/php-project-lvl4/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/e6c365e6f65b1bdca517/test_coverage)](https://codeclimate.com/github/zhekavafiev/php-project-lvl4/test_coverage)

[Ссылка для ознакомления](https://evgvfv-task-manager.herokuapp.com/)

## Назначение
Приложение разработано в учебных целях, для ознакомления с работой с фрейморком Ларавел, а так же их взаимодействия с СУБД PostgreSQL.
Деплой приложений осуществлен с помощью PaaS Heroku.

## Установка
Для того, чтобы установить приложение, выпоните
`git clone https://github.com/zhekavafiev/php-project-lvl4.git`
После окончания процедуры клонирования репозиотрия выполните команду `make install` для установки необходимых пакетов а также подготовки базы данных. Если при установке произошла ошибка, то Вам необходимо создать и сконфигурировать файл .env, с учетом вашего окружения, а так же используемуей базы даннх. Не забудьте так же прописатm настройки сервера почтовых рассылок и очередей. После этого повторно запустите команду `make install`.
Проверить работоспособность приложения можно, запустив локальный есервер `make server` или тесты `make test`.
