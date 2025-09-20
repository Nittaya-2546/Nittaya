<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ณิตญา คำสมศรี</title>
</head>

<body>
<h1>เพิ่มข้อมูลนิสิต -- ณิตญา คำสมศรี(ครีม)</h1>

<form method="post" action="">
 รหัสนิสิต <input type="text" name="sid" autofocus required>
 ชื่อนิสิต <input type="text" name="sname" required ><br>
 <button type="submit" name="Submit">บันทึก</button>
 </form> 
<hr>
<?php
if (isset($_POST['Submit'])){
    include("connectdb.php");
    $sname = $_POST['sid'];
    $sql = "INSERT INTO student (s_id, s_name)VALUES ('{$sid}' , '{$fname}');";
    mysqli_query($conn,$sql) or die ("insert error");
    
    echo "<script>";
    echo "alert('บันทึกข้อมูลสำเร็จ')";
    echo "</script>";
    }

?>

</body>
</html>