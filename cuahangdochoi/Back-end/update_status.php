<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'cuahangdochoi';

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

if (isset($_POST['delivered'])) {
    $sdt = $_POST['sdt']; // Thay 'madonhang' bằng 'sdt'
    $sql = "UPDATE donhang SET trangthai = 'Đã giao' WHERE sdt = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $sdt); // Giữ nguyên 's' vì sdt thường là kiểu string
    if ($stmt->execute()) {
        echo "<script>alert('Cập nhật trạng thái thành Đã giao!'); window.location.href='quanly-donhang.php';</script>";
    } else {
        echo "<script>alert('Lỗi cập nhật trạng thái: " . $stmt->error . "'); window.location.href='quanly-donhang.php';</script>";
    }
    $stmt->close();
}

if (isset($_POST['cancelled'])) {
    $sdt = $_POST['sdt']; // Thay 'madonhang' bằng 'sdt'
    $sql = "UPDATE donhang SET trangthai = 'Đã hủy' WHERE sdt = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $sdt); // Giữ nguyên 's' vì sdt thường là kiểu string
    if ($stmt->execute()) {
        echo "<script>alert('Cập nhật trạng thái thành Đã hủy!'); window.location.href='quanly-donhang.php';</script>";
    } else {
        echo "<script>alert('Lỗi cập nhật trạng thái: " . $stmt->error . "'); window.location.href='quanly-donhang.php';</script>";
    }
    $stmt->close();
}

mysqli_close($conn);
?>