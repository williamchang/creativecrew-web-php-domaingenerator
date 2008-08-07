<?php
/**
@file
    ApplicationCommon.php
@brief
    Coming soon.
@author
    William Chang
@version
    0.1
@date
    - Created: 2008-07-06
    - Modified: 2008-07-22
    .
@note
    References:
    - General:
        - http://trac.wordpress.org/browser/trunk/wp-includes/classes.php
        .
    .
*/

include_once('ClassHeader.php');

/** @class ApplicationCommon */
class ApplicationCommon {
    /** Default constructor. */
    public function __construct() {}
    /** Default destructor. */
    public function __destruct() {}
    /** Has value. */
    public static function hasValue($variable) {
        return (isset($variable) && !empty($variable));
    }
    /** End application. */
    public static function endApplication($message, $title = '') {
        exit(); // PHP function.
    }
    /** Debug variable. */
    public static function debugVariable($variable) {
        return var_dump($variable);
    }
    /** Debug HTTP post (form) request method. */
    public static function debugArrayAssociative($aryAssociative) {
        echo '<br/><br/>';
        foreach($aryAssociative as $key => $value) {
            echo $key.' : ' . $value . '<br/>';
        }
        echo '<br/><br/>';
    }
}