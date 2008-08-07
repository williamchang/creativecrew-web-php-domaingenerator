<?php
/**
@file
    DatabaseUpdate-mysql.php
@brief
    Coming soon.
@author
    WordPress Developers, William Chang
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

class DatabaseUpdate {
    protected $_objDbSql = null;

    /** Default constructor. */
    public function __construct($objDatabaseSql) {
        $this->_objDbSql = $objDatabaseSql;
    }
    /** Default destructor. */
    public function __destruct() {}
    /** Install application. */
    public function installApplication($userName, $userEmail) {
        $this->createDatabase();

        // Create default user.  If the user already exists, the user tables are being shared among applications.
        //$userId = usernameExists($userName);
        if(!$userId) {
            $randomPassword = FunctionCommon::generatePassword();
            //$userId = createUser($userName, $randomPassword, $userEmail);
        } else {
            $randomPassword = __('User already exists. Password inherited.');
        }

        return array('user_id' => $userId, 'user_password' => $randomPassword);
    }
    /** Install application with default values. */
    public function installApplicationDefaults() {}
    /** Create database. */
    public function createDatabase() {
        $alterations = $this->deltaDatabase(DatabaseSchema::getSchema($this->_objDbSql));
        echo '<ol>';
        foreach($alterations as $alteration) echo '<li>' . $alteration . '</li>';
        echo '</ol>';
    }
    /** Create database silently. */
    public function createDatabaseSilent() {
        $alterations = $this->deltaDatabase(DatabaseSchema::getSchema($this->_objDbSql));
    }
    /** Delta database. */
    public function deltaDatabase($queries, $execute = true) {
        // Separate individual queries into an array.
        if(!is_array($queries)) {
            $queries = explode(';', $queries);
            if('' == $queries[count($queries) - 1]) {
                array_pop($queries);
            }
        }

        $aryCreateQueries = array(); // Creation queries.
        $aryInsertQueries = array(); // Insertion queries.
        $aryForUpdate = array();

        // Create a tablename index for an array ($aryCreateQueries) of queries.
        foreach($queries as $qry) {
            if(preg_match('|CREATE TABLE ([^ ]*)|', $qry, $matches)) {
                $aryCreateQueries[strtolower($matches[1])] = $qry;
                $aryForUpdate[$matches[1]] = 'Created table ' . $matches[1];
            }
            else if(preg_match('|CREATE DATABASE ([^ ]*)|', $qry, $matches)) {
                array_unshift($aryCreateQueries, $qry);
            }
            else if(preg_match('|INSERT INTO ([^ ]*)|', $qry, $matches)) {
                $aryInsertQueries[] = $qry;
            }
            else if(preg_match('|UPDATE ([^ ]*)|', $qry, $matches)) {
                $aryInsertQueries[] = $qry;
            }
            else {
                // TODO: Unrecognized query type.
            }
        }

        // Check to see which tables and fields exist.
        $tables = $this->_objDbSql->getColumn('SHOW TABLES;');
        if(!empty($tables)) {
            // For every table in the database.
            foreach($tables as $table) {
                // If a table query exists for the database table.
                if(array_key_exists(strtolower($table), $aryCreateQueries)) {
                    // Clear the field and index arrays.
                    unset($cfields);
                    unset($indices);
                    // Get all of the field names in the query from between the parentheses.
                    preg_match("|\((.*)\)|ms", $aryCreateQueries[strtolower($table)], $match2);
                    $qryline = trim($match2[1]);

                    // Separate field lines into an array.
                    $flds = explode("\n", $qryline);

                    //echo "<hr/><pre>\n".print_r(strtolower($table), true).":\n".print_r($aryCreateQueries, true)."</pre><hr/>";

                    // For every field line specified in the query
                    foreach($flds as $fld) {
                        // Extract the field name.
                        preg_match("|^([^ ]*)|", trim($fld), $fvals);
                        $fieldname = $fvals[1];

                        // Verify the found field name.
                        $validfield = true;
                        switch(strtolower($fieldname)) {
                        case '':
                        case 'primary':
                        case 'index':
                        case 'fulltext':
                        case 'unique':
                        case 'key':
                            $validfield = false;
                            $indices[] = trim(trim($fld), ", \n");
                            break;
                        }
                        $fld = trim($fld);

                        // If it's a valid field, add it to the field array.
                        if($validfield) {
                            $cfields[strtolower($fieldname)] = trim($fld, ", \n");
                        }
                    }

                    // Fetch the table column structure from the database.
                    $tablefields = $this->_objDbSql->getResults("DESCRIBE {$table};");

                    // For every field in the table.
                    foreach($tablefields as $tablefield) {
                        // If the table field exists in the field array.
                        if(array_key_exists(strtolower($tablefield->Field), $cfields)) {
                            // Get the field type from the query.
                            preg_match("|" . $tablefield->Field . " ([^ ]*( unsigned)?)|i", $cfields[strtolower($tablefield->Field)], $matches);
                            $fieldtype = $matches[1];

                            // Is actual field type different from the field type in query?
                            if($tablefield->Type != $fieldtype) {
                                // Add a query to change the column type.
                                $aryCreateQueries[] = "ALTER TABLE {$table} CHANGE COLUMN {$tablefield->Field} " . $cfields[strtolower($tablefield->Field)];
                                $aryForUpdate[$table . '.' . $tablefield->Field] = "Changed type of {$table}.{$tablefield->Field} from {$tablefield->Type} to {$fieldtype}";
                            }

                            // Get the default value from the array.
                            //echo "{$cfields[strtolower($tablefield->Field)]}<br>";
                            if(preg_match("| DEFAULT '(.*)'|i", $cfields[strtolower($tablefield->Field)], $matches)) {
                                $default_value = $matches[1];
                                if($tablefield->Default != $default_value) {
                                    // Add a query to change the column's default value.
                                    $aryCreateQueries[] = "ALTER TABLE {$table} ALTER COLUMN {$tablefield->Field} SET DEFAULT '{$default_value}'";
                                    $aryForUpdate[$table . '.' . $tablefield->Field] = "Changed default value of {$table}.{$tablefield->Field} from {$tablefield->Default} to {$default_value}";
                                }
                            }

                            // Remove the field from the array (so it's not added).
                            unset($cfields[strtolower($tablefield->Field)]);
                        } else {
                            // This field exists in the table, but not in the creation queries?
                        }
                    }

                    // For every remaining field specified for the table.
                    foreach($cfields as $fieldname => $fielddef) {
                        // Push a query line into $aryCreateQueries that adds the field to that table.
                        $aryCreateQueries[] = "ALTER TABLE {$table} ADD COLUMN $fielddef";
                        $aryForUpdate[$table . '.' . $fieldname] = 'Added column ' . $table . '.' . $fieldname;
                    }

                    // Index stuff goes here.
                    // Fetch the table index structure from the database.
                    $tableindices = $this->_objDbSql->get_results("SHOW INDEX FROM {$table};");

                    if($tableindices) {
                        // Clear the index array.
                        unset($index_ary);

                        // For every index in the table.
                        foreach($tableindices as $tableindex) {
                            // Add the index to the index data array.
                            $keyname = $tableindex->Key_name;
                            $index_ary[$keyname]['columns'][] = array('fieldname' => $tableindex->Column_name, 'subpart' => $tableindex->Sub_part);
                            $index_ary[$keyname]['unique'] = ($tableindex->Non_unique == 0) ? true : false;
                        }

                        // For each actual index in the index array.
                        foreach($index_ary as $index_name => $index_data) {
                            // Build a create string to compare to the query.
                            $index_string = '';
                            if($index_name == 'PRIMARY') {
                                $index_string .= 'PRIMARY ';
                            }
                            else if($index_data['unique']) {
                                $index_string .= 'UNIQUE ';
                            }
                            $index_string .= 'KEY ';
                            if($index_name != 'PRIMARY') {
                                $index_string .= $index_name;
                            }
                            $index_columns = '';
                            // For each column in the index.
                            foreach($index_data['columns'] as $column_data) {
                                if($index_columns != '') $index_columns .= ',';
                                // Add the field to the column list string.
                                $index_columns .= $column_data['fieldname'];
                                if($column_data['subpart'] != '') {
                                    $index_columns .= '(' . $column_data['subpart'] . ')';
                                }
                            }
                            // Add the column list to the index create string.
                            $index_string .= ' (' . $index_columns . ')';
                            if(!(($aindex = array_search($index_string, $indices)) === false)) {
                                unset($indices[$aindex]);
                                //echo "<pre style=\"border:1px solid #ccc;margin-top:5px;\">{$table}:<br />Found index:".$index_string."</pre>\n";
                            }
                            //else echo "<pre style=\"border:1px solid #ccc;margin-top:5px;\">{$table}:<br /><b>Did not find index:</b>".$index_string."<br />".print_r($indices, true)."</pre>\n";
                        }
                    }

                    // For every remaining index specified for the table.
                    foreach((array) $indices as $index) {
                        // Push a query line into $aryCreateQueries that adds the index to that table.
                        $aryCreateQueries[] = "ALTER TABLE {$table} ADD $index";
                        $aryForUpdate[$table.'.'.$fieldname] = 'Added index ' . $table . ' ' . $index;
                    }

                    // Remove the original table creation query from processing.
                    unset($aryCreateQueries[strtolower($table)]);
                    unset($aryForUpdate[strtolower($table)]);
                } else {
                    // This table exists in the database, but not in the creation queries?
                }
            }
        }

        $allqueries = array_merge($aryCreateQueries, $aryInsertQueries);
        if($execute) {
            foreach($allqueries as $query) {
                //echo "<pre style=\"border:1px solid #ccc;margin-top:5px;\">".print_r($query, true)."</pre>\n";
                $this->_objDbSql->query($query);
            }
        }

        return $aryForUpdate;
    }
}