<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Mongo with PHP</title>
</head>
<body>
    <div class="container">
        <br/>
        <br/>
        <a href='main.php'>Back</a>
        <br/><br/>
        <h1 class="text-left">Register User</h1>
        <br/>
        <form action="register.php" method="post">
            <div class="row">
                <div class="col-lg-4">
                    <label>Enter Id</label>
                    <input type="text" name="sid" class="form-control" />
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-4">
                    <label>Enter Name</label>
                    <input type="text" name="sname" class="form-control" />
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-4">
                    <label>Enter Age</label>
                    <input type="text" name="sage" class="form-control" />
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-4">
                    <label>Enter Image Path</label>
                    <input type="text" name="simg" class="form-control" />
                </div>
            </div>

            <br/>
            <div class="row">
                <div class="col-lg-4">
                    <input type="submit" name="btn" class="btn btn-primary" value="Add" />
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php

if(isset($_POST['btn']))
{
    $sid=$_POST['sid'];
    $sname=$_POST['sname'];
    $sage=$_POST['sage'];
    $simg=$_POST['simg'];

     $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert(['_id' => $sid, 'name' => $sname, 'age' => $sage, 'pic' => $simg]);    
 
    $res = $mng->executeBulkWrite('lectures.users', $bulk);
    if($res->getInsertedCount() > 0 )
    {
        echo "<script> alert('Data Inserted'); </script>";
        echo "<script> window.location = 'main.php';</script>";
    }

}



?>