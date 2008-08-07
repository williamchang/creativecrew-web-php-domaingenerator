<?php
/**
@file
    ClassHelloWorld.php
@brief
    Coming soon.
@author
    William Chang
@version
    0.1
@date
    - Created: 2008-07-06
    - Modified: 2008-07-26
    .
@note
    References:
    - General:
        - http://trac.wordpress.org/browser/trunk/wp-includes/classes.php
        .
    .
*/

include_once('ClassHeader.php');

/** @class ClassHelloWorld */
class ClassHelloWorld {
    private $strMessage;

    /** Default constructor. */
    public function __construct() {
        echo 'Default constructor was called.';
        echo '<br/>';
    }
    /** Default destructor. */
    public function __destruct() {
        echo 'Default destructor was called.';
        echo '<br/>';
    }
    /** Get hello world string message. */
    public static function getHelloWorld() {
        return 'Hello World!';
    }
    /** Get string message. */
    public function getMessage() {
        return $this->strMessage;
    }
    /** Set string message. */
    public function setMessage($str) {
        $this->strMessage = $str;
    }
}