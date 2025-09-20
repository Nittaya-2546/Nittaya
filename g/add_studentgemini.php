<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ณิตญา คำสมศรี</title>
</head>

<body>
<?php
// ตั้งค่าสถานะเริ่มต้นของข้อความแจ้งเตือน
$status_message = '';
$status_class = '';

// ตรวจสอบว่ามีการส่งข้อมูลฟอร์มมาหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รวมไฟล์เชื่อมต่อฐานข้อมูล
    include 'connectdb.php';

    // เตรียมและตรวจสอบข้อมูลที่ส่งมาจากฟอร์ม
    $s_id = $_POST['s_id'];
    $s_name = $_POST['s_name'];
    $s_address = $_POST['s_address'];
    $s_gpax = $_POST['s_gpax'];
    $f_id = $_POST['f_id'];

    // ตรวจสอบข้อมูลเบื้องต้น
    if (!empty($s_id) && !empty($s_name) && !empty($s_address) && !empty($s_gpax) && !empty($f_id)) {
        // เตรียมคำสั่ง SQL แบบ Prepared Statement เพื่อป้องกัน SQL Injection
        $stmt = $conn->prepare("INSERT INTO student (s_id, s_name, s_address, s_gpax, f_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdi", $s_id, $s_name, $s_address, $s_gpax, $f_id);

        if ($stmt->execute()) {
            $status_message = "เพิ่มข้อมูลนิสิตสำเร็จแล้ว!";
            $status_class = "alert-success";
        } else {
            $status_message = "เกิดข้อผิดพลาดในการเพิ่มข้อมูล: " . $conn->error;
            $status_class = "alert-danger";
        }
        $stmt->close();
    } else {
        $status_message = "โปรดกรอกข้อมูลให้ครบทุกช่อง";
        $status_class = "alert-warning";
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
}

// โค้ดสำหรับดึงข้อมูลคณะมาแสดงในฟอร์ม
// รวมไฟล์เชื่อมต่อฐานข้อมูล
include 'connectdb.php';
// แก้ไขชื่อตารางจาก 'facunlty' เป็น 'faculty' เพื่อความถูกต้อง
$sql_faculty = "SELECT f_id, f_name FROM faculty";
$result_faculty = $conn->query($sql_faculty);
$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มเพิ่มข้อมูลนิสิต</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card-header {
            background: linear-gradient(135deg, #007bff, #00c6ff);
            border-radius: 1rem 1rem 0 0 !important;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .card-header h4 {
            margin: 0;
            font-weight: 600;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
        .header-icon {
            width: 40px;
            height: 40px;
            margin-right: 15px;
            fill: white;
            filter: drop-shadow(1px 1px 1px rgba(0,0,0,0.2));
        }
        .card {
            border: none;
            border-radius: 1rem;
        }
        .btn-primary {
            background: linear-gradient(45deg, #007bff, #00c6ff);
            border: none;
            transition: all 0.3s ease-in-out;
            font-weight: bold;
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.4);
            background: linear-gradient(45deg, #0056b3, #0099e5);
        }
        .form-control, .form-select {
            border-radius: 0.5rem !important;
            padding: 0.75rem 1.25rem;
        }
        .rounded-pill {
            border-radius: 50rem !important;
        }
        .alert {
            border-radius: 0.75rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <svg class="header-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        <h4 class="mb-0">แบบฟอร์มเพิ่มข้อมูลนิสิต</h4>
                    </div>
                    <div class="card-body p-4">
                        <!-- แสดงข้อความแจ้งเตือนสถานะ -->
                        <?php if ($status_message): ?>
                            <div class="alert <?php echo $status_class; ?> alert-dismissible fade show" role="alert">
                                <?php echo $status_message; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="mb-3">
                                <label for="s_id" class="form-label">รหัสนิสิต</label>
                                <input type="text" class="form-control" id="s_id" name="s_id" placeholder="ตัวอย่าง: 67010916173" required>
                            </div>
                            <div class="mb-3">
                                <label for="s_name" class="form-label">ชื่อ-นามสกุล</label>
                                <input type="text" class="form-control" id="s_name" name="s_name" placeholder="ตัวอย่าง: นายกษิดิศ ศรีกงพลี" required>
                            </div>
                            <div class="mb-3">
                                <label for="s_address" class="form-label">ที่อยู่</label>
                                <textarea class="form-control" id="s_address" name="s_address" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="s_gpax" class="form-label">เกรดเฉลี่ย (GPAX)</label>
                                <input type="number" step="0.01" class="form-control" id="s_gpax" name="s_gpax" min="0.00" max="4.00" placeholder="ตัวอย่าง: 3.34" required>
                            </div>
                            <div class="mb-3">
                                <label for="f_id" class="form-label">คณะ</label>
                                <select class="form-select" id="f_id" name="f_id" required>
                                    <option value="" disabled selected>--- เลือกคณะ ---</option>
                                    <?php
                                    // ตรวจสอบว่ามีข้อมูลคณะหรือไม่
                                    if ($result_faculty->num_rows > 0) {
                                        // วนลูปเพื่อแสดงข้อมูลในแท็ก <option>
                                        while($row = $result_faculty->fetch_assoc()) {
                                            echo '<option value="' . htmlspecialchars($row["f_id"]) . '">' . htmlspecialchars($row["f_name"]) . '</option>';
                                        }
                                    } else {
                                        echo '<option value="">ไม่พบข้อมูลคณะ</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill">บันทึกข้อมูล</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>