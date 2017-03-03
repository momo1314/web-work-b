<?php
//发送留言
session_start();
if($_SESSION['uid']){
    $uid = $_SESSION['uid'];
    if (!empty($_POST)){
        if(isset($_POST['data']) && $_POST['data'] != ''){
            $data = addslashes($_POST['data']);
            try{
                $config = require_once './config.php';
                $pdo = new PDO($config['dsn'], $config['user'], $config['password']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $code = "insert into liuyan(uid,content,time,status) values ('$uid','$data',now(),'0')";
                $res = $pdo->query($code);
                if($res){
                    echo "<script>alert('发送成功');location.href='../html/index.html'</script>";
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