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

If you're not using Composer, you can also clone `omise/omise-php` repository into the directory of sample code that you just installed this repository:

```
git clone https://github.com/omise/omise-php
```

However, using Composer is recommended as you can easily keep the library up-to-date. After cloning the repository, you need to replace line 3 in `config.php` from
```php
3: require_once 'vendor/autoload.php';
```

to

```php
3: require_once 'omise-php/lib/Omise.php';
```

Please see configuration section below for configuring your Omise Keys.

## Configuration
After you installed `omise-php` library already. Next, you need to **configure** your Omise Keys.  
So, we have 2 files that you need to change:
- `examples/php`/index.php
- `examples/php`/config.php 

### index.php
To collect a customer's card data and exchange for a [`token`](https://docs.omise.co/api/tokens/), you need to config your `Omise Key Public` in this file.  
On line 32 in this file, you will see something like below
```javascript
30: <script>
31:   // Set Omise Public Key (from omise.co > log in > Keys tab)
32:   Omise.setPublicKey("pkey_test");
33: </script>
```
change `pkey_test` to your [`Omise Public Key for Test`](https://docs.omise.co/api/authentication/)

### config.php
On line 6 - 7 in this file, you will see something like below.  
To use all features in Omise, you need to configure both your `Omise Key Public` and `Omise Key Secret` in this file. The secret key should be kept safe, it is used to make a full charge from a token or to create a permanent customer to charge later, also every other permanent action on your account.  
```php
5: /* Defined OMISE KEYS */
6: define('OMISE_PUBLIC_KEY', 'pkey_test');
7: define('OMISE_SECRET_KEY', 'skey_test');
```
change `pkey_test` to your [`Omise Public Key for Test`](https://docs.omise.co/api/authentication/),  
change `skey_test` to your [`Omise Secret Key for Test`](https://docs.omise.co/api/authentication/)


## Folder Structure
In this example, we have some files and folder that you need to concentrate about, as follows:
- `examples/php`/index.php
- `examples/php`/services/*

### index.php
This file will contains `html` and `javascript` code for **[collecting a customer's card and send it to Omise Server for tokenizing the card](https://docs.omise.co/collecting-card-information/) into a  [`token`](https://docs.omise.co/api/tokens/)**.

### services/*
This folder contains sample php files that include `omise-php` library. It will show you how to integrate `omise-php` library into your php file and use it.

## Usage
Run `index.php` in your browser.

## Tips
You are not allowed to send the card data to your servers.

### Observacion en la bd 
- En la tabla Persona, en el PK es mejor que sea autocrementable porque hay una funcion en php para recuperar el ultimo registro 
- En los celulares tambien se considera "+51" si es asi tambien se considera que sea un tipo CHAR 
- El attr User debe ser unico 