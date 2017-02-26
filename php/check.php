<?
session_start();
if($_SESSION['login'])
{
    $uid = $_SESSION['login']
    try 
            {
                $config = require_once './config.php';
                $pdo = new PDO($config['dsn'], $config['user'], $config['password']);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $res = $pdo->query("select * from user where uid='{$uid}'");
                $data = $res->fetch(PDO::FETCH_ASSOC);
                return $data
            } 
    catch (PDOException $e) 
    {
        echo "数据库连接失败";
    }
}
else
{
    return 0;
}
?>