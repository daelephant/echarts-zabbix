<?php
// 开始测试读取数据
include_once('../conf/connect.php');
$res = mysql_query("select count(*) count1 from `event` where eventype='高危';");
//var_dump($res);
while($row = mysql_fetch_row($res)){
    $data = $row[0];
}
//合并数组
// $arrs = array_merge($arr1,$arr2);
//array_push($arr3,$arr1,$arr2);
$data = json_encode($data);
echo $data;
?>