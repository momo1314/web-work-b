<?php
//楼中楼
session_start();
if($_SESSION['uid']){
    $uid = $_SESSION['uid'];
    if (!empty($_POST)){
        if(isset($_POST['data']) && $_POST['data'] != '' &&
            isset($_POST['r_id']) && $_POST['r_id'] != ''){
            $data = addslashes($_POST['data']);
            $r_id = $_POST['r_id'];
            try{
                $config = require_once './config.php';
                $pdo = new PDO($config['dsn'], $config['user'], $config['password']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $code = "select * from liuyan where id='{$r_id}'";
                $res = $pdo->query($code);
                if($res){
                    $fuid = $res['uid'];
                    $code = "update liuyan set status='1' where id='{$r_id}'";
                    $res = $pdo->query($code);
                    if($res){
                        $code = "insert into huifu(sender_uid,receiver_uid,content,time,r_id) values ('$fuid','$uid','$data',now(),'$r_id')";
                        $res = $pdo->query($code);
                        if($res){
                            echo "<script>alert('发送成功');location.href='../html/index.html'</script>";
                        }
                    }else{
                        echo "<script>alert('表单发送失败');location.href='../html/index.html'</script>";
                }else{
                    echo "<script>alert('表单发送失败');location.href='../html/index.html'</script>";
                }
        }else{
            echo "<script>alert('表单不完整，提交失败');</script>";
        }
    }else{
        echo "<script>alert('提交表单失败');</script>";
    }
}else{
    echo "<script>alert('用户未登录');</script>"
}