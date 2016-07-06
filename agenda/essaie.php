<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<?php 
	if(isset($_POST["client"])){
		
		
		$data = array();
		$data = file_get_contents("data.json");
		$data = (array) json_decode($data);
		$data[$_POST["creneau"]] = $_POST;
		print_r($data);
		file_put_contents("data.json",json_encode($data));
	}
?>
	<form action="essaie.php" method="post">
 <p>nom : <select name="commercial">
  <option value="commercial2">Commercial2</option>
  <!--<option value="commercial1">Commercial1</option>
  <option value="commercial3">Commercial3</option>-->
</select></p>

 <p>creneau : <select name="creneau">
  <option value="2016-07-07 13:00">Jeudi 13h</option>
  <option value="2016-07-07 15:00">jeudi 15h</option>
</select></p>
client: <input type="text" name="client"><br>
 <p><input type="submit" value="OK"></p>
 
</form>

</body>
</html>