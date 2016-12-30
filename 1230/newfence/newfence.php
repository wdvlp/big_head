


<?php

class DB{
	var $database = null;
	function __construct(){
		
		$dbhost = "localhost";
		$account = "test";//登入帳號
		$password = "1234";//登入密碼
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
		
		//$this->receiveMessage();
				
		
		$this->saveData();
		$this->copytable();
		$this->deletable();
		
	}

	function receiveMessage(){
		if(count($_POST) != null	){
			$this->saveData($_POST['fn']);
			
			
		}
	
	}
	function saveData(){	
	
		$test=$_POST['fn'];	
		$dele = "create table $test(id float,lat float,lng float);";//新增柵欄
		mysql_query($dele);
		
	
	}
	function copytable(){	
        $test=$_POST['fne'];		
		$dele = "insert into test. $test select * from test.all_googlemap ;";//複製ALL_GOOGLEMAP > $TEST
		mysql_query($dele);
		
	
	}
		function deletable(){
		$dele = "TRUNCATE TABLE all_googlemap ";
		mysql_query($dele);
		
	
	}
		
}



$db = new GoogleBoard();

?>




