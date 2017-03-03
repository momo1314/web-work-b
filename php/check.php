<?php
session_start();
$return = array();
if(!empty($_SESSION['uid']))
{
    $uid = $_SESSION['uid'];
    try 
            {
                $config = require_once './config.php';
                $pdo = new PDO($config['dsn'], $config['user'], $config['password']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $res = $pdo->query("select uid,username,time,img from user");
                while($row=$data = $res->fetch(PDO::FETCH_ASSOC)){
                     echo json_encode($row).',';
                 }
            }
    catch (PDOException $exception) 
    {
        $return['status'] = 'flase'; 
        echo json_encode($return);
    }
}
else
{
    $return['status'] = 'flase'; 
    echo json_encode($return);
}
?>
