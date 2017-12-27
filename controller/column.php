<?php
// 开始测试读取数据
include_once('../conf/connect.php');
$res = $pdo->query("SELECT `title`,`pv` FROM `chart_pie`");
	    $arr1=array();
	    $arr2=array();
	    $arr3=array();
	    $res->setFetchMode(PDO::FETCH_ASSOC);
while($row = $res->fetch()){

	    // $arr1.push($row['eventype']);
	    // $arr2.push($row['pv']);
	    array_push($arr1, $row['title']);
	    array_push($arr2, $row['pv']);
		// $arr[] = array(
		// 	"name" =>  $row['eventype'],
		// 	"value" => intval($row['count'])
		// ); 
	
}
//合并数组
// $arrs = array_merge($arr1,$arr2);
array_push($arr3,$arr1,$arr2);
$data = json_encode($arr3);
echo $data;
?>