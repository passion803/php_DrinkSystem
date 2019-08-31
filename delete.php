<?php
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE["passed"];
	
  /*  如果 cookie 中的 passed 變數不等於 TRUE，
      表示尚未登入網站，將使用者導向首頁 index.php */
  if ($passed != "TRUE")
  {
    header("location:index.php");
    exit();
  }
	
  /*  如果 cookie 中的 passed 變數等於 TRUE，
      表示已經登入網站，將使用者的帳號刪除 */	
  else
  {
    require_once("dbtools.inc.php");
		
    $id = $_COOKIE["id"];
		
    //建立資料連接
    $link = create_connection();
				
    //刪除帳號
    $sql = "DELETE FROM users Where id = $id";
    $result = execute_sql($link, "db_DrinkSystem", $sql);
		
    //關閉資料連接
    mysqli_close($link);
  }
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>刪除會員資料</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
  </head>
  <body bgcolor="#FFFFFF">
    <center>
      <table align="center">
      <img src="drink.png" width="10%"> 
           <tr><th colspan="5">
           刪除會員資料成功!您的資料已從本站中刪除，若要再次使用本站台服務，請重新申請，謝謝。</th></tr>
           <tr> 		
		<td align="center" colspan="2" >
          <a href="index.php">回首頁</a>
		</td>　	    
	   </tr> 
    </center>       
	</table>
  </body>
</html>

