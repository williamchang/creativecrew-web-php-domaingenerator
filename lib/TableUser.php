<?php
/**
@file
    TableUser.php
@brief
    Coming soon.
@author
    William Chang
@version
    0.1
@date
    - Created: 2008-07-06
    - Modified: 2008-07-31
    .
@note
    References:
    - General:
        - http://us.php.net/manual/en/language.oop5.php
        - http://us.php.net/manual/en/language.types.array.php
        .
    .
*/

include_once('ClassHeader.php');

/** @class TableUser */
class TableUser extends TableCommon {
    protected $_objDbSql = null;
	
	public static $TBL__users = 'users';

    public static $TBL__options = 'options';

    /** Default constructor. */
    public function __construct() {}
    /** Default destructor. */
    public function __destruct() {}
    /** Set database sql. */
    public function setDatabaseSql($objDatabaseSql) {
        $this->_objDbSql = $objDatabaseSql;
    }
    /**
     * Create (INSERT) user.
     * @return int The username id on success.
     */
    public function createUser($username, $password, $email) {
    }
    /**
     * Checks whether the given username exists.
     * @return null|int The username id on success, and null on failure.
     */
    public function isUsernameExists($username) {
    }
    /**
     * Checks whether the given email exists.
     * @return bool|int The username id on success, and false on failure.
     */
    public function isEmailExists($email) {
    }
}