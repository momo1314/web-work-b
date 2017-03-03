<?php
session_start();
//在页首先要开启session,
//error_reporting(2047);
session_destroy();
//将session去掉，以每次都能取新的session值;
header("Content-Type:text/html;charset=utf-8");
if (!empty($_POST)) {
    if (isset($_POST['username']) && $_POST['username'] != '' &&
        isset($_POST['password']) && $_POST['password'] != '' &&
        isset($_POST['v-code']) && $_POST['v-code'] != '')
    {
        $username = addslashes($_POST['username']);
        $salt = "haha";
        $password = md5(md5($_POST['password'])+$salt);
        $validate=$_POST['v-code'];
        if(strtolower($validate) != $_SESSION["authnum_session"]){
                //判断session值与用户输入的验证码是否一致;
                print  ("<script>alert('登录失败,请检查验证码是否正确');location.href='../html/login.html'</script>");
        }else{
            try
            {
                $config = require_once './config.php';
                $pdo = new PDO($config['dsn'], $config['user'], $config['password']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $res = $pdo->query("select * from user where username='{$username}'");
                $data = $res->fetch(PDO::FETCH_ASSOC);
                if ($password == $data['password']) 
                {
                    $_SESSION['uid'] = $data['uid'];
                    print_r($_SESSION);
                    echo "<script>alert('登录成功，正在前往主页');location.href='../../html/index.html'</script>";
                }
                else 
                {
                    echo "<script>alert('登录失败,请检查密码是否正确或未注册');location.href='./login.html'</script>";
                }
            } 
            catch (PDOException $e) 
            {
                echo "<script>alert('数据库连接失败');location.href='./login.html'</script>";
            }
        }
    }
    else
    {
       echo "<script>alert('表单未填完整');location.href='./html/login.html'</script>";
   }
}
?>