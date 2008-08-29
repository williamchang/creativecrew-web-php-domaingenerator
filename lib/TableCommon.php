<?php
/**
@file
    TableCommon.php
@brief
    Copyright 2008 Creative Crew. All rights reserved.
@author
    William Chang
@version
    0.1
@date
    - Created: 2008-07-06
    - Modified: 2008-07-07
    .
@note
    References:
    - General:
       -  http://codex.wordpress.org/Function_Reference/wpdb_Class
        - http://trac.wordpress.org/browser/trunk/wp-includes/wp-db.php
        - http://us.php.net/manual/en/language.types.array.php
        - http://trac.wordpress.org/browser/trunk/wp-includes/functions.php
        - http://www.woyano.com/jv/ezsql/
        .
    .
*/

include_once('ClassHeader.php');

/** @class TableCommon */
class TableCommon {
    /** Default constructor. */
    public function __construct() {}
    /** Default destructor. */
    public function __destruct() {}
    /** Set prefix for the application's tables. */
    public function setTablePrefix($aryTables, $strPrefix) {
        if(preg_match('|[^a-z0-9_]|i', $strPrefix)) {
            // TODO: Report error.
            return;
        }
        foreach($aryTables as &$strTable) { // Assign reference instead of copying the value.
            $strTable = $strPrefix . $strTable;
        }
        unset($strTable); // Break the reference with the last element.
    }
}