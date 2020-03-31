<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>資料庫內容</title>
</head>
<h1 align="center">我的網頁</h1><br>
<?php
include("Connet.php");
//$sql = "SELECT * FROM $tb ORDER BY `Time` DESC";
$sql = "SELECT * FROM web";
$q=mysqli_query($link ,$sql);
$row = mysqli_fetch_assoc($q);
?>
<body>
<center>
<button onclick="location.href='index.php'">返回首頁</button>
<br>
<br>
<table border="1" >
  <tr>
  <td>序號</td>
  <td>日期</td>
    <td>時間</td>
    <td>標題</td>
    <td>網址</td>
    <!-- <td>內容</td> -->
  </tr>
  <?php if(!empty($row)){do{ ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['Date']; ?></td>
      <td><?php echo $row['Time']; ?></td>
      <td><?php echo $row['Title']; ?></td>
      <td><?php echo '<a href="'.$row['Address'].'" target="_blank">'.$row['Address'].'</a>' ?></td>
      <!-- <td><?//php echo $row['Content']; ?></td> -->
    </tr>
    <?php } while ($row = mysqli_fetch_assoc($q));
  }
  else
echo "資料庫裡無資料！"; ?>
</table>
</body>
</html>
<?php
mysqli_free_result($q);
?>
<br>

<button onclick="location.href='index.php'">返回首頁</button>
</center>