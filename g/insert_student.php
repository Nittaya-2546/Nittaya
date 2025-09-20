<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ณิตญา คำสมศรี</title>
</head>

<body>
<h1>เพิ่มข้อมูลนิสิต -- ณิตญา คำสมศรี(ครีม)</h1>

<form method="post" action="">
 รหัสนิสิต <input type="text" name="sid" autofocus required><br>
 ชื่อนิสิต <input type="text" name="sname" required ><br>
 ที่อยู่ <br>
 <textarea name "saddress"></textarea><br>
 เกรดเฉลี่ย <input type="text" name="sgpax" required ><br>
 
 <select name="fid">
<?php
	include("connectdb.php");
	$sql2 = "SELECT * FROM facunlty ";
	$rs2 = mysqli_query($conn,$sql2);
	while($data2 =  mysqli_fetch_array($rs2)){
	?>
    <option value="<?php echo  $data2['f_id'];?>"><?php echo $data2['f_name'];?></option>
    <?php
	}?>
    </select>
    <br>
    <br>

    <button  style="submit" name="Submit">บันทึก</button>
<hr>

<?php
if (isset($_POST['Submit'])){
    include("connectdb.php");
    $sid = $_POST['sid'];
	$sname = $_POST['sname'];
	$saddress = $_POST['saddress'];
	$sgpax = $_POST['sgpax'];
	
    $sql = "INSERT INTO student (s_id, s_name)VALUES ('{$sid}' , '{$sname}','{$saddress}',,'{$sgpax}') ;";
    mysqli_query($conn,$sql2) or die ("insert error"); 
    echo "<script>";
    echo "alert('บันทึกข้อมูลสำเร็จ')";
    echo "</script>";
    }
?>
</body>
</html>