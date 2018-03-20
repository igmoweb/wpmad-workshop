# Workshop: Refactoring + Pair Programming

Workshop basado en [Gilded Rose Kata](https://github.com/emilybache/GildedRose-Refactoring-Kata) por [Terry Hughes](https://twitter.com/TerryHughes) 

## Requerimientos

Este workshop requiere una máquina con PHP 7.1, Apache o Nginx, Composer y PHPUnit.

Para ello, el repositorio ya incluye su propio archivo de [Docker](https://www.docker.com/). Para empezar:

- Instala Docker en tu equipo
- Arranca Docker
- Clona este repositorio
- Ejecuta `docker-compose up` en la carpeta raíz del proyecto. La primera vez tardará unos minutos. El proceso quedará ejecutándose. Para salir simplemente presiona `Ctrl+C`
- Ejecuta `./bin/install.sh` en otro terminal en la carpeta raíz del proyecto. También puedes ejecutar `docker exec -it --user www-data meetup_phpfpm bash -c 'cd /var/www/html/php ; composer install'` 
- Abre `http://localhost:8888/` en tu navegador

## Alternativas a Docker

Puedes usar tu propia instalación LAMP. Otra buena alternativa es [VVV](https://github.com/Varying-Vagrant-Vagrants/VVV) que ya incluye todo lo necesario para empezar.