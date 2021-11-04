# Проект «Менеджер задач»

[![Actions Status](https://github.com/bysynth/php-project-lvl4/workflows/hexlet-check/badge.svg)](https://github.com/bysynth/php-project-lvl4/actions)
[![Github Actions Status](https://github.com/bysynth/php-project-lvl4/workflows/CI/badge.svg)](https://github.com/bysynth/php-project-lvl4/actions)
[![Maintainability](https://api.codeclimate.com/v1/badges/3d0c87e35bd53479038b/maintainability)](https://codeclimate.com/github/bysynth/php-project-lvl4/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/3d0c87e35bd53479038b/test_coverage)](https://codeclimate.com/github/bysynth/php-project-lvl4/test_coverage)

Полноценный веб-сайт на базе фреймворка Laravel.

В этом проекте большое внимание уделяется созданию сущностей с помощью ORM Eloquent и описанию связей между ними (o2m,
m2m). Наличие сущностей даёт более простую работу с тестами. Тестовые данные создаются не руками, а с помощью механизма
фабрик. Фабрики описывают формат данных и по запросу создают сущности, сразу добавляя их в базу.

Для большего уровня автоматизации, в проекте используется ресурсный роутинг, который позволяет унифицировать и упростить
работу с типичными CRUD–операциями.

CRUD-операции тесно связаны с формами, которые используются для создания и редактирования сущностей. Формы в проекте
реализованы при помощи библиотеки laravelcollective/html.

Авторизация – процесс выдачи прав на действия над ресурсами и контроля их выполнения. В проекте авторизация
отрабатывается на 100%.

Одна из важных и типовых задач в веб-разработке – создание форм для фильтрации данных. Фильтрация данные реализована в
проекте при помощи библиотеки spatie/laravel-query-builder.

Эксплуатация проекта не менее важна чем разработка. Разработчик должен быть уверен, что его код работает правильно, и
для этого он пишет тесты. Но тесты не могут гарантировать 100% работоспособности, поэтому нужен механизм отслеживающий
ошибки возникающие в продакшене и оповещающий о них. Эту задачу решают коллекторы ошибок, отслежиние ошибок на
продакшене реализовано при помощи сервиса Rollbar.

Демо на Heroku: https://bysynth-task-manager.herokuapp.com/

## Требования

* PHP ^8.0
* Composer
* Node.js (v14+) & NPM (6+)
* SQLite

## Установка

```bash
git clone https://github.com/bysynth/php-project-lvl4.git task-manager
cd task-manager
make setup
```
## Запуск

```bash
make start
```
