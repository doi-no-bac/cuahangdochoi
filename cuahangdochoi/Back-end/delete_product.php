<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'cuahangdochoi';

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

if (isset($_POST['delete_product'])) {
    $sdt_to_delete = $_POST['sdt']; // Lấy số điện thoại từ form

    $sql = "DELETE FROM donhang WHERE sdt = ?"; // Xóa từ bảng donhang dựa trên sdt

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $sdt_to_delete); // Giả sử sdt là kiểu string

    if ($stmt->execute()) {
        echo "<script>alert('Xóa đơn hàng thành công!'); window.location.href='quanly-donhang.php';</script>"; // Chuyển hướng về trang quản lý đơn hàng
    } else {
        echo "<script>alert('Lỗi xóa đơn hàng: " . $stmt->error . "'); window.location.href='quanly-donhang.php';</script>";
    }

    $stmt->close();
}

mysqli_close($conn);
?>