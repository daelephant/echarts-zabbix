<?php
include_once('..\conf\connect.php');

$res = $pdo->query("SELECT `eventype`,count(`eventype`) as count FROM `event` group by `eventype`");
$res->setFetchMode(PDO::FETCH_ASSOC);
while($row = $res->fetch()){
	
		$arr[] = array(
			"name" =>  $row['eventype'],
			"value" => intval($row['count'])
		); 
	
}
$pie = $arr;


//柱形图
$line = $pdo->query("SELECT `title`,`pv` FROM `chart_pie`");
	    $arr1=array();
	    $arr2=array();
	    $arr3=array();
$line->setFetchMode(PDO::FETCH_ASSOC);
while($row = $line->fetch()){
        //var_dump($row);exit;
	    array_push($arr1, $row['title']);
	    array_push($arr2, $row['pv']);
	
}
//合并数组
// $arrs = array_merge($arr1,$arr2);
array_push($arr3,$arr1,$arr2);
//$linedata = json_encode($arr3);
//柱形图
//合并两条数据
$total = array('pie' => $pie,'line'=>$arr3 );

$total = json_encode($total);
echo $total;
?>