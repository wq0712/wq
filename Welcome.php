<html>  
<head>  
<meta charset="utf-8">
<title>欢迎您</title>  
</head>  
<body>
<?php 
if (isset($_POST["username"]))
{
  echo "欢迎 " . $_POST["username"] . "!";
  echo '<a href="login.php">注销</a><br>';
  echo '<a href="upload.php">上传文件</a>';
  echo '<a href="download.php">下载文件</a>';

}

else
{
  echo '普通访客! <a href="login.php">登录</a><br>';
  echo '<a href="permission.php">上传文件</a>';
  echo '<a href="download.php">下载文件</a>';
}

?>


</body>  
</html>