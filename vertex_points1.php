<?php
    $test="abc"; 
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

////

class GoogleBoard extends DB{
	var $googlemap=array();
	function __construct(){
		parent::__construct();
		$this->receiveGooglemap();
		$this->loaData();
		$this->showAllGooglemap();
	
	}
	

	    function receiveGooglemap(){
		if(count($_POST) != 0){
			$this->saveData($_POST['id2'],$_POST['x_lat'],$_POST['x_lng'], $_POST['fn']);
		}
		
	}
	function saveData($i,$u,$c, $v){
		$query = "INSERT INTO `all_googlemap`(`id`,`lat`,`lng`,`FenceName`) VALUE ('".$i."','".$u."','".$c."','".$v."');";
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
		}
	}
		
}
$m = new GoogleBoard();

?>

<form id="try1" action="dele.php">
<input type="submit" value="刪除">
</form> 

<form id="try2" action="copy.php" >
<input type="submit" value="確認">
</form>





