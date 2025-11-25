<?php 
    require_once '../connection.php'; 
    session_start();
    $login=$_POST['login'];
    $password=$_POST['password'];
    $query = $db->prepare("SELECT id,login FROM user WHERE login=:login AND password=:password");
    $query->execute(array('login' => $login, 'password' => $password));
    $array=$query->fetch(PDO::FETCH_ASSOC);
    if($array["id"]>0){
      $_SESSION['login']=$array['login'];
      header('Location:index.php');
    }
    else{
      header('Location:signin.php');
    }
?>