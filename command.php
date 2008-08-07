<?php
//include_once('lib/DatabaseSingleton.php');
//$test1 = DatabaseSingleton::getInstance();
//echo $test1->getDatabaseSql()->strTableCharset;
//echo '<br/>';
//echo $test1->getHelloWorld();
//echo '<br/>';

//include_once('lib/DatabaseUpdate-mysql.php');
//$test2 = new DatabaseUpdate($test1->getDatabaseSql());
//$test2->installApplication('admin', 'lost@aol.com');
//echo 'Instruction pointer passed here 1.';
//echo '<br/>';

//include_once('lib/ClassHelloWorld.php');
//include_once('lib/Json.php');
//$test3 = new ClassHelloWorld();
//$test3->setMessage('Going through the class methods.');
//echo $test3->getMessage();
//echo '<br/>';
//echo 'Instruction pointer passed here 2.';
//echo '<br/>';

//$tables = array(
//    'key1' => 'val1',
//    'key2' => 'val2',
//    'key3' => 'val3'
//);
//$hasSeparator = false;
//foreach($tables as $key => $value) {
//    if($hasSeparator) {
//        echo ', ';
//    }
//    $hasSeparator = true;
//    echo 'Key: ' . $key . ' Value: ' . $value;
//}

//echo json_encode(Json::reflectObjectMethods($test3));

include_once('lib/Json.php');
echo Json::rpc(array('json' => '{"jsonrpc":"2.0", "method":"getPrefixes", "params":[], "id":1}'));