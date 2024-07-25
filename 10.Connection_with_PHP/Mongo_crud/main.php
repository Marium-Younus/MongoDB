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
        <a href='register.php'>Add New User</a>
        <h1 class="text-center">Mongo with PHP</h1>
        <table class="table table-responsive table-bordered">
            <tr>
                <th>S.No</th>
                <th>Id</th>
                <th>Name</th>
                <th>Age</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>

        <?php
             $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
             $query = new MongoDB\Driver\Query([]);  
             $rows = $mng->executeQuery("lectures.users", $query);
             $sno = 1;
             foreach ($rows as $row) 
             {
                echo "<tr>";
                echo "<td>$sno</td>";
                echo "<td> $row->_id</td>";
                echo "<td>$row->name</td>";
                echo "<td>$row->age </td>";
                 echo "<td><img src='".$row->pic."' width='100px' /></td>";
                 echo "<td> <a class='btn btn-info' href='edit.php?sid=".$row->_id."'>Edit</a> 
                 &nbsp;&nbsp;
                 <a class='btn btn-danger' href='delete.php?sid=".$row->_id."'>Delete</a></td>";
                 echo"</tr>";
                 $sno++;
             }
        ?>
        </table>
    </div>
</body>
</html>