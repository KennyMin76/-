<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>搜尋結果</title>
</head>
<h1 align="center">我的網頁</h1><br>
<body>
<center>
<button onclick="location.href='search.php'">返回搜尋</button> 
<button onclick="location.href='index.php'">返回首頁</button> 
<br>
<?php
$word=trim($_POST["key"]);
include("Connet.php");
if(isset($_POST["key"])&&!empty(trim($_POST["key"]))){
// ini_set('display_errors','1');
// error_reporting(E_ALL);
echo "<br>關鍵字：".$word."<br>";
$sql = "SELECT * FROM web ";
$q=mysqli_query($link ,$sql);
$row = mysqli_fetch_assoc($q);
$cou=0;
?>
<table border="1" >
<?php
  do { 
      if(strstr($row['Content'],$word)){
        ?>
        
    <tr><td>
    <?php
        $cou++;
        $num=$row['id'];
        $title=$row['Title'];
      $web=$row['Address'];
      echo '序號:'.$num.'<br>標題：'.$title.'<br>網址:<a href="'.$web.'" target="_blank">'.$web.'</a>';?>
      </td></tr>
   <!--  <iframe src="<?php echo $web;?>"
            height="300"
            width="1200"
            frameborder="1"
            scrolling="1"
    ></iframe> -->
      <?php
      }
       } while ($row = mysqli_fetch_assoc($q));
       if($cou>0)
       echo "<br>有".$cou."筆資料<br><br>";
       else
       echo "<br>查無結果!";
mysqli_free_result($q);
if($cou>6){
?>
</table>
<br>
<button onclick="location.href='search.php'">返回搜尋</button> 
<button onclick="location.href='index.php'">返回首頁</button>
      <?php }}
            else{ ?>
                <script language="javascript">
                alert("輸入錯誤，不可留白！");
                window.history.back();
                </script>
                <?php
            }
      ?>
</center>
</body>
</html>

