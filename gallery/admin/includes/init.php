<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', 'C:' . DS . 'xampp' . DS . 'htdocs' . DS . 'group-1005049' . DS . 'gallery' );

//defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes');

defined('IMAGES_PATH') ? null : define('IMAGE_PATH', SITE_ROOT . DS );

require_once("functions.php");
require_once("new_config.php");
require_once("database.php");
require_once("user.php");
require_once("session.php");
require_once("db_object.php");
require_once("emprunt.php");
require_once("book.php");
?> 