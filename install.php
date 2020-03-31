<?php
include("Connet.php");
$SQL="DROP TABLE IF EXISTS 'web';";
$SQL2="CREATE TABLE `datatb` (
    `id` int(5) NOT NULL auto_increment, /*id*/
`Date` VARCHAR(10) default NULL,  /*日期*/
`Time` VARCHAR(10) default NULL,  /*時間*/
`Title` TEXT(50) default NULL,
`Address` TEXT(100) default NULL,
`Content` LONGTEXT default NULL,
PRIMARY KEY  (`id`)
) CHARSET=utf8";
  /*) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;*/
  /*$SQL3="ALTER TABLE 'datatb' ADD PRIMARY KEY ('webId');";
  $SQL4="ALTER TABLE 'web' MODIFY `webId` int(11) NOT NULL AUTO_INCREMEBT;";*/
  $link->query($SQL);
  $link->query($SQL2);
  //$link->query($SQL3);
  //$link->query($SQL4);
?>