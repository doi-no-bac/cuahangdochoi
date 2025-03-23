<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý</title>
    <style>
      a {
        text-decoration: none;
      }
      h1 {background-image: url(../img/bgr.jpg);}
    </style>
  </head>
  <body>
    <h1>QUẢN LÝ</h1>
    <hr />
    <ul>
      <li>
        <a href="quanly-trangchu.php" style="font-size: 20px; color: brown"
          >Quản lý Trang chủ</a
        ><br />
      </li>
      <li>
        <a href="quanly-hangmoi.php" style="font-size: 20px; color: brown"
          >Quản lý Hàng mới</a
        ><br />
      </li>
      <li>
        <a href="quanly-danhmuc.php" style="font-size: 20px; color: brown"
          >Quản lý Danh mục</a
        ><br />
      </li>
      <li>
        <a href="quanly-sanpham.php" style="font-size: 20px; color: brown"
          >Quản lý Sản phẩm</a
        ><br />
      </li>
      <li>
        <a href="quanly-donhang.php" style="font-size: 20px; color: brown"
          >Quản lý đơn đặt hàng</a
        ><br />
      </li>
    </ul>
    <hr />
    <h2 style="text-align: center">Quản lý Trang chủ</h2>

    <main>

      <!-- Kết nối -->
<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'cuahangdochoi';

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn)
{
  echo "Kết nối thất bại";
}
  else { echo "" ;}
?>
<table border="1" width="100%">

<tr>
<td>
<!-- Thêm -->
<h2><b>Thêm sản phẩm</b></h2>
<?php


if (isset($_POST['them'])) {
  
  $msp = $_POST['msp'];
  $ha = $_POST['ha'];
  $tsp = $_POST['tsp'];
  $gia = $_POST['gia'];
  $dv = $_POST['dv'];

  
  $sql = "INSERT INTO trangchu (msp, ha, tsp, gia, dv) VALUES (?, ?, ?, ?, ?)";

 
  if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("sssss", $msp, $ha, $tsp, $gia, $dv); 
    if ($stmt->execute()) {
        echo "";
      }

   $conn->close();
}
}
?>

<form method="post" action="">
  
          Thêm Mã sản phẩm: <input type="text" name="msp" placeholder="z...."><br><br>
     
          Thêm Hình ảnh: <input type="text" name="ha" placeholder="...jpg"><br><br>
     
          Thêm Tên sản phẩm: <input type="text" name="tsp"><br><br>
      
          Thêm Giá: <input type="text" name="gia"><br><br>

          Thêm Đơn vị: <input type="text" name="dv">
     
         <input type="submit" name="them" value="Thêm">
</form>
</td>   
<td>
<!-- Sửa -->
<h2><b>Sửa sản phẩm</b></h2>
<?php 


if (isset($_POST['update'])) {

$msp = $_POST['msp'];
  $ha = $_POST['ha'];
  $tsp = $_POST['tsp'];
  $gia = $_POST['gia'];
  $dv = $_POST['dv'];

  
  $sql = "UPDATE trangchu SET ha = ?, tsp = ?, gia = ?, dv=? WHERE msp = ?";

 
  if ($stmt = $conn->prepare($sql)) {
      $stmt->bind_param("sisi", $ha , $tsp, $gia, $dv, $msp);
      if ($stmt->execute()) {
          echo "Cập nhật dữ liệu thành công";
      } else {
          echo "Lỗi: " . $stmt->error;
      }
      $stmt->close();
  } else {
      echo "Lỗi: " . $conn->error;
  }
$conn->close();
}
?>

<form method="post" action="">
  Nhập Mã sản phẩm mới:<input type="text" name="msp" placeholder="z..."> <br><br>
  Nhập Hình sản phẩm mới: <input type="text" name="ha" placeholder="...jpg"><br><br>
  Nhập Tên sản phẩm mới: <input type="text" name="tsp"><br><br>
  Nhập Giá mới: <input type="text" name="gia"><br><br>
  Nhập Đơn vị mới: <input type="text" name="dv">
  <input type="submit" name="update" value="Cập nhật">
</form>
</td>
<td>
<h2><b>Xóa sản phẩm</b></h2>

<?php

if (isset($_POST['delete'])) {
    $msp = $_POST['msp'];

    $sql = "DELETE FROM trangchu WHERE msp = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $msp); // Sử dụng "s" cho kiểu chuỗi (string)
        if ($stmt->execute()) {
            echo "Xóa dữ liệu thành công";
        } else {
            echo "Lỗi: " . $stmt->error; // Thêm xử lý lỗi
        }

        $stmt->close(); // Đóng statement
    } else {
        echo "Lỗi: " . $conn->error; // Thêm xử lý lỗi kết nối
    }
    $conn->close(); // Đóng kết nối
}
?>

<form method="post" action="">
    Nhập Mã sản phẩm cần xóa: <input type="text" name="msp">
    <input type="submit" name="delete" value="Xóa">
</form>
</td>
</tr>
</table>
    </main>
  </body>
</html>
