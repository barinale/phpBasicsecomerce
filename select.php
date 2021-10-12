<?php
    require_once('connection.php');
    if(isset($_GET['table'])&&isset($_GET['id'])){
        $table = $_GET['table'];
        $id = $_GET['id'];
        $query = "select * from $table where id=$id";
        $row =mysqli_query($con,$query) or die(mysqli_error($con));
        $res = mysqli_fetch_assoc($row);
         header('Content-Type: application/json');
        echo json_encode($res);
    }