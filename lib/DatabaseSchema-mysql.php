<?php
/**
@file
    DatabaseSchema-mysql.php
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
        - http://us.php.net/manual/en/language.functions.php
        .
    .
*/

include_once('ClassHeader.php');

class DatabaseSchema {
    public static function getSchema($objDatabaseSql) {
        $charsetCollate = '';

        // Check if database supports collation.
        if($objDatabaseSql->supportsCollation()) {
            if(!empty($objDatabaseSql->charset)) {
                $charsetCollate = "DEFAULT CHARACTER SET $DatabaseCommon->charset";
            }
            if(!empty($objDatabaseSql->collate)) {
                $charsetCollate .= " COLLATE $DatabaseCommon->collate";
            }
        }

        $queries = "

CREATE TABLE " . TableUser::$TBL__users . " (
user_id bigint(20) NOT NULL auto_increment,
user_name varchar(63) NOT NULL default '',
user_password varchar(63) NOT NULL default '',
user_displayname varchar(63) NOT NULL default '',
user_email varchar(127) NOT NULL default '',
user_activation_key varchar(63) NOT NULL default '',
user_date_created datetime NOT NULL default '0000-00-00 00:00:00',
PRIMARY KEY (user_id)
) $charsetCollate;

CREATE TABLE " . TableUser::$TBL__options . " (
option_id bigint(20) NOT NULL auto_increment,
option_name varchar(64) NOT NULL default '',
option_value longtext NOT NULL,
PRIMARY KEY (option_id),
KEY option_name (option_name)
) $charsetCollate;

CREATE TABLE " . TableList::$TBL__prefixes . " (
prefix_id bigint(20) NOT NULL auto_increment,
prefix_affix varchar(255) NOT NULL default '',
prefix_date_created datetime NOT NULL default '0000-00-00 00:00:00',
PRIMARY KEY(prefix_id)
) $charsetCollate;

CREATE TABLE " . TableList::$TBL__postfixes . " (
postfix_id bigint(20) NOT NULL auto_increment,
postfix_affix varchar(255) NOT NULL default '',
postfix_date_created datetime NOT NULL default '0000-00-00 00:00:00',
PRIMARY KEY(postfix_id)
) $charsetCollate;

        ";

        return $queries;
    }
    // Populate table.
    function populateOptions() {
        // TODO
    }
}