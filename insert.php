<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新增網頁</title>
</head>
<h1 align="center">我的網頁</h1><br>

<center>
<form method="post">
請輸入欲新增網址<br>
<input type="text" placeholder=http://www.~~~ onfocus="this.placeholder=''" onblur="this.placeholder='http://www.~~~'" name="data" >
<br>
<input type="submit" value="新增">
</form>
<style>
::placeholder {
  color: gray;
  opacity: 0.5; /* Firefox */
}
</style>
</html>
<?php
$alstr="";
include("create.php");

if(!empty($_POST["data"])){
$webdata=$_POST["data"];
///////////////////////////
// for($i=0;$i<=9;$i++){
//     for($j=0;$j<=9;$j++){
//     $webdata="https://www.itread01.com/p/14112".$i.$j.".html";
///////////////////////////
if(!empty($webdata)){
    // ini_set('display_errors','1');
    // error_reporting(E_ALL);
    date_default_timezone_set("ASIA/Taipei");
//$alstr=$alstr."網址:$webdata\n";
$sql = "SELECT * FROM $tb ";
$q=mysqli_query($db ,$sql);
$row = mysqli_fetch_assoc($q);
$rep=0;
do { 
    if($row['Address']==$webdata){
      $rep=1;
      $alstr=$alstr."新增失敗\\r此網頁已重複新增！";
      break;
    }
} while ($row = mysqli_fetch_assoc($q));
if($rep==0){
$str=curl_file_get_contents($webdata);
$getDate= date("Y/m/d");
$getTime= date ("H:i:s"); 
//$alstr=$alstr."現在時間: $getDate-$getTime\\r";
if(empty($str))
$alstr=$alstr."新增失敗\\r網頁讀取錯誤";
else{

preg_match('/<title>.*<\/title>/', $str, $titles); 
if(empty($titles))
$alstr=$alstr."新增失敗\\r網頁標題有問題！";
else{
$title=substr($titles[0],strlen('<title>'),strlen($titles[0])-strlen('<title></title>'));
//$alstr=$alstr."標題:$title\\r";
//$alstr=$alstr.("網頁內容的大小:".strlen($str));
$str = $db->real_escape_string($str);
//$sql = "INSERT INTO `$tb` VALUES (0,'$getDate','$getTime','$title','$webdata','$str')"; ///////////////////////
$a=0;
$sql = "INSERT INTO `$tb`  VALUES (?, ?, ?, ?,?,?)";
$stmt = $db->prepare($sql);
$stmt->bind_param('isssss',$a,$getDate,$getTime,$title,$webdata,$str);
//$stmt->execute();
//$q=mysqli_query($db,$sql); 
if($stmt->execute()){
    $alstr=$alstr."新增成功";
}
else{
    $alstr=$alstr."新增失敗";
    $alstr=$alstr."\\r失敗問題:".$stmt->errorInfo();
}
}
}}
}
}
 //$alstr="test一\\rs";
 if(isset($_POST["data"])&&empty($alstr))
$alstr="輸入錯誤，不可留白！";
if(!empty($alstr)){
?>
<script language="javascript">
alert("<?php echo $alstr; ?>");
</script>
 <?php } ?>
<br>
<button onclick="location.href='index.php'">返回首頁</button>
</center>
<?php
function curl_file_get_contents($durl){
    $ch = curl_init();
    $this_header = array(
        "content-type: application/x-www-form-urlencoded; 
        charset=UTF-8"
        );
        
    //curl_setopt($ch,CURLOPT_HTTPHEADER,$this_header);
    curl_setopt($ch, CURLOPT_URL, $durl);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_USERAGENT, "Google Bot");
    curl_setopt($ch, CURLOPT_CRLF,1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $r = curl_exec($ch);
    curl_close($ch);
     return $r;
  }
?>