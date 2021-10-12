<?php
    session_start();
    if(isset($_SESSION['id'])){
        require_once('connection.php');
        $query = 'select * from member;';
        $res = mysqli_query($con,$query) or die(mysqli_error($con));
            $rows = mysqli_fetch_all($res);
            $data_all['member'] = $rows;
            mysqli_free_result($res);
            $query = 'select * from category';
            $res = mysqli_query($con,$query) or die(mysqli_error($con));
            $rows = mysqli_fetch_all($res);
            $data_all['category'] = $rows;
            mysqli_free_result($res);
             $query = 'select * from product';
            $res = mysqli_query($con,$query) or die(mysqli_error($con));
            $rows = mysqli_fetch_all($res);
            $data_all['product'] = $rows;
            mysqli_free_result($res);
            //getting information about user categroy

            $query = 'select * from member inner join type on member.types = type.id where member.id='.$_SESSION['id'];
            $res = mysqli_query($con,$query) or die(mysqli_error($con));
            $rows = mysqli_fetch_assoc($res);
            // echo "<pre>";
            // print_r($rows);
            // echo "</pre>";
            // echo $rows['type'];
            $data_all['type'] = $rows['type'];
            
            mysqli_free_result($res);
            
            header('Content-Type: application/json');

            //  echo '<pre>';
            //  print_r($data_all);
            //    echo '</pre>';
            // // echo "<pre>";
            // //   print_r($rows);
            // //  echo "</pre>";
      
      echo json_encode($data_all);
      
      // echo json_encode($rows);
      // echo json_encode($rows);
      mysqli_close($con);
    }
