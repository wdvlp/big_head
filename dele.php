<?php
class DB{
	var $database = null;
	function __construct(){
		
		$dbhost = "localhost";
		$account = "root";//登入帳號
		$password = "";//登入密碼
		$this->database = mysql_connect($dbhost,$account,$password);
		
		if($this->database){
			//echo "DB connected.";
		}
		else{
			//echo "DB connect fail.";
		}
		$result = mysql_select_db("test",$this->database);
		if($result){
			//echo "DB select success.";
		}else{
			//echo "DB select fail.";
		}
	}
	function __desturct(){
		mysql_close($this->database);
	}
}

class GoogleBoard extends DB{
	var $googlemap=array();
	function __construct(){
		parent::__construct();
			
		$this->saveData();		
		
		
	}
	
	function saveData(){
		$dele = "TRUNCATE TABLE all_googlemap ";
		mysql_query($dele);
		
	
	}
	

		
}



$db = new GoogleBoard();

?>



<script language=JavaScript>
parent.location.reload();
</script>

