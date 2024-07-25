<?php
   // connect to mongodb
//    $m = new MongoDB\Driver\Manager('mongodb://localhost:27017');
// 	var_dump($m);


//display dbstats
    // $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

//     $stats = new MongoDB\Driver\Command(["dbstats" => 1]);
//     $res = $mng->executeCommand("lectures", $stats);
//     $stats = current($res->toArray());
//     print_r($stats);


//list all databases
    // $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    // $listdatabases = new MongoDB\Driver\Command(["listDatabases" => 1]);
    // $res = $mng->executeCommand("admin", $listdatabases);
    // $databases = current($res->toArray());
    // foreach ($databases->databases as $el) {
    
    //     echo $el->name . "<br/>";
    // }


//read data
    // $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    // $query = new MongoDB\Driver\Query([]);  
    // $rows = $mng->executeQuery("lectures.student", $query);
    // foreach ($rows as $row) {
    
    //     echo "<img src='".$row->picture."' width='100px' /><br/>";
        // echo "$row->name : $row->age <br>";
        // echo"<br>";
    // }


//read data with filter, projection and limit
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    // $filter = ['age'=>['$gt'=>25]];    //or  $filter = ['age'=>25]; or 
    $filter = [];
    $options = [
        'projection' => ['_id' => 0],
        'sort' => ['age' => -1],
        // 'limit' => 2
    ]; // or $options = [] or $options = ['sort' => ['age' => 1]]

    $query = new MongoDB\Driver\Query($filter,$options);  
    $rows = $mng->executeQuery("lectures.student", $query);
    foreach ($rows as $row) {
        echo "<img src='".$row->picture."' width='100px' /><br/>";
        echo "$row->name : $row->age <br>";
        echo"<br>";
    }


//write data
    // $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    // $bulk = new MongoDB\Driver\BulkWrite;
    // $bulk->insert(['_id' => 'stu206', 'name' => 'Farhan', 'age' => 33, 'picture' => 'img/farhan.png']);
    // $bulk->insert(['_id' => 'stu207', 'name' => 'Rehan', 'age' => 23, 'picture' => 'img/rehan.png']);
    
    // // $doc = ['_id' => new MongoDB\BSON\ObjectID, 'name' => 'Tahir', 'age' => 26];
    // // $bulk->insert($doc);
    // // $bulk->update(['_id' => 'stu207'], ['$set' => ['age' => 24]]);
    // // $bulk->delete(['name' => 'Ali']);

    // $res = $mng->executeBulkWrite('lectures.student', $bulk);
    // if($res->getInsertedCount() > 0 )
    // {
    //     echo "Data Inserted";
    // }





?>