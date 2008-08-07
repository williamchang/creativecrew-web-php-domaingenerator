<?php
/**
@file
    Json.php
@brief
    Coming soon.
@author
    William Chang
@version
    0.1
@date
    - Created: 2008-07-27
    - Modified: 2008-07-28
    .
@note
    References:
    - General:
        - http://us.php.net/language.oop5.reflection
        - http://squio.nl/blog/2006/10/17/php-refection-and-json-stream-your-objects/
        - http://us.php.net/manual/en/language.variables.superglobals.php
        .
    .
*/

include_once('ClassHeader.php');

/** @class Json */
class Json {
    // HTTP content types definitions.
    const HTTP_CONTENTTYPE_JSON = 'application/json';
    const HTTP_CONTENTTYPE_TEXT = 'text/plain';
    const HTTP_CONTENTTYPE_FORM = 'application/x-www-form-urlencoded';
    // Character sets and encodings definitions.
    const CHARACTER_ENCODING_UTF8 = 'charset=utf-8';
    // JSON-RPC version (http://json-rpc.org) definition.
    const JSON_RPC_VERSION = '2.0';

    /**
     * Perform JSON RPC.
     * @param array $aryAssociative From HTTP post (form) request method.
     * @return string Serialize (encode) JSON.
     */
    public static function rpc($aryAssociative) {
        // Deserialize.
        $jsonInput = self::deserialize($aryAssociative['json']);
        if(ApplicationCommon::hasValue($jsonInput)) {
            $method = $jsonInput['method'];
            $arguments = $jsonInput['params'];
            $id = $jsonInput['id'];
        } else {
            echo '<br/>JSON Decode (Deserialize) Error.<br/>';
            return self::createJsonRpcResponse(null, null);
        }
        // Determine what method to call server-side.
        switch($method) {
            case 'createPrefix':
                $dbTable = new TableList();
                $dbTable->setDatabaseSql(DatabaseSingleton::getInstance()->getDatabaseSql());
                $data = $dbTable->createPrefix($arguments[0]);
                break;
            case 'createPostfix':
                $dbTable = new TableList();
                $dbTable->setDatabaseSql(DatabaseSingleton::getInstance()->getDatabaseSql());
                $data = $dbTable->createPostfix($arguments[0]);
                break;
            case 'getPrefixes':
                $dbTable = new TableList();
                $dbTable->setDatabaseSql(DatabaseSingleton::getInstance()->getDatabaseSql());
                $data = $dbTable->getPrefixes();
                break;
            case 'getPostfixes':
                $dbTable = new TableList();
                $dbTable->setDatabaseSql(DatabaseSingleton::getInstance()->getDatabaseSql());
                $data = $dbTable->getPostfixes();
                break;
            case 'removePrefix':
                $dbTable = new TableList();
                $dbTable->setDatabaseSql(DatabaseSingleton::getInstance()->getDatabaseSql());
                $data = $dbTable->removePrefix($arguments[0]);
                break;
            case 'removePostfix':
                $dbTable = new TableList();
                $dbTable->setDatabaseSql(DatabaseSingleton::getInstance()->getDatabaseSql());
                $data = $dbTable->removePostfix($arguments[0]);
                break;
            default:
                echo '<br/>Method not found or arguments are incorrect.<br/>';
                ApplicationCommon::debugArrayAssociative($aryAssociative);
                $data = null;
                break;
        }
        return self::createJsonRpcResponse($data, $id);
    }
    /** Serialize (encode) object to a JSON (JavaScript Object Notation) string. */
    public static function serialize($obj) {
        return json_encode($obj);
    }
    /** Deserialize (decode) JSON (JavaScript Object Notation) string to an object. */
    public static function deserialize($str) {
        return json_decode(stripslashes($str), true);
    }
    /** Create JSON RPC request. */
    public static function createJsonRpcRequest($method, $params, $id) {
        $data = array(
            'jsonrpc' => self::JSON_RPC_VERSION,
            'method' => $result,
            'params' => $error,
            'id' => $id
        );
        return self::serialize($data);
    }
    /** Create JSON RPC reponse. */
    public static function createJsonRpcResponse($result, $id, $error = null) {
        $data = array(
            'jsonrpc' => self::JSON_RPC_VERSION,
            'result' => $result,
            'error' => $error,
            'id' => $id
        );
        return self::serialize($data);
    }
    /** Reflect object methods. */
    public static function reflectObjectMethods($myObj) {
        $reflect = new ReflectionClass($myObj);
        $data = array();
        foreach(array_values($reflect->getMethods()) as $method) {
            if((0 === strpos($method->name, "get")) && $method->isPublic()) {
                $name = $method->name;
                $value = $method->invoke($myObj);
                if('object' === gettype($value)) {
                    $value = self::reflectObjectMethods($value);
                }
                $data[$name] = $value;
            }
        }
        return $data;
    }
}