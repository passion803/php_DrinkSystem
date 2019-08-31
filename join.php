<!doctype html>
<html>
  <head>
    <title>會員註冊</title>
    <meta charset="utf-8">
	<link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript">
      function check_data()
      {
        if (document.myForm.account.value.length == 0)
        {
          alert("「使用者帳號」一定要填寫哦...");
          return false;
        }
        if (document.myForm.account.value.length > 10)
        {
          alert("「使用者帳號」不可以超過 10 個字元哦...");
          return false;
        }
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
    <img src="drink.png" width="10%"> 
    <form action="addmember.php" method="post" name="myForm">
      <table border="2" align="center" bordercolor="#007799">        
		<tr> 
          <td colspan="2" bgcolor="#0088A8" align="center"> 		  
            <font color="#FFFFFF">A飲料店會員註冊系統　請填入下列資料 (標示「*」欄位請務必填寫)</font>
          </td>
        </tr>
        <tr bgcolor="#FFC8B4"> 
          <td align="center">*使用者帳號：</td>
          <td><input name="account" type="text" size="15">
          (請使用英文或數字鍵)</td>
        </tr>
        <tr bgcolor="#FFC8B4"> 
          <td align="center">*使用者密碼：</td>
          <td><input name="password" type="password" size="15">
          (請使用英文或數字鍵)</td>
        </tr>
        <tr bgcolor="#FFC8B4"> 
          <td align="center">*密碼確認：</td>
          <td><input name="re_password" type="password" size="15">
          (再輸入一次密碼)</td>
        </tr>
        <tr bgcolor="#FFC8B4">
          <td align="center">*姓名：</td>
          <td><input name="name" type="text" size="8"></td>
        </tr>        
        <tr bgcolor="#FFC8B4"> 
          <td align="center">lineid：</td>
          <td><input name="lineid" type="text" size="20"></td>
        </tr>
        <tr bgcolor="#FFC8B4"> 
          <td align="center">行動電話：</td>
          <td><input name="cellphone" type="text" size="20"></td>
        </tr>        
        <tr bgcolor="#FFC8B4"> 
          <td align="center">備註：</td>
          <td><textarea name="comment" cols="45" rows="4" ></textarea></td>
        </tr>
        <tr bgcolor="#FFC8B4"> 
          <td align="center" colspan="2"> 
            <input type="button" value="會員註冊" onClick="check_data()">			
            <input type="reset" value="資料重填">
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>