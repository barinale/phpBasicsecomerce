<?php
    session_start();
    if(isset($_SESSION['id'])){
        require_once('connection.php');
        $query = 'select * from member;select * from product';
        $res = mysqli_multi_query($con,$query) or die(mysqli_error($con));
       
        // header('Content-Type: application/json');
        while(mysqli_next_result($res)){
            $rows = mysqli_fetch_all($res);
            echo "<pre>";
          print_r($rows);
        echo "</pre>";
    }
        // echo json_encode($rows);
    }
