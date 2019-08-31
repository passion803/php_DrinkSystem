<?php
  require_once("dbtools.inc.php");
	
  $drink_date = $_POST["drink_date"];
  $drink_name = $_POST["drink_name"];
  $price = $_POST["price"];
  

  //建立資料連接
  $link = create_connection();

  //執行 SQL 命令
  $sql = "INSERT INTO product_list(drink_date, drink_name, price)
          VALUES('$drink_date', '$drink_name', '$price')";
  $result = execute_sql($link, "db_DrinkSystem", $sql);

  //關閉資料連接
  mysqli_close($link);

  //將網頁重新導向到 index.php
  header("location:drink.php");
  exit();
?>