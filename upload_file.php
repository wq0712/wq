<?php
$allowedExts = array("gif", "jpg", "png","doc","xls","txt","pdf","ppt");
$temp = explode(".", $_FILES["file"]["name"]);
echo $_FILES["file"]["size"];
$extension = end($temp);        // 获取文件后缀名
if ($_FILES["file"]["size"] > 10485760)
{
  echo"<script>alert('只能上传10M以下的文件！'); history.go(-1);</script>";
}

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "application/pdf")
|| ($_FILES["file"]["type"] == "text/plain")
|| ($_FILES["file"]["type"] == "application/msword")
|| ($_FILES["file"]["type"] == "application/vnd.ms-powerpoint")
|| ($_FILES["file"]["type"] == "application/vnd.ms-excel"))  
&& ($_FILES["file"]["size"] < 1048576)
&& in_array($extension,$allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
  {
    echo "错误：: " . $_FILES["file"]["error"] . "<br>";
  }
  else
  {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
      echo "Temp file: " .  $_FILES["file"]["tmp_name"] . "<br />";
      if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
        echo $_FILES["file"]["name"] . "文件已存在！";
      }
      else
      {
        move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . 
        $_FILES["file"]["name"]);
        echo "Stord in: " . "upload/" . $_FILES["file"]["name"];
      }
  }
}
else
{
  echo "<script>alert('只允许上传gif、jpg、png、pdf、txt、doc、ppt、xls文件!'); history.go(-1);</script>";
}

?>
