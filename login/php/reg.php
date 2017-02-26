<?php
session_start();
session_destroy();
if (!empty($_POST)) {
    if (isset($_POST['username']) && $_POST['username'] != '' &&
        isset($_POST['password']) && $_POST['password'] != '' &&
        isset($_POST['v-code']) && $_POST['v-code'] != '') 
    {
        $username = addslashes($_POST['username']);
        $salt = "haha";
        //$password = md5(md5($_POST['password']).$salt);
        $password = md5(md5($_POST['password'])+$salt);
        $validate=$_POST["v-code"];
        $validate = strtolower($validate);
        if($validate!=$_SESSION["authnum_session"]){
                //判断session值与用户输入的验证码是否一致;
                    print  ("<script>alert('登录失败,请检查验证码是否正确');location.href='../../html/index.html'</script>");
        }else{
            try 
            {
                $config = require_once './config.php';
                $pdo = new PDO($config['dsn'], $config['user'], $config['password']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sel = "select * from user where username='{$username}'";
                $find = $pdo->query($sel);
                $data = $find->fetch(PDO::FETCH_ASSOC);
                if($data['username']){//if(!empty($data))
                    echo "<script>alert('用户已存在');location.href='../html/reg.html'</script>";
                }
                else{
                    $name = $_POST['username'];
                    $sql = "insert into user(username,password,time) values ('$name','$password',now())";
                    $exec = $pdo->query($sql);
                    if($exec){
                        $res = $pdo->query($sel);
                        $data = $res->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['login'] = $data['uid'];
                        echo  "<script>alert('成功');location.href='../../html/index.html'</script>";
                    }else{
                        echo  "<script>alert('失败');location.href='../html/reg.html'</script>";
                    }
                }
                
            } 
            catch (PDOException $e) 
            {
                echo "数据库连接失败";
            }
        }
    } 
    else{
        echo "表单未填完整";
    }
}