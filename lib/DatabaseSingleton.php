<?php
/**
@file
    DatabaseSingleton.php
@brief
    Copyright 2008 Creative Crew. All rights reserved.
@author
    William Chang
@version
    0.1
@date
    - Created: 2008-07-07
    - Modified: 2008-07-07
    .
@note
    References:
    - General:
        - http://www.php.net/manual/en/language.oop5.patterns.php
        - http://en.wikipedia.org/wiki/Singleton_pattern#PHP_5
        - http://sottointtesa.com/?p=34
        - http://blog.case.edu/gps10/2006/07/22/why_global_variables_in_php_is_bad_programming_practice
        .
    .
*/

include_once('ClassHeader.php');

/** @class DatabaseSingleton */
class DatabaseSingleton {
    // Object instance of this class.
    private static $_instance = null;

    // SQL object.
    protected $_objDatabaseSql = null;

    // Private constructor. Prevents direct creation of object.
    // The construct can be empty or it can contain additional instructions.
    private function __construct() {
        $this->_objDatabaseSql = new DatabaseCommon(DB_USERNAME, DB_PASSWORD, DB_NAME, DB_HOST);
    }
    // This method prevents external instantiation of copies of the Singleton class,
    // thus eliminating the possibility of duplicate classes.  The clone can be empty, or
    // it can contain additional code, most probably generating error messages in response
    // to attempts to call.
    protected function __clone() {
        // TODO: Output error.
    }
    // This method must be static, and must return an instance of the object
    // if the object does not already exist.
    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    //---------------------------------------------------------------------
    // Below, one or more public methods that grant access to the Singleton
    // object, and its private methods and properties via accessor methods.
    //
    // Usage:
    // Singleton::getInstance()->doAction();
    //---------------------------------------------------------------------

    /// Get hello world string message.
    public function getHelloWorld() {
        return 'Hello World!';
    }
    /// Get object: DatabaseSql.
    public function getDatabaseSql() {
        return $this->_objDatabaseSql;
    }
}