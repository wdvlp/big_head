<html>

<input type="button" value="新增柵欄" onClick="location.href='gmap_contain_test2.php';">
</html>
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
    
   
    $sql = "SHOW TABLES FROM test";
    $res = $conn->query($sql);
     while($row=$res->fetch_array())
    {

        
        echo "<option value='" . $row['Tables_in_test'] . "'>" . $row['Tables_in_test'] . "</option>";
    }

echo"</select>";

echo "<div id = 'output'/>";



    
?>
 
