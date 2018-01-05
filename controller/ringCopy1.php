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
$ring = json_encode($arr);
echo $ring;
?>