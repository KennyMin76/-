<?php
ini_set('display_errors','1');
error_reporting(E_ALL);
include_once("Connet.php");
if (!$link) {
exit('無法連結MySQL資料庫，請管理員檢查MySQL帳號密碼');
}else{ 
//建立資料庫
mysqli_query($link ,"CREATE DATABASE IF NOT EXISTS  $mydbname");  
if (@mysqli_select_db($link ,$mydbname)) {
//建立資料表
$sqlstr="CREATE TABLE IF NOT EXISTS `web` (
`id` int(5) NOT NULL auto_increment, /*id*/
`Date` VARCHAR(10) default NULL,  /*日期*/
`Time` VARCHAR(10) default NULL,  /*時間*/
`Title` TEXT(50) default NULL,
`Address` TEXT(100) default NULL,
`Content` LONGTEXT default NULL,
PRIMARY KEY  (`id`)
) CHARSET=utf8";
$ex=mysqli_query($link ,$sqlstr) ;
if($ex){
//or die("資料表建立失敗");
//新增一筆預設值
$sql="SELECT * FROM `web`"; //是否有資料 
$q=mysqli_query($link ,$sql); 
if ($q && mysqli_num_rows($q)==0){ //時間
$sql1="INSERT INTO `web` VALUES (0,'0','0','0','0','0')"; 
mysqli_query($db ,$sql1);
}
}
else
echo "資料表建立失敗";
}
  }
  //mysqli_query($db ,"SET NAMES UTF8", $db);
  ?>