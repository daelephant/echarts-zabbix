<?php
//$host="localhost";
//$db_user="root";
//$db_pass="root";
//$db_name="echarts";
//$timezone="Asia/Shanghai";
//
//$link=@mysql_connect($host,$db_user,$db_pass);
//mysql_select_db($db_name,$link);
//mysql_query("SET names UTF8");

try{
    $dsn = 'mysql:dbname=echarts;host=localhost';
    $username = 'root';
    $password = 'root';
    $attr = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    $pdo =new PDO($dsn,$username,$password,$attr);
    $pdo->query('SET names UTF8');
}catch (PDOException $e){
    //异常
    echo $e->getMessage();
}
