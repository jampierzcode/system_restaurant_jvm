<?php 

  // Esta variable depende del port, en el caso de que estes utilizando el archivo de docker 
  // de esta repo, entonces no cambies nada pero si estas utilizando xampp cambia el port 
  // por el localhoost:80
  define('URL', 'http://localhost:90/'); 
  define('URLCORS', 'http://localhost:90/'); //cambiar por el dominio
  define('HOST', 'localhost');
  define('DB', 'restaurant_burguer');
  define('USER', 'root');
  define('PASSWORD', 'test');
  define('CHARSET', 'utf8mb4');
  define('VERSION', '1.0');
  define('PORT_DB', '3307');

  //Constantes para la encriptacion, no mover 
  define('METHOD','AES-256-CBC');
  define('SECRET_KEY','n#PBKqQ43@4v_z)D');
  define('SECRET_IV','20062022');