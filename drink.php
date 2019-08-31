<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>飲料購買紀錄</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript">
      function check_data()
      {
        if (document.myForm.drink_date.value.length == 0)
          alert("購買日期欄位不可以空白哦！");
        else if (document.myForm.drink_name.value.length == 0)
          alert("飲料名稱欄位不可以空白哦！");
        else if (document.myForm.price.value.length == 0)
          alert("價格欄位不可以空白哦！");
        else
          myForm.submit();
      }
    </script>
  </head>
  <body>
    <center>
    <table align="center">
	<img src="drink.png"> 
    <?php
      require_once("dbtools.inc.php");
			
      //指定每頁顯示幾筆記錄
      $records_per_page = 5;

      //取得要顯示第幾頁的記錄
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;

      //建立資料連接
      $link = create_connection();
			
      //執行 SQL 命令
      $sql = "SELECT * FROM product_list ORDER BY drink_date DESC";	
      $result = execute_sql($link,"db_DrinkSystem",$sql);


      //取得記錄數
      $total_records = Mysqli_num_rows($result);

      //計算總頁數
      $total_pages = ceil($total_records / $records_per_page);

      //計算本頁第一筆記錄的序號
      $started_record = $records_per_page * ($page - 1);

      //將記錄指標移至本頁第一筆記錄的序號
      Mysqli_data_seek($result, $started_record);

      //使用 $bg 陣列來儲存表格背景色彩
      $bg[0] = "#DDDDDD";
      $bg[1] = "#FFEE99";
      $bg[2] = "#DDDDDD";
      $bg[3] = "#FFEE99";
      $bg[4] = "#DDDDDD";

      echo "<table width='800' align='center' cellspacing='3' style='table-layout:fixed'>";
      echo "<tr bgcolor='#666666' align='center' >";
      echo "<th>購買日期</th>";
      echo "<th>飲料名稱</th>";
      echo "<th>價格</th></tr>";

      //顯示記錄
      $j = 1;
      while ($row = Mysqli_fetch_assoc($result) and $j <= $records_per_page)
      {
        echo "<tr bgcolor='" . $bg[$j - 1] . "'>";
        echo "<th >" . $row["drink_date"] . "</th>";
	echo "<th >" . $row["drink_name"] . "</th>";
        echo "<th >" . $row["price"] . "</th></tr>";
        $j++;
      }
      echo "</table>" ;

      //產生導覽列
      echo "<p align='center'>";

      if ($page > 1)
        echo "<a href='drink.php?page=". ($page - 1) . "'>上一頁</a> ";

      for ($i = 1; $i <= $total_pages; $i++)
      {
        if ($i == $page)
          echo "$i ";
        else
          echo "<a href='drink.php?page=$i'>$i</a> ";
      }

      if ($page < $total_pages)
        echo "<a href='drink.php?page=". ($page + 1) . "'>下一頁</a> ";
      echo "</p>";

      //釋放記憶體空間
      Mysqli_free_result($result);
      Mysqli_close($link);
    ?>
    <form name="myForm" method="post" action="post.php">
      <table border="0" width="800" align="center" cellspacing="0">
        <tr bgcolor="#0084CA" align="center" >
          <td colspan="6">
            <font color="#FFFFFF">請在此新增購買飲料紀錄</font></td>
        </tr>
        <tr bgcolor="#D9F2FF">
          <th >購買日期</th>
          <td ><input name="drink_date" type="text" size="50"></td>
          <th>飲料名稱</th>
          <td ><input name="drink_name" type="text" size="50"></td>       
          <th>價格</th>
          <td ><input name="price" type="text" size="50"></td>
        </tr>
        <tr  >
          <td align="center" colspan="2">
            <input type="button" value="張貼留言" onClick="check_data()">
          </td>			
	  <td align="center" colspan="2">
          <input type="reset" value="重新輸入">
          </td>          
          <td align="center" colspan="2" >
          <a href="main.php">回主畫面</a>
	  </td>　
	     </tr> 
      </table>
    </form>
  </body>
</html>