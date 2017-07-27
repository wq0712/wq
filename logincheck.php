<?php
           
    if(isset($_POST["submit"]) && $_POST["submit"] == "登陆")
    {
        $user = $_POST["username"];
        $psw = $_POST["password"];
        if($user == "" || $psw == "")
        {
            echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
        }
        else
        {
            $mysql_server_name = "127.0.0.1";
            $mysql_username = "root";
            $mysql_password = "sunshine0712!";
            $mysql_database = "vt";
            
            $pdo = new PDO("mysql:host=".$mysql_server_name.";dbname=".$mysql_database ,$mysql_username, $mysql_password);
            
            $statement = $pdo->query("SELECT * FROM user WHERE username = '$user' AND password='$psw'");
        
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            

            if($row)
            {
                include "Welcome.php";
            }
            else
            {
                echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
            }
        }
    }
    else
    {
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";
    }

?>
