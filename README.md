Fallout game
========================

Welcome to the post apocalyptic spin-off game, based on Fallout series!

It's created with help of Symfony framework. Also environment created with help of Docker.

How to install and play
--------------

To begin installation, you need Git installed on your computer. 
Clone this repository in the directory you like (for example home directory):

```
cd ~
git clone git@bitbucket.org:sw4n/fallout-cli.git
```

For smooth install, you need a fresh installation of Docker. And also you need Docker Compose tool to be installed.
It's not mandatory, but it will ease installation and rapid run.

https://www.docker.com/community-edition
https://docs.docker.com/compose/install/

If you chose Docker installation (recommended), then follow this steps (type in terminal):

```
cd fallout-cli/environment
ln -s ~/fallout-cli/code code_link
docker-compose build
docker-compose up -d
docker-compose exec php-fpm composer install
```
While install composer dependencies - enter database host as "db" - it's container name, "fallout" - database name, and "root" & "root" for login and password.

```
docker-compose exec php-fpm bin/console doctrine:migrations:migrate
docker-compose exec php-fpm bin/console doctrine:fixtures:load
docker-compose exec php-fpm bin/console assets:install --symlink web
docker-compose exec php-fpm bin/console fos:js-routing:dump
docker-compose exec php-fpm bin/console cache:clear --env=prod
``` 

Then you can try to open browser and type
"http://localhost/".
Then you must see menu page with single link. This means that everything is working.

If you didn't choose the Docker installation, you need install separately "Nginx", "PHP 5.6" and "MySql 5.7", composer, node js. 
Then follow commands without referencing to the containers. E.g.
```
composer install
bin/console doctrine:migrations:migrate
```
And so on.