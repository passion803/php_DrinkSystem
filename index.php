<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Passion 莊佩諠</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript">
      function check_data()
      {
        if (document.myForm.account.value.length == 0)
          alert("帳號欄位不可以空白哦！");
        else if (document.myForm.password.value.length == 0)
          alert("密碼欄位不可以空白哦！");
        else 
          myForm.submit();
      }
    </script>
  </head>
  <body>    
  <center>
    <table align="center">
	<img src="drink.png"> 
    <form action="checkpwd.php" method="post" name="myForm">      
	  <tr>
        <th colspan="5">A飲料店會員登入系統</th>
        </tr>
		<tr>
        <th colspan="5">歡迎來到本站，您必須加入成為本站的會員，才有權限使用本站的功能。<p>
       若您已經擁有帳號，請輸入您的帳號及密碼，然後按 [登入] 鈕；<p>
       若尚未成為本站會員，請點按 [會員註冊] 超連結。</th>
        </tr>
        <tr>           
            <th color="#3333FF">帳號：</th> 
			<td align="center" > 
            <input name="account" type="text" size="10">
          </td>     
            <th color="#3333FF">密碼：</th> 
			<td align="center" > 
            <input name="password" type="password" size="10">
          </td>
        </tr>
		<tr>       
          <td align="center" colspan="2"> 
            <input type="button" value="會員登入" onClick="check_data()">
          </td>        
          <td align="center" colspan="2"> 		　 
            <input type="reset" value="資料重填">
          </td>    
		</tr>
		<tr> 		
		<td align="center" colspan="5" >
          <a href="join.php">會員註冊</a>
		</td>　
	     </tr> 
		</form>
      </table>

  </body>
</html>