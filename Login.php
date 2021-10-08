<?php
    session_start();
    $num = array("status"=>"","message"=>"");
    if(isset($_POST) && isset($_POST['username'])&&isset($_POST['password'])){
        $username= $_POST['username'];
        $password = $_POST['password'];
        require_once("connection.php");
        $query = "select * from member where nome='$username'and password='$password'";
    $res = mysqli_query($con,$query) or die(mysqli_error($con));
  if($row = mysqli_fetch_assoc($res)){
      $_SESSION['id'] = $row['id'];
      $_SESSION['group'] = $row['types'];
    $num['status']='ok';
    $num['message']="succes";
    }else{
        $num['status']='no';
        $num['message']='no user like that';
    }
    header('Content-Type: application/json');
    echo json_encode($num);
    mysqli_free_result($res);
    mysqli_close($con);
}
