<?php
    require_once('connection.php');
    if(isset($_GET['id'])){
            $id = $_GET['id'];
            $table = $_GET['table'];
            $res = mysqli_query($con,"delete FROM $table where id=$id") or die(mysqli_error($con));
            
            echo "succes";
            
        
    }