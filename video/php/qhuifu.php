<?php
$return = array();
if (!empty($_POST)){
    if(isset($_POST['r_id']) && $_POST['r_id'] != ''){
        try{
                $config = require_once './config.php';
                $pdo = new PDO($config['dsn'], $config['user'], $config['password']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $res = $pdo->query("select status from liuyan where id = '{$r_id}'");
                if($res['status'] == '1'){
                    $res = $pdo->query("select * from huifu where r_id ='{$r_id}'");
                    while($row=$data = $res->fetch(PDO::FETCH_ASSOC)){
                            $row['content'] = stripcslashes($row['content']);
                            echo json_encode($row).',';
                        }
                    }else{
                        $return['status'] = 'flase';
                        echo json_encode($return);
                    }
                }
        catch (PDOException $exception) {
            $return['status'] = 'flase';
            echo json_encode($return);
        }
    }else{
         $return['status'] = 'flase';
        echo json_encode($return);
    }
}else{
     $return['status'] = 'flase';
    echo json_encode($return);
}