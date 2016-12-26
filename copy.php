<?php
// 定義資料庫相關變數
// 定義資料庫相關變數
define('dbHost','localhost');
define('dbUser','root'); // 資料庫連線帳號
define('dbPass',''); // 資料庫連線密碼
define('dbName','test'); // 資料庫名稱

// 連結資料庫
$db = mysql_connect(dbHost,dbUser,dbPass) or die('Connect to database failed');
mysql_select_db(dbName,$db);

// 抓取並寫入資料
// test.login_log = 目的地資料庫.目的地資料表
// sourceDB.login_log = 來源資料庫.來源資料表
$insStr = 'insert into test.save_googlemap select * from test.all_googlemap';
$res = mysql_query($insStr,$db) or die("Action failed. Error = ".mysql_error());
    
    $dele = "TRUNCATE TABLE all_googlemap ";
    mysql_query($dele);
    mysql_close($db);
    

?>

