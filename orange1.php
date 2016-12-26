<?php
    
    include('ajax.php');
    
    echo "<select id = 'select' onchange = 'ajax(\"orange_test.php\",\"output\")'>";
    
    echo "<option value = '1'> 1 </option>";
    echo "<option value = '2'> 2 </option>";
    echo "<option value = '3'> 3 </option>";
    
    echo "</select>";
    echo "<div id = 'output'/>";
    
?>
