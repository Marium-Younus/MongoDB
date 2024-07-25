<?php
//connect to mongodb database
$man = new MongoDB\Driver\Manager('mongodb://localhost:27017');
var_dump($man);
?>