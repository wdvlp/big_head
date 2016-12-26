<?php
    
    $select = (string)$_POST['select'];
    //echo $select;
    //$select = "ffff";
    
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
    
    $sql = "SELECT lat,lng FROM save_googlemap where FenceName ="."'".$select."'";
    //echo $sql;
    //
    $res = $conn->query($sql);
    $lat_array = array();
    $lng_array = array();
    $emparray = array();
    
    //$data = array(
                  //array("track" => 0, "name" => "Song1", "file" => "Song1.mp3"),
                  //array("track" => 1, "name" => "Song2", "file" => "Song2.mp3"),
                  //array("track" => 2, "name" => "Song3", "file" => "Song3.mp3")
                  //);
    
   while($row=$res->fetch_array())
    {
        $emparray[] = array ('lat'=>$row[0],'lng'=>$row[1]);
    }
    
    //echo $emparray[0][0];
    //echo $emparray[0][1];
    //echo $emparray[1][0];
    //echo $emparray[1][1];
    //echo $emparray[2][0];
    //echo $emparray[2][1];
    
    
    //$num = count($emparray);
    //echo $num;
   
    echo json_encode($emparray);
   
    //mysqli_close($conn);
?>

<script type="text/javascript" >

    var arr = <?php echo json_encode($emparray); ?>;

    //document.write(JSON.stringify(arr));


</script>

