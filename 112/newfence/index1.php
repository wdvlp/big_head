<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> 
</head>
<body>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
show();
    function show(){ 
        $.get("orange_test.php",function(lol) { 
            $("#hello").html(lol);
        });
        setTimeout(function(){show()},1000); 
    }

});

//]]>
</script>
<div id="hello"></div>

</body>
</html>