<?php
/**
@file
    ApplicationError.php
@brief
    Coming soon.
@author
    William Chang
@version
    0.1
@date
    - Created: 2008-07-07
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

/** @class ApplicationError */
class ApplicationError extends ApplicationCommon {
    /** Default constructor. */
    public function __construct() {}
    /** Default destructor. */
    public function __destruct() {}
    /** Generates a user-level error/warning/notice message. */
    public static function reportError($msg, $type) {
        return trigger_error($msg, $type);
    }
}