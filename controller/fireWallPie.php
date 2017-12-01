<?php
/**
 * Created by PhpStorm.
 * User: cyx
 * Date: 2017-11-30
 * Time: 17:13
 */
include_once('..\conf\connect.php');

$res = mysql_query("SELECT COUNT(a.pri) num,b.info from firewall a  LEFT JOIN prirule b ON a.pri=b.id GROUP BY a.pri;");
while($row = mysql_fetch_array($res)){

    $arr[] = array(
        "name" =>  $row['info'],
        "value" => intval($row['num'])
    );

}
$pieWall = json_encode($arr);
echo $pieWall;