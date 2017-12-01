<?php
include_once('..\conf\connect.php');

$res = mysql_query("SELECT `eventype`,count(`eventype`) as count FROM `event` group by `eventype`");
while($row = mysql_fetch_array($res)){
	
		$arr[] = array(
			"name" =>  $row['eventype'],
			"value" => intval($row['count'])
		); 
	
}
$pie = $arr;


//柱形图
$line = mysql_query("SELECT `title`,`pv` FROM `chart_pie`");
	    $arr1=array();
	    $arr2=array();
	    $arr3=array();
while($row = mysql_fetch_array($line)){

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
//$linedata = json_encode($arr3);
//柱形图
//合并两条数据
$total = array('pie' => $pie,'line'=>$arr3 );

$total = json_encode($total);
echo $total;
?>