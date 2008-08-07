<?php
/**
@file
    DatabaseCommon.php
@brief
    Coming soon.
@author
    William Chang
@version
    0.1
@date
    - Created: 2008-07-30
    - Modified: 2008-07-31
    .
@note
    References:
    - General:
        - http://us.php.net/split
        - http://us.php.net/foreach
        .
    .
*/

include_once('ClassHeader.php');

/** @class DatabaseCommon */
class DatabaseCommon {
    // SQL data return type definitions.
    const SQL_DATA_RETURN_BOOLEAN = 'boolean';
    const SQL_DATA_RETURN_INTEGER = 'integer';
    const SQL_DATA_RETURN_OBJECT = 'object';
    const SQL_DATA_RETURN_ARRAY_NUMBER = 'array_number';
    const SQL_DATA_RETURN_ARRAY_ASSOCIATIVE = 'array_associative';
    const SQL_DATA_RETURN_ARRAY_BOTH = 'array_both';
    // Database fields.
    protected $_dbUsername = false;
    protected $_dbPassword = false;
    protected $_dbName = false;
    protected $_dbHost = false;
    // Debug fields.
    protected $_timer = 0;
    // SQL fields.
    public $sqlConnection = null;
    public $sqlResource = null;
    // Query insert, update, delete, replace fields.
    public $sqlRowsAffected = -1;
    // Query insert, replace fields.
    public $sqlInsertId = -1;
    // Query select, show fields.
    public $sqlResults = null;
    public $sqlFieldColumns = null;
    public $sqlRowsTotal = -1;

    /** Default constructor. */
    public function __construct($username = '', $password = '', $name = '', $host = 'localhost') {
        $this->_dbUsername = $username;
        $this->_dbPassword = $password;
        $this->_dbHost = $host;
        $this->_dbName = $name;
    }
    /** Default destructor. */
    public function __destruct() {}
    /** Connect to database server. */
    public function connect($username = '', $password = '', $host = 'localhost') {
        $isVerified = false;

        if(!$username) {
            // TODO: Report error.
        } else if(!$this->sqlConnection = @mysql_connect($host, $username, $password, true)) {
            // TODO: Report error.
        } else {
            $this->_dbUsername = $username;
            $this->_dbPassword = $password;
            $this->_dbHost = $host;
            $isVerified = true;
        }
        return $isVerified;
    }
    /** Quick connect to database server. */
    public function connectQuick($username = '', $password = '', $databaseName = '', $host = 'localhost') {
        $isVerified = false;

        if(!$this->connect($username, $password, $host, true)) {
            // TODO: Report error.
        } else if(!$this->select($databaseName)) {
            // TODO: Report error.
        } else {
            $isVerified = true;
        }
        return $isVerified;
    }
    /** Select database. */
    public function select($databaseName) {
        $isVerified = false;

        if(!$databaseName) { // Must have a database name.
            // TODO: Report error.
        } else if(!$this->sqlConnection) { // Must have an active SQL connection.
            // TODO: Report error.
        } else if(!@mysql_select_db($databaseName, $this->sqlConnection)) { // Try to select the database.
            // TODO: Report error.
        } else {
            $this->_dbName = $databaseName;
            $isVerified = true;
        }
        return $isVerified;
    }
    /** Clean (sanitize) for use in a SQL statement before performing a query. */
    public function sanitize($v, $quotes = true) {
        if(is_array($v)) {
            // Run through array item through this function (by reference).
            foreach($v as &$value) {
                $value = $this->sanitize($value);
            }
        } else if(is_null($v)) {
            $v = 'NULL';
        } else if(is_bool($v)) {
            $v = ($v) ? 1 : 0;
        } else if(is_string($v)) {
            // If there is no existing database connection, then try to connect again.
            if(!isset($this->sqlConnection) || !$this->sqlConnection) {
                $this->connect($this->_dbUsername, $this->_dbPassword, $this->_dbHost);
                $this->select($this->_dbName);
            }
            // Escapes special characters in a string for use in a SQL statement.
            $v = mysql_real_escape_string(FunctionCommon::stringStripSlashes(FunctionCommon::stringTrim($v)));
            if($quotes) {
                $v = "'" . $v . "'";
            }
        }
        return $v;
    }
    /** Run SQL statement. */
    public function runSqlStatement($strStatement, $returnType) {
        $strError = '';

        // If there is no existing database connection, then try to connect again.
        if(!isset($this->sqlConnection) || !$this->sqlConnection) {
            $this->connect($this->_dbUsername, $this->_dbPassword, $this->_dbHost);
            $this->select($this->_dbName);
        }
        // Perform the query.
        $this->sqlResource = @mysql_query($strStatement, $this->sqlConnection);
        // If errors, then report it.
        $strError = mysql_error($this->sqlConnection);
        if(!empty($strError)) {
            // TODO: Report error.
            return false;
        }

        // Query was an insert, update, delete, replace.
        if(preg_match("/^(insert|delete|update|replace)\\s+/i", $strStatement)) {
            $this->sqlRowsAffected = mysql_affected_rows($this->sqlConnection);
            // Get insert id.
            if(preg_match("/^(insert|replace)\\s+/i", $strStatement)) {
                $this->sqlInsertId = mysql_insert_id($this->sqlConnection);
            }
            // Return number of rows affected.
            return $this->sqlRowsAffected;
        } else { // Query was a select, show.
            // Get column names.
            $i = 0;
            while($i < mysql_num_fields($this->sqlResource)) {
                $this->sqlFieldColumns[$i] = mysql_fetch_field($this->sqlResource);
                $i++;
            }
            // Get results from query.
            switch($returnType) {
                case self::SQL_DATA_RETURN_OBJECT:
                    $i = 0;
                    while(true) {
                        $row = mysql_fetch_object($this->sqlResource);
                        if(empty($row)) {break;}
                        $this->sqlResults[$i] = $row;
                        $i++;
                    }
                    break;
                case self::SQL_DATA_RETURN_ARRAY_NUMBER:
                    $i = 0;
                    while(true) {
                        $row = mysql_fetch_array($this->sqlResource, MYSQL_NUM);
                        if(empty($row)) {break;}
                        $this->sqlResults[$i] = $row;
                        $i++;
                    }
                    break;
                case self::SQL_DATA_RETURN_ARRAY_ASSOCIATIVE:
                    $i = 0;
                    while(true) {
                        $row = mysql_fetch_array($this->sqlResource, MYSQL_ASSOC);
                        if(empty($row)) {break;}
                        $this->sqlResults[$i] = $row;
                        $i++;
                    }
                    break;
                case self::SQL_DATA_RETURN_ARRAY_BOTH:
                    $i = 0;
                    while(true) {
                        $row = mysql_fetch_array($this->sqlResource, MYSQL_BOTH);
                        if(empty($row)) {break;}
                        $this->sqlResults[$i] = $row;
                        $i++;
                    }
                    break;
                default:
                    // TODO: Report error.
                    break;
            }
            $this->sqlRowsTotal = mysql_num_rows($this->sqlResource);
            // Free result from memory.
            mysql_free_result($this->sqlResource);
            // Return.
            return $this->sqlResults;
        }
    }
    /** Get database date. */
    public function getDatabaseDate() {
        return 'NOW()';
    }
    /** Select columns from table using dynamic SQL. */
    public function dynamicSqlStatement($strStatement, $returnType = self::SQL_DATA_RETURN_ARRAY_NUMBER) {
        return $this->runSqlStatement($strStatement, $returnType);
    }
    /** Select (many rows) columns from table using dynamic SQL. */
    public function dynamicSqlSelect($aryAssociativeParameters, $strTableName, $strWhereClause, $returnType = self::SQL_DATA_RETURN_ARRAY_NUMBER) {
        return $this->dynamicSqlSelectOptions($aryAssociativeParameters, $strTableName, $strWhereClause, null, $returnType);
    }
	/** Select (one row) columns from table using dynamic SQL. */
    public function dynamicSqlSelectSingle($aryAssociativeParameters, $strTableName, $strWhereClause, $returnType = self::SQL_DATA_RETURN_ARRAY_NUMBER) {
        return $this->dynamicSqlSelectOptions($aryAssociativeParameters, $strTableName, $strWhereClause, 'LIMIT 1', $returnType);
    }
    /** Select (many row) columns with options (e.g. GROUP BY, HAVING, ORDER BY, LIMIT) from table using dynamic SQL. */
    public function dynamicSqlSelectOptions($aryAssociativeParameters, $strTableName, $strWhereClause, $strOptionClause, $returnType = self::SQL_DATA_RETURN_ARRAY_NUMBER) {
        $strSelectClause = 'SELECT *';
        $strFieldColumns = '';
        $hasSeparator = false;

        if(!FunctionCommon::isEmpty($aryAssociativeParameters)) {
            foreach($aryAssociativeParameters as $key => $value) {
                // Separated by a comma for next object.
                if($hasSeparator) {
                    $strFieldColumns .= ', ';
                }
                $hasSeparator = true;
                $strFieldColumns .= $key;
            }
            $strSelectClause = 'SELECT ' . $strFieldColumns;
        }
        if(!FunctionCommon::isEmpty($strWhereClause)) {
            $strWhereClause = ' WHERE ' . $strWhereClause;
        } else {
            $strWhereClause = '';
        }
        if(!FunctionCommon::isEmpty($strOptionClause)) {
            $strOptionClause = ' ' . $strOptionClause;
        } else {
            $strOptionClause = '';
        }
        return $this->dynamicSqlStatement($strSelectClause . ' FROM ' . $strTableName . $strWhereClause . $strOptionClause . ';', $returnType);
    }
    /** Count selected rows from table using dynamic SQL. */
    public function dynamicSqlCount($strTableName, $strWhereClause) {
        if(!FunctionCommon::isEmpty($strWhereClause)) {
            $strWhereClause = ' WHERE ' . $strWhereClause;
        }
        return $this->dynamicSqlStatement('SELECT COUNT(*) FROM ' . $strTableName . $strWhereClause . ';',  self::SQL_DATA_RETURN_INTEGER);
    }
    /** Insert row into table using dynamic SQL. */
    public function dynamicSqlInsert($aryAssociativeParameters, $strTableName) {
        $strFieldColumns = '';
        $strFieldValues = '';
        $hasSeparator = false;

        if(!FunctionCommon::isEmpty($aryAssociativeParameters)) {
            foreach($aryAssociativeParameters as $key => $value) {
                // Separated by a comma for next object.
                if($hasSeparator) {
                    $strFieldColumns .= ', ';
                    $strFieldValues .= ', ';
                }
                $hasSeparator = true;
                $strFieldColumns .= $key;
                $strFieldValues .= $this->sanitize($value);
            }
            $strSelectClause = 'SELECT ' . $strFieldColumns;
        }
        return $this->dynamicSqlStatement('INSERT INTO ' . $strTableName . ' ( ' . $strFieldColumns . ' ) VALUES ( ' . $strFieldValues . ' );', self::SQL_DATA_RETURN_INTEGER);
    }
    /** Update table columns using dynamic SQL. */
    public function dynamicSqlUpdate($aryAssociativeParameters, $strTableName, $strWhereClause) {
        $strSetClause = '';
        $hasSeparator = false;

        if(!FunctionCommon::isEmpty($aryAssociativeParameters)) {
            foreach($aryAssociativeParameters as $key => $value) {
                // Separated by a comma for next object.
                if($hasSeparator) {
                    $strSetClause .= ', ';
                }
                $hasSeparator = true;
                $strSetClause .= $key . ' = ' . $this->sanitize($value);
            }
            $strSelectClause = 'SELECT ' . $strFieldColumns;
        }
        return $this->dynamicSqlStatement('UPDATE ' . $strTableName . ' SET ' . $strSetClause . ' WHERE ' . $strWhereClause . ';', self::SQL_DATA_RETURN_BOOLEAN);
    }
    /** Delete rows from table using dynamic SQL. */
    public function dynamicSqlDelete($strTableName, $strWhereClause) {
        return $this->dynamicSqlStatement('DELETE FROM ' . $strTableName . ' WHERE ' . $strWhereClause . ';', self::SQL_DATA_RETURN_BOOLEAN);
    }
    /** Truncate table (clear data in table) using dynamic SQL. */
    public function dynamicSqlTruncateTable($strTableName) {
        return $this->dynamicSqlStatement('TRUNCATE TABLE ' . $strTableName . ';', self::SQL_DATA_RETURN_BOOLEAN);
    }
    /** Start timer for debugging purposes. */
    public function timerStart() {
        $mtime = microtime();
        $mtime = explode(' ', $mtime);
        $this->_timer = $mtime[1] + $mtime[0];
        return true;
    }
    /** Stop timer for debugging purposes. */
    public function timerStop() {
        $mtime = microtime();
        $mtime = explode(' ', $mtime);
        $timeEnd = $mtime[1] + $mtime[0];
        return $timeEnd - $this->_timer;
    }
}