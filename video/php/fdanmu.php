<?php
session_start();
if($_SESSION['uid']){
    $uid = $_SESSION['uid'];
}else{
    $uid = '1';
}
if (!empty($_POST)){
    if(isset($_POST['danmu']) && $_POST['danmu'] != '' &&
    isset($_POST['time']) && $_POST['time'] )
    {
        $danmu = $_POST['danmu'];
        $time = $_POST['time'];
        $r = '/^\"|\/|\\|\'| $/';
        if(preg_match($r, $danmu)){
            echo 'flase'
        }
        else{
            $data = addslashes($danmu);
            try{
                $config = require_once './config.php';
                $pdo = new PDO($config['dsn'], $config['user'], $config['password']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sel = "insert into danmu(uid,time,data) values ('$uid','$time','$data')";
                $res = $pdo->query($sel);
                if($res){
                    echo 'success';
                }
            catch(PDOException $e){
                    echo "flase";
                }
            }
        }
    }else{
        echo 'flase';
    }
}else{
    echo 'flase';
}