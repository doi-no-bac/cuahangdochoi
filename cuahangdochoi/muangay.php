<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>ĐẶT HÀNG</h1>
<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'cuahangdochoi';

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
  echo "Kết nối thất bại";
}
?>
<?php 
$result = $conn->query('SELECT * FROM donhang');
?>
<table border="1" width="100%">
<tr>
<td>

<?php
if (isset($_POST['them'])) {
  $ten = $_POST['ten'];
  $sdt = $_POST['sdt'];
  $dc = $_POST['dc'];
  $masp = $_POST['masp'];
  $sl = $_POST['sl'];
  $ngaydat = $_POST['ngaydat'];

  $sql = "INSERT INTO donhang (ten, sdt, dc, masp, sl, ngaydat) VALUES (?, ?, ?, ?, ?, ?)";

  if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("ssssss", $ten, $sdt, $dc, $masp, $sl, $ngaydat);
    if ($stmt->execute()) {
      echo "Đặt hàng thành công!";
    } else {
      echo "Lỗi đặt hàng!";
    }
    $stmt->close();
  } else {
    echo "Lỗi kết nối!";
  }
  $conn->close();
}
?>

<form method="post" action="">
  Nhập tên: <input type="text" name="ten" placeholder="...."><br><br>
  Nhập số điện thoại: <input type="text" name="sdt" placeholder="...."><br><br>
  Nhập địa chỉ: <input type="text" name="dc" placeholder="...."><br><br>
  Nhập mã sản phẩm: <input type="text" name="masp" placeholder="...."><br><br>
  Nhập số lượng: <input type="text" name="sl" placeholder="...."><br><br>
  Nhập ngày đặt: <input type="date" name="ngaydat" placeholder="...."><br><br>
  <input type="submit" name="them" value="Đặt hàng">
</form>
</td>   
</tr>
</table>
</body>
</html>
