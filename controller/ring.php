<?php
include_once('..\conf\connect.php');

$res = mysql_query("SELECT `eventype`,count(`eventype`) as count FROM `event` group by `eventype`");
while($row = mysql_fetch_array($res)){
	
		$arr[] = array(
			"name" =>  $row['eventype'],
			"value" => intval($row['count'])
		); 
	
}
$ring = json_encode($arr);
echo $ring;
?>