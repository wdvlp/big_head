<?php

include('ajax.php');

echo "<select id = 'select' onchange = 'ajax(\"orange_test.php\",\"output\")'>";

//echo "<option selected='selected'>select parent menu</option>";
    
  
    // 定義資料庫相關變數
    // 定義資料庫相關變數
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    
    // 連結資料庫
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
   
    $sql = "SELECT FenceName FROM save_googlemap";
    $res = $conn->query($sql);
     while($row=$res->fetch_array())
    {

        
        echo "<option value='" . $row['FenceName'] . "'>" . $row['FenceName'] . "</option>";
    }

echo "</select>";
echo "<div id = 'output'/>";
 mysqli_close($conn);
    
?>