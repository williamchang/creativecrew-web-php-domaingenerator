<?php
/**
@file
    ClassHeader.php
@brief
    Coming soon.
@author
    William Chang
@version
    0.1
@date
    - Created: 2008-07-07
    - Modified: 2008-07-26
    .
@note
    References:
    - General:
        - http://us.php.net/manual/en/function.define.php
        - http://us.php.net/manual/en/function.defined.php
        - http://blog.dougalmatthews.com/2008/04/php-__autoload/
        - http://www.onphp5.com/article/61/
        .
    .
*/

// Database definition.
define('DB_SYSTEM', 'mysql');
define('DB_NAME', 'sandbox');
define('DB_USERNAME', 'root'); // default: 'root'
define('DB_PASSWORD', ''); // default: ''
define('DB_HOST', 'localhost'); // default: 'localhost'
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
// You can have multiple installations in one database by giving each a unique prefix.
define('DB_TABLE_PREFIX', 'app_'); // Only numbers, letters, and underscores.

// Physical path definition.
if(!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

/** Lazy loading magic method for class files. */
function __autoload($class) {
    // Replaces all underscores with forward slashes.
    $class = str_replace('_', '/', $class);
    // Special cases.
    if(preg_match('/database/i', $class) && (!preg_match('/databasecommon/i', $class) && !preg_match('/databasesingleton/i', $class))) {
        switch(DB_SYSTEM) {
            case 'mysql':
                $class .= '-mysql';
                break;
            default:
                throw new Exception('DB_SYSTEM specified is unsupported or not defined.');
                break;
        }
    }
    // Assume that all class files are located in the same directory.
    $path = ABSPATH . $class . '.php';
    if(is_readable($path)) {
        include_once($path);
    } else { // Class could not be located.
        eval('class AutoloadError {
            public function __construct() {
                throw new Exception("Class ' . $class . ' not found in ' . $path . '.");
            }
            public static function __callstatic($m, $args) {
                throw new Exception("Class ' . $class . ' accessing a static method not found in ' . $path . '.");
            }
        }');
    }
}