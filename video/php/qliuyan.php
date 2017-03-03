<?php
$return = array();
try{
        $config = require_once './config.php';
        $pdo = new PDO($config['dsn'], $config['user'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $res = $pdo->query("select * from liuyan");
        while($row=$data = $res->fetch(PDO::FETCH_ASSOC)){
                $row['content'] = stripcslashes($row['content']);
                echo json_encode($row).',';
        }
    }
    catch (PDOException $exception) {
        $return['status'] = 'flase';
        echo json_encode($return);
    }