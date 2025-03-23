<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'cuahangdochoi';

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    echo "Kết nối thất bại: " . mysqli_connect_error();
    exit;
}

if (isset($_POST['delivered'])) {
    $id = $_POST['id'];
    $sql = "UPDATE donhang SET trangthai = 'Đã giao' WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: quanly-donhang.php"); // Chuyển hướng về trang danh sách đơn hàng
        exit;
    } else {
        echo "Lỗi cập nhật: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
} elseif (isset($_POST['cancelled'])) {
    $id = $_POST['id'];
    $sql = "UPDATE donhang SET trangthai = 'Đã hủy' WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: quanly-donhang.php"); // Chuyển hướng về trang danh sách đơn hàng
        exit;
    } else {
        echo "Lỗi cập nhật: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>