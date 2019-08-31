<?php
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE["passed"];
	
  /*  如果 cookie 中的 passed 變數不等於 TRUE
      表示尚未登入網站，將使用者導向首頁 index.htm	*/
  if ($passed != "TRUE")
  {
    header("location:index.php");
    exit();
  }
?>
<!doctype html>
<html>
  <head>
    <title>會員管理</title>
    <meta charset="utf-8">
	<link rel="stylesheet" href="style.css" type="text/css" />
  </head>
  <body>
    <center>
    <table align="center" >
    <img src="drink.png" width="10%"> 
      <tr> 		
		<td align="center"  >
          <a href="modify.php">修改會員資料</a>
		</td>	    
	  	<td align="center"  >
          <a href="delete.php">刪除會員資料</a>
		</td>	    
	  	<td align="center"  >
          <a href="logout.php">登出飲料網站</a>
		</td>	        
        </tr> 
        <tr> 		
         <td align="center" colspan="5" >
          <a href="drink.php">紀錄A飲料店購買之飲料</a>
		</td>  	  	   		
	  </tr>
    </center></table>	  
  </body>
      
</html>