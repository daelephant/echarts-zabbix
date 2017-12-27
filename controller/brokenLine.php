<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-12-25
 * Time: 18:01
 */
include_once('..\conf\connect.php');
$res = $pdo->query("select   
sum(case month(time) when '1' then 1 else 0 end) as 一月份,  
sum(case month(time) when '2' then 1 else 0 end) as 二月份,  
sum(case month(time) when '3' then 1 else 0 end) as 三月份,  
sum(case month(time) when '4' then 1 else 0 end) as 四月份,  
sum(case month(time) when '5' then 1 else 0 end) as 五月份,  
sum(case month(time) when '6' then 1 else 0 end) as 六月份,
sum(case month(time) when '7' then 1 else 0 end) as 七月份,
sum(case month(time) when '8' then 1 else 0 end) as 八月份,
sum(case month(time) when '9' then 1 else 0 end) as 九月份,
sum(case month(time) when '10' then 1 else 0 end) as 十月份,
sum(case month(time) when '11' then 1 else 0 end) as 十一月份,
sum(case month(time) when '12' then 1 else 0 end) as 十二月份
from `event`  
where year(time)='2017';");
$res->setFetchMode(PDO::FETCH_ASSOC);
while($row = $res->fetch()){
    foreach ($row as $k => $v){
        $arr[] = array(
            "name" =>  $k,
            "value" => intval($v)
        );
    }

}
$ring = json_encode($arr);
echo $ring;
?>