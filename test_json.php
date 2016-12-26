<?php
    $ar = array('apple', 'orange', 1, false, null, true, 3 + 5);
    
    $data = array(
                  array("track" => 0, "name" => "Song1", "file" => "Song1.mp3"),
                  array("track" => 1, "name" => "Song2", "file" => "Song2.mp3"),
                  array("track" => 2, "name" => "Song3", "file" => "Song3.mp3")
                  );
    
    
    
    ?>

<script type="text/javascript">
var ar = <?php echo json_encode($data); ?>;
// ["apple","orange",1,false,null,true,8];
// access 4th element in array

document.write(JSON.stringify(ar)); 

</script>
