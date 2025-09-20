<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ณิตญา คำสมศรี (ครีม)</title>
</head>

<body>
<h1>ณิตญา คำสมศรี (ครีม)</h1>

<form method="post" action="">
กรอกข้อมูล <input type="text" name="a" autofocus>
<input type="submit" name="Submit" value="OK">
</form>
<?php 
	if(isset($_POST['Submit'])){
	$gender = $_POST['a'];
	if ($gender == 1 ){
	echo "เพศชาย";
	}
	else if  ($gender == 2 ){
	echo "เพศหญิง";
	}else {
        echo "ข้อมูลไม่ถูกต้อง";
	}
}
?>
</body>
</html>