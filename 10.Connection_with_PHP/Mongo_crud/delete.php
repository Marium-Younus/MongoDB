<?php

$id = $_GET['sid'];
if(isset($id))
{
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->delete(['_id' => $id]);

    $res = $mng->executeBulkWrite('lectures.users', $bulk);
    if($res->getDeletedCount() > 0 )
    {
        echo "<script> window.location = 'main.php';</script>";
    }
}

?>