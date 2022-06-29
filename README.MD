# SISTEMA RESTAURANTE BURGUER DON RONALD

En este pagina de markdown se detallara la instalacion y funcionamiento de la pagina para un debido desmpeno.

## Requirements
- PHP 8.0.
- Mysql 
- Xampp o Docker

## Installation
En este proyecto, se puede instalar de dos maneras: utilizando docker y utilizando xampp 

### 1. Usando Docker (recomended)
Tu puedes instalar Docker con los links que se deja a continuacion: 
* [Docker instalation for all system](https://docs.docker.com/engine/install/)

Si instalaste docker para linux, tiens que instalar docker-compose, se muestra un enlace para la instalacion:
* [Instalaction for docker-compose linux's](https://docs.docker.com/compose/install/compose-plugin/#installing-compose-on-linux-systems)

Una vez hecha la instalacion de docker, puede correr el siguiente comando, previamente debes de navegar con la terminal hasta la carpeta.

```
docker-compose up -d
```

### 2. Utilizando xampp

Una vez instalado en la carpeta se tendra que revisar el archivo `config/config.php`, es este fichero se encuentra las configuraciones del servidor 

```php
6:  define('URL', 'http://localhost:90/'); //  cambiar si utilizas xampp
7:  define('URLCORS', 'http://localhost:90/'); //cambiar por el dominio
8:  define('HOST', 'localhost');
9:  define('DB', 'restaurant_burguer');
10: define('USER', 'root');
11: define('PASSWORD', 'test');
```

### Observacion en la bd 
- En la tabla Persona, en el PK es mejor que sea autocrementable porque hay una funcion en php para recuperar el ultimo registro 
- En los celulares tambien se considera "+51" si es asi tambien se considera que sea un tipo CHAR 
- El attr User debe ser unico 