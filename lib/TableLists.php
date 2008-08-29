<?php
/**
@file
    TableLists.php
@brief
    Copyright 2008 Creative Crew. All rights reserved.
@author
    William Chang
@version
    0.1
@date
    - Created: 2008-07-06
    - Modified: 2008-08-29
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

/** @class TableLists */
class TableLists extends TableCommon {
    protected $_objDbSql = null;

    public static $TBL__prefixes = 'prefixes';
    public static $TBL__prefixes__prefix_id = 'prefix_id';
    public static $TBL__prefixes__prefix_affix = 'prefix_affix';
    public static $TBL__prefixes__prefix_date_created = 'prefix_date_created';

    public static $TBL__postfixes = 'postfixes';
    public static $TBL__postfixes__postfix_id = 'postfix_id';
    public static $TBL__postfixes__postfix_affix = 'postfix_affix';
    public static $TBL__postfixes__postfix_date_created = 'postfix_date_created';

    /** Default constructor. */
    public function __construct() {}
    /** Default destructor. */
    public function __destruct() {}
    /** Set database sql. */
    public function setDatabaseSql($objDatabaseSql) {
        $this->_objDbSql = $objDatabaseSql;
    }
    /** Create (INSERT) prefix. */
    public function createPrefix($affix) {
        $p1 = array(
            self::$TBL__prefixes__prefix_affix => $affix
        );
        $this->_objDbSql->dynamicSqlInsert($p1, self::$TBL__prefixes);
        return $this->_objDbSql->sqlInsertId;
    }
    /** Create (INSERT) postfix. */
    public function createPostfix($affix) {
        $p1 = array(
            self::$TBL__postfixes__postfix_affix => $affix
        );
        $this->_objDbSql->dynamicSqlInsert($p1, self::$TBL__postfixes);
        return $this->_objDbSql->sqlInsertId;
    }
    /** Get (SELECT) prefixes. */
    public function getPrefix($id) {}
    /** Get (SELECT) prefixes. */
    public function getPrefixes() {
        $p1 = array(
            self::$TBL__prefixes__prefix_id => '',
            self::$TBL__prefixes__prefix_affix => ''
        );
        return $this->_objDbSql->dynamicSqlSelectOptions($p1, self::$TBL__prefixes, null, "ORDER BY " .  self::$TBL__prefixes__prefix_id . " ASC");
    }
    /** Get (SELECT) postfixes. */
    public function getPostfix($id) {}
    /** Get (SELECT) postfixes. */
    public function getPostfixes() {
        $p1 = array(
            self::$TBL__postfixes__postfix_id => null,
            self::$TBL__postfixes__postfix_affix => null
        );
        return $this->_objDbSql->dynamicSqlSelectOptions($p1, self::$TBL__postfixes, null, "ORDER BY " . self::$TBL__postfixes__postfix_id . " ASC");
    }
    /** Remove (DELETE) prefix. */
    public function removePrefix($id) {
        return $this->_objDbSql->dynamicSqlDelete(self::$TBL__prefixes, self::$TBL__prefixes__prefix_id . " = " . $id);
    }
    /** Remove (DELETE) postfix. */
    public function removePostfix($id) {
        return $this->_objDbSql->dynamicSqlDelete(self::$TBL__postfixes, self::$TBL__postfixes__postfix_id . " = " . $id);
    }
}