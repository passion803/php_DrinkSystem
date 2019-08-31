<?php
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE["passed"];
	
  /* 如果 cookie 中的 passed 變數不等於 TRUE，
     表示尚未登入網站，將使用者導向首頁 index.htm */
  if ($passed != "TRUE")
  {
    header("location:index.php");
    exit();
  }
	
  /* 如果 cookie 中的 passed 變數等於 TRUE，
     表示已經登入網站，則取得使用者資料 */
  else
  {
    require_once("dbtools.inc.php");
	
    //取得 modify.php 網頁的表單資料
    $id = $_COOKIE["id"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $lineid = $_POST["lineid"];
    $cellphone = $_POST["cellphone"];
    $comment = $_POST["comment"];
		
    //建立資料連接
    $link = create_connection();
				
    //執行 UPDATE 陳述式來更新使用者資料
    $sql = "UPDATE users SET password = '$password', name = '$name', 
            lineid = '$lineid', cellphone = '$cellphone', 
            comment = '$comment' WHERE id = $id";
    $result = execute_sql($link, "db_DrinkSystem", $sql);
		
    //關閉資料連接
    mysqli_close($link);
  }		
?>
<!doctype html>
<html>
  <head>
    <title>更新會員資料</title>
    <meta charset="utf-8">
	<link rel="stylesheet" href="style.css" type="text/css" />
  </head>
  <body bgcolor="#FFFFFF">
    <center>
      <table align="center">
	<img src="drink.jpg"> 
           <tr><th colspan="5">
           <?php echo $name ?>恭喜您已經成功修改會員資料。</th></tr>
           <tr> 		
		<td align="center" colspan="2" >
          <a href="main.php">回會員專屬網頁</a>
		</td>　	    
	   </tr> 
    </center>       
	</table>
  </body>
</html>