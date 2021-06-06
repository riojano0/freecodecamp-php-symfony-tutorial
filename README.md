# Symfony PHP Framework beginner tutorial from FreeCodeCamp

Activities from https://www.youtube.com/watch?v=Bo0guUbL5uo&t=7807s

## Requisites

- XAMP (Window) or LAMP (Linux)
- Symfony
- Composer

## Common commands used

Create Controller class
`` php bin/console make:controller ``

---

Create Entity class
`` php bin/console make:entity ``

Update Databse with schema from entity class
`` php bin/console doctrine:schema:update --force ``

Create Form
`` php bin/console make:form ``

----

Create User entity
`` php bin/console make:user ``

Create Authentication
`` php bin/console make:auth ``

----

## How to run

- Copy the project on your **htdocs** provide by XAMP or LAMP
- Instal the dependencies with ``composer update``
- Start XAMP instances for Apache and MySQL (Check the hardcore credential on .env)
- Execute ``php bin/console doctrine:database:create sfcoursedb`` 
- Execute ``php bin/console doctrine:schema:update --force`` for fill the database with the entity schema 
- Optionally can use ``symfony server:start`` to have a more friendly domain to work