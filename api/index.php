<?php

// phpinfo();
if (in_array('sockets', get_loaded_extensions())) {
  echo 'soporte sockets :D';
} else {
  die('No socket support.');
}
