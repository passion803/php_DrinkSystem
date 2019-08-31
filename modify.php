<?php
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE{"passed"};
	
  //如果 cookie 中的 passed 變數不等於 TRUE
  //表示尚未登入網站，將使用者導向首頁 index.htm
  if ($passed != "TRUE")
  {
    header("location:index.php");
    exit();
  }
	
  //如果 cookie 中的 passed 變數等於 TRUE
  //表示已經登入網站，取得使用者資料	
  else
  {
    require_once("dbtools.inc.php");
		
    $id = $_COOKIE{"id"};
		
    //建立資料連接
    $link = create_connection();
				
    //執行 SELECT 陳述式取得使用者資料
    $sql = "SELECT * FROM users Where id = $id";
    $result = execute_sql($link, "db_DrinkSystem", $sql);
		
    $row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html>
  <head>
    <title>修改會員資料</title>
    <meta charset="utf-8">
	<link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript">
      function check_data()
      {
        if (document.myForm.password.value.length == 0)
        {
          alert("「使用者密碼」一定要填寫哦...");
          return false;
        }
        if (document.myForm.password.value.length > 10)
        {
          alert("「使用者密碼」不可以超過 10 個字元哦...");
          return false;
        }
        if (document.myForm.re_password.value.length == 0)
        {
          alert("「密碼確認」欄位忘了填哦...");
          return false;
        }
        if (document.myForm.password.value != document.myForm.re_password.value)
        {
          alert("「密碼確認」欄位與「使用者密碼」欄位一定要相同...");
          return false;
        }
        if (document.myForm.name.value.length == 0)
        {
          alert("您一定要留下真實姓名哦！");
          return false;
        }	
        myForm.submit();					
      }
    </script>			
  </head>
  <body>
    <center>
    <table align="center">
	<img src="drink.png"> 
    <form action="update.php" method="post" name="myForm">
      <table border="2" align="center" bordercolor="#007799">        
		<tr> 
          <td colspan="2" bgcolor="#0088A8" align="center"> 		  
            <font color="#FFFFFF">A飲料店修改會員資料系統　請填入下列資料 (標示「*」欄位請務必填寫)</font>
          </td>
        </tr>
        <tr bgcolor="#FFC8B4"> 
          <td align="center">*使用者帳號：</td>
          <td><?php echo $row{"account"}?></td>
        </tr>
        <tr bgcolor="#FFC8B4"> 
          <td align="center">*使用者密碼：</td>
          <td><input name="password" type="password" size="15" value="<?php echo $row{"password"}?>">
          <p>(請使用英文或數字鍵，勿使用特殊字元)</td>
        </tr>
        <tr bgcolor="#FFC8B4"> 
          <td align="center">*密碼確認：</td>
          <td><input name="re_password" type="password" size="15" value="<?php echo $row{"password"}?>">
          <p>(再輸入一次密碼，並記下您的使用者名稱與密碼)</td>
        </tr>
        <tr bgcolor="#FFC8B4">
          <td align="center">*姓名：</td>
          <td><input name="name" type="text" size="8" value="<?php echo $row{"name"}?>"></td>
        </tr>        
        <tr bgcolor="#FFC8B4"> 
          <td align="center">lineid：</td>
          <td><input name="lineid" type="text" size="20" value="<?php echo $row{"lineid"}?>"></td>
        </tr>
        <tr bgcolor="#FFC8B4"> 
          <td align="center">行動電話：</td>
          <td><input name="cellphone" type="text" size="20" value="<?php echo $row{"cellphone"}?>"></td>
        </tr>        
        <tr bgcolor="#FFC8B4"> 
          <td align="center">備註：</td>
          <td><textarea name="comment" cols="45" rows="4" ><?php echo $row{"comment"}?></textarea></td>
        </tr>
        <tr bgcolor="#FFC8B4"> 
          <td align="center" colspan="2"> 
            <input type="button" value="修改資料" onClick="check_data()">
            <input type="reset" value="重新填寫">
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
<?php
    //釋放資源及關閉資料連接
    mysqli_free_result($result);
    mysqli_close($link);
  }
?>