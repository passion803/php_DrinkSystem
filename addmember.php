<?php
  require_once("dbtools.inc.php");
  
  //取得表單資料
  $account = $_POST["account"];
  $password = $_POST["password"]; 
  $name = $_POST["name"];   
  $lineid = $_POST["lineid"]; 
  $cellphone = $_POST["cellphone"];   
  $comment = $_POST["comment"];

  //建立資料連接
  $link = create_connection();
			
  //檢查帳號是否有人申請
  $sql = "SELECT * FROM users Where account = '$account'";
  $result = execute_sql($link, "db_DrinkSystem", $sql);

  //如果帳號已經有人使用
  if (mysqli_num_rows($result) != 0)
  {
    //釋放 $result 佔用的記憶體
    mysqli_free_result($result);
		
    //顯示訊息要求使用者更換帳號名稱
    echo "<script type='text/javascript'>";
    echo "alert('您所指定的帳號已經有人使用，請使用其它帳號');";
    echo "history.back();";
    echo "</script>";
  }
	
  //如果帳號沒人使用
  else
  {
    //釋放 $result 佔用的記憶體	
    mysqli_free_result($result);
		
    //執行 SQL 命令，新增此帳號
    $sql = "INSERT INTO users (account, password, name,lineid, cellphone,comment) VALUES ('$account', '$password', 
            '$name', '$lineid','$cellphone','$comment')";

    $result = execute_sql($link, "db_DrinkSystem", $sql);
  }
	
  //關閉資料連接	
  mysqli_close($link);
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>新增帳號成功</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
  </head>
  <body bgcolor="#FFFFFF">
    <center>
    <table align="center">
    <img src="drink.png" width="10%"> 
     <tr>
        <th colspan="5">恭喜您已經註冊成功了，您的資料如下：（請勿按重新整理鈕）<br>
      帳號：<font color="#FF0000"><?php echo $account ?></font><br>
      請記下您的帳號及密碼</th>
        </tr>	  	
	  <tr> 		
		<td align="center" colspan="2" >
          <a href="index.php">登入網站</a>
		</td>　	    
	   </tr> 
    
	</table>
  </body>
</html>