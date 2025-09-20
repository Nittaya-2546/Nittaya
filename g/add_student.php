<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลนิสิต</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e3f2fd, #ffffff);
        }
        .card {
            border: none;
            border-radius: 1rem;
        }
        .form-label {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2><i class="bi bi-person-plus-fill"></i> เพิ่มข้อมูลนิสิต</h2>
            <p class="text-muted">กรอกข้อมูลให้ครบถ้วนแล้วกดปุ่ม "บันทึก"</p>
        </div>

        <?php if (isset($message)): ?>
            <div class="alert alert-info text-center"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <div class="card shadow p-4 mx-auto" style="max-width: 700px;">
            <form method="POST">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="s_id" class="form-label">รหัสนิสิต</label>
                        <input type="text" class="form-control" id="s_id" name="s_id" required>
                    </div>
                    <div class="col-md-6">
                        <label for="s_name" class="form-label">ชื่อนิสิต</label>
                        <input type="text" class="form-control" id="s_name" name="s_name" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="s_address" class="form-label">ที่อยู่</label>
                    <textarea class="form-control" id="s_address" name="s_address" rows="2" required></textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="s_gpax" class="form-label">GPAX</label>
                        <input type="number" step="0.01" min="0" max="4" class="form-control" id="s_gpax" name="s_gpax" required>
                    </div>
                    <div class="col-md-6">
                        <label for="f_id" class="form-label">คณะ</label>
                        <select class="form-select" id="f_id" name="f_id" required>
                            <option value="">-- เลือกคณะ --</option>
                            <?php foreach ($faculties as $faculty): ?>
                                <option value="<?= $faculty['f_id'] ?>"><?= htmlspecialchars($faculty['f_name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="bi bi-save2"></i> บันทึกข้อมูล
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (ถ้าต้องใช้) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>