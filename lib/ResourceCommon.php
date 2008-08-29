<?php
/**
@file
    ResourceCommon.php
@brief
    Copyright 2008 Creative Crew. All rights reserved.
@author
    William Chang
@version
    0.1
@date
    - Created: 2008-07-06
    - Modified: 2008-07-10
    .
@note
    References:
    - General:
        - http://us.php.net/manual/en/language.functions.php
        .
    .
*/

include_once('ClassHeader.php');

/** @class ResourceCommon */
class ResourceCommon {
    protected $l10n;

    /** Retrieve a translated string. A convenience function which retrieves the translated string from the translate(). */
    public static function __($text, $domain = 'default') {
        return translate($text, $domain);
    }
    /** Display a translated string. A convenience function which displays the returned translated text from translate(). */
    public static function _e($text, $domain = 'default') {
        echo translate($text, $domain);
    }
    /** Retrieve the translated text. */
    public static function translate($text, $domain = 'default') {
        if(isset($this->l10n[$domain])) {
            // TODO: Domain translated text.
            return $text;
        } else {
            return $text;
        }
    }
}