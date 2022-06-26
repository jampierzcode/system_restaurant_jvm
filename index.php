<?php

// Instrucciones para el reporte de errores  

error_reporting(E_ALL);

ini_set('ignore_repetead_errors', true);

ini_set('display_errors', true);

ini_set('log_errors', TRUE);

ini_set("error_log", "./php-error.log");

error_log(" PHP error log ");
error_log(" ============= ");

// tail -f php-error.log  ---> Comando unix para ver por consala el log de los errores 
// Get-Content -Path .\php-error.log -Wait ----> Comando para powershell de windows

require_once 'config/config.php';

require_once 'libs/database.php';
require_once 'libs/controller.php';
require_once 'libs/view.php';
require_once 'libs/model.php';

require_once 'classes/session.php';
require_once 'classes/sessionController.php';
require_once 'classes/errors.php';
require_once 'classes/success.php';

require_once 'models/Rol.php';
require_once 'models/User.php';

require_once 'libs/app.php';

$app = new App();
