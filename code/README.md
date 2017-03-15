Fallout game
========================

Welcome to the post apocalyptic spin-off game, based on Fallout series!

It's created with help of Symfony framework. Also environment created with help of Docker.

How to install and play
--------------

To begin installation, you need Git installed on your computer. 
Clone this repository in the directory you like:

git clone [repository-address]

For smooth install, you need a fresh installation of Docker. And also you need Docker Compose tool to be installed.
It's not mandatory, but it will ease installation and rapid run.

https://www.docker.com/community-edition
https://docs.docker.com/compose/install/

If you chose Docker installation (recommended), then follow this steps (type in terminal):

```
cd fallout-cli/environment
cp ~/fallout-cli/code code_link
docker-compose build
docker-compose up -d
``` 

If you didn't choose the Docker installation, you need install separately "Nginx", "PHP 5.6" and "MySql 5.7".