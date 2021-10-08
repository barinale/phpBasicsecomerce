<?php
    session_start();
    $num = array("status"=>"hh","group"=>"","message"=>"");
    if(isset($_POST) && isset($_POST['username'])&&isset($_POST['password'])){
        $username= $_POST['username'];
        $password = $_POST['password'];
    $con = mysqli_connect('localhost','root','','ecommerce') or die(mysqli_error($con));
    $query = "select * from member where nome='$username'and password='$password'";
    $res = mysqli_query($con,$query) or die(mysqli_error($con));
  if($row = mysqli_fetch_assoc($res)){
      $_SESSION['id'] = $row['id'];
      $_SESSION['group'] = $row['types'];
    $num['status']='ok';
    $num['group']=$row['types'];
    $num['message']="succes";
    }else{
        $num['status']='no';
        $num['group']='no grpup';
        $num['message']='false';
    }
    header('Content-Type: application/json');
    echo json_encode($num);
    

}
