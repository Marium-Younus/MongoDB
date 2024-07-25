<?php
//connect to mongodb database
$man = new MongoDB\Driver\Manager('mongodb://localhost:27017');
var_dump($man);


//display dbstats
// $man = new MongoDB\Driver\Manager('mongodb://localhost:27017');
// $stats = new MongoDB\Driver\Command(["dbstats" => 1]);
// $res = $man->executeCommand("aptech",$stats);
// $result = $res->toArray();
// print_r($result);

//list of databases
// $man = new MongoDB\Driver\Manager('mongodb://localhost:27017');
// $dbs = new MongoDB\Driver\Command(["listDatabases" => 1]);
// $res = $man->executeCommand("admin",$dbs);   //only admin database is used to list all databases
// $dbs = current($res->toArray());
// // var_dump($dbs);

// foreach($dbs->databases as $db)
// {
//     echo "$db->name <br>";
// }



//read all data
// $man = new MongoDB\Driver\Manager('mongodb://localhost:27017');
// $query = new MongoDB\Driver\Query([]);
// $rows = $man->executeQuery("lectures.users", $query);

// foreach($rows as $row)
// {
//     echo "<img src='$row->pic' width='100px' /> <br>";
//     echo "<b>Name:</b> $row->name <b>Age:</b> $row->age <br><br>";
// }


//read data with filter, projection, sort and limit

$man = new MongoDB\Driver\Manager('mongodb://localhost:27017');

$filter = ['age' => ['$gt' => 10]];  //or $filter = ['name' => 'Ali'] or $filter = []
$options = [
    'projection' => ['_id' => 0],
    'sort' => ['age' => -1],
    // 'limit' => 3
];              //or $options = ['projection' => ['_id' => 0]] or $options = ['sort' => ['name' => -1]] or $options= []

$query = new MongoDB\Driver\Query($filter, $options);
$rows = $man->executeQuery("lectures.users", $query);

foreach ($rows as $row) {
    echo "<img src='$row->pic' width='100px' /> <br>";
    echo "<b>Name:</b> $row->name <b>Age:</b> $row->age <br><br>";
}


//write data using bulkWrite

// $man = new MongoDB\Driver\Manager('mongodb://localhost:27017');
// $bulk= new MongoDB\Driver\BulkWrite;

// $bulk->insert(['_id'=>'usr106','name'=>'Laiba', 'age'=>20,'pic'=>'img/hira.png']);
// //$bulk->update(['_id'=>'usr102'], [$set => ['name' => 'Iqra Khan', 'age'=>29, 'pic'=>'img/iqra.png'] ]);
// // $bulk->delete(['_id'=>'usr107']);


// //Object Id Auto-Generated Insert

// // $doc = ['_id' => new MongoDB\BSON\ObjectID,'name'=>'Laiba', 'age'=>20,'pic'=>'img/hira.png'];
// // $bulk->insert($doc);


// $res = $man->executeBulkWrite('lectures.users',$bulk);
// if($res-> getInsertedCount() > 0)           //getModifiedCount()  or getDeletedCount()
// {
//     echo "Data Inserted Successfully<br><br>";
// }


?>