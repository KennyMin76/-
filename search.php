<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>搜尋關鍵字</title>
</head>
<h1 align="center">我的網頁</h1>
<br>
<body>
<center>
<form  action="result.php" method="post" >
請輸入檢索關鍵字
<br>
<div class="reset" >
<input placeholder=蛋白質 type="text" onfocus="this.placeholder=''" onblur="this.placeholder='蛋白質'" name="key" >
</div>
<style>
::placeholder {
  color: gray;
  opacity: 0.5; /* Firefox */
}
</style>
<input type="submit" value="搜尋">
 </form>
<br>
<button onclick="location.href='index.php'">返回首頁</button> 
<br>
</center>
</body>
</html>