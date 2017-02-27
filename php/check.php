<?
session_start();
$data = array();
if($_SESSION['login'])
{
    $uid = $_SESSION['login']
    try 
            {
                $config = require_once './config.php';
                $pdo = new PDO($config['dsn'], $config['user'], $config['password']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $res = $pdo->query("select uid,username,"""",phone,email,nickname,sex,time,tag,img from user where uid='{$uid}'");
                $data = $res->fetch(PDO::FETCH_ASSOC);
                $data['status'] = ture;
                echo json_encode($data);
            } 
    catch (PDOException $e) 
    {
        $res['status'] = flase; 
        echo  $res;
    }
}
else
{
    $res['status'] = flase; 
    echo  $res;
}
?>
