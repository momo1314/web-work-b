<?php
session_start();
$uid = $_SESSION['uid'];
if (!empty($_POST)){
    if(isset($_POST['time']) && $_POST['time'] != ''){
        $time = $_POST['time'];
        try{
            $config = require_once './config.php';
            $pdo = new PDO($config['dsn'], $config['user'], $config['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sel = "select * frmo danmu where time = '{$time}'";
            $res = $pdo->query($sel);
            $res['data'] = stripslashes($res['data']);
            echo json_encode($res);
        }
        catch(PDOException $exception){
            echo 'flase';
            }
        }else{
        echo 'flase';
        }
    }else{
    echo 'flase';
}