<?php
/**
@file
    FunctionCommon.php
@brief
    Copyright 2008 Creative Crew. All rights reserved.
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
        - http://us.php.net/manual/en/language.functions.php
        .
    .
*/

include_once('ClassHeader.php');

/** @class FunctionCommon */
class FunctionCommon {
    /** Is email. */
    public static function isEmail($userEmail) {
        $chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
        if(strpos($userEmail, '@') !== false && strpos($userEmail, '.') !== false) {
            if(preg_match($chars, $userEmail)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    /** Walks the array while sanitizing the contents. */
    public static function addMagicQuotes($array) {
        foreach($array as $k => $v) {
            if(is_array($v)) {
                $array[$k] = addMagicQuotes($v);
            } else {
                $array[$k] = DatabaseSql::escape($v);
            }
        }
        return $array;
    }
    /**
     * Generates a random password drawn from the defined set of characters.
     * @return string The random password.
     */
    public static function generatePassword($length = 12) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
        $password = '';
        for($i = 0; $i < $length; $i++)
            $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        return $password;
    }
    /** Encodes a SQL array into a JSON formated string. */
    public static function jsonEncode($sqlArray){
        if(version_compare(PHP_VERSION, '5.2', '<')) {
            echo '{failure:true}';
        } else {
            $data = json_encode($sqlArray);  //encode the data in json format
        }
        return $data;
    }
    /** Encodes a YYYY-MM-DD into a MM-DD-YYYY string. */
    public static function codeDate($date) {
        $tab = explode ('-', $date);
        $r = $tab[1] . '/' . $tab[2] . '/' . $tab[0];
        return $r;
    }
    /** Is empty. */
    public static function isEmpty($v) {
        return empty($v);
    }
    /** Is array associative. */
    public static function isArrayAssociative($ary) {
        foreach(array_keys($ary) as $k => $v) {
            if($k !== $v) {return true;}
        }
        return false;
    }
    /** Strip whitespace from the beginning and end of a string. */
    public static function stringTrim($str) {
        return trim($str);
    }
    /** If magic_quotes_gpc is enabled, then strip slashes which has already been escaped. */
    public static function stringStripSlashes($str) {
        return stripslashes($str);
    }
}