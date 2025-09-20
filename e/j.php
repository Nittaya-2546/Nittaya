<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ณิตญา คำสมศรี (ครีม)</title>
</head>

<body>
<h1>ณิตญา คำสมศรี (ครีม)</h1>

<form method="post" action="">
รหัสนิสิต<input type="number" name="a" autofocus>
  <input type="submit" name="Submit" value="OK">
</form>
<?php 
	if(isset($_POST['Submit'])){
    $id = $_POST['a']; // แปลงเป็นพิมพ์เล็กและตัดช่องว่าง
    echo"รหัสนิสิต:".$id."<br>";
    $y = substr($id,0,2);
    echo "<img src='http://202.28.32.211/picture/student/{$y}/{$id}.jpg' width='300'>";
	}

?>
</body>
</html>