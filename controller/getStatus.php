<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2018-01-11
 * Time: 14:37
 */
// 开始测试读取数据
include_once('../conf/connect.php');
$res = $pdo->query("select pv from `chart_pie` where title='平台';");
//var_dump($res);
$res->setFetchMode(PDO::FETCH_NUM);//仅仅返回以数字作为下标的查询的结果集
//(PDO::FETCH_ASSOC)仅仅返回以键值作为下标的查询的结果集，名称相同的数据只返回一个

while($row = $res->fetch()){
    $data= $row[0];
}
//合并数组
// $arrs = array_merge($arr1,$arr2);
//array_push($arr3,$arr1,$arr2);

$data = json_encode($data+0);
echo $data;