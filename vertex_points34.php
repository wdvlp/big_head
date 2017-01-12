<?php


 //$MyArray = $_POST['variable'];
		
   // $lat_test=$MyArray[0];
   class message{
	var $id;
	var $lat;
	var $lng;
	
	function __construct($n,$t,$c){
		$this->id=$n;
		$this->lat=$t;
		$this->lng=$c;	
	}
	
		function show(){
		echo "id: ".$this->id."<br>";		
		echo "lat: ".$this->lat."<br>";//HR分隔線			
		echo "lng: ".$this->lng."<HR>";
	}
}
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
		$result = mysql_select_db("db_googlemap",$this->database);
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
		$this->receiveGooglemap();
		$this->loaData();
		$this->showAllGooglemap();
		//$this->showForm();
		
		
	}
	

	    function receiveGooglemap(){
		if(count($_POST) != 0){
			$this->saveData($_POST['id2'],$_POST['x_lat'],$_POST['x_lng']);
		}
		//$this->saveData();
	}
	function saveData($i,$u,$c){
			
		$query = "INSERT INTO `all_googlemap`(`id`,`lat`,`lng`) VALUE ('".$i."','".$u."','".$c."');";
		mysql_query($query);//寫入資料庫
	}
	function loaData(){
		
		$query = "SELECT * FROM `all_googlemap`";
		$result = mysql_query($query);
		
		while($row = mysql_fetch_array($result)){

			$temp = new Message($row['id'],$row['lat'],$row['lng']);
			array_push($this->googlemap,$temp);
		}
		
	}
	function showAllGooglemap(){
		foreach($this->googlemap as $m){
			$m->show();
		};
	}
/*	function showForm(){
		echo "<form action'' method='POST' >";
		echo "variable:"."<input type='text' name='userName' >"."<br>";//Name框框
		echo "lng:"."<input type='text' name='lng' >";//Content框框
		echo "<input type='submit' >";//按鈕
		echo "</from>";
	}*/
		
}

$m = new GoogleBoard();
//echo $_POST['variable'].'</br>';  //將傳送進來的字元轉成ascii碼
/*
$data = json_decode(stripslashes($_POST['data']));
  // here i would like use foreach:

  foreach($data as $d){
     echo $d;
  }*/

?>


<form name="try" action="dele.php"> 
<input type="submit" value="dele"> 
</form> 

<form name="try" action="confirm.php"> 
<input type="submit" value="confirm"> 
</form> 

 
