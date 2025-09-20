<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ณิตญา คำสมศรี (ครีม)</title>
</head>

<body>
<h1>ณิตญา คำสมศรี (ครีม)</h1>

<form method="post" action="">
กรอกข้อมูลชื่อสัตว์ <input type="text" name="a" autofocus>
<input type="submit" name="Submit" value="OK">
</form>
<?php 
	if (isset($_POST['Submit'])) {
    $a = $_POST['a'];

   if ($a == "dog" or $a == "หมา" or $a == "สุนัก") {
        echo "<img src='dog.png' width='300'>";
    } else if ($a == "cat"or $a =="แมว" or $a =="เหมียว") {
        echo "<img src='cat.jpg' width='300'>";
    } else if ($a == "tiger" or $a=="เสือ" or $a=="เสีย") {
        echo "<img src='3.jpg' width='300'>";
	 }
}

?>
</body>
</html>