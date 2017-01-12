


<?php
    
	    
 $select = $_POST['select'];
    //echo $select;
    
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
   
   $sql = "SELECT * FROM `$select` ORDER BY id";///ORDER BY id 依照排列
	//	$sql = "SELECT * FROM `test`";
    //echo $sql;
    
    $res = $conn->query($sql);
    $lat_array = array();
    $lng_array = array();
    $emparray = array();
	
    while($row=$res->fetch_array())
    {
        
    $emparray[] = array ('lat'=>(float)$row[1],'lng'=>(float)$row[2]);
       // $emparray[] = array ((float)$row[1],(float)$row[2]);
    }
    
	$test= json_encode($emparray);
echo $test;
	echo("<br>");
session_start();
$_SESSION["temp"]= $test;
  // include ('test.php');
   
   
?>
<html>
<input type="button" value="返回請按我" onClick="location.href='FenceInquire.php';">

</html>
<html>
<input type="button" value="確定請按我" onClick="location.href='test.php';">

</html>