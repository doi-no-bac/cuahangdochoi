<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mua Sản Phẩm</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .banner {
      padding: 150px;
      background-image: url("img/banner.jpg");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    a {
      text-decoration: none;
      color: black;
      padding: 10px;
    }

    header, main {
      background-color: #e8e8e8;
    }

    footer {
      background-color: black;
      color: white;
      padding: 30px;
    }

    .product-image {
  width: 100%;
  height: 200px;
  object-fit: cover;
  display: block;
}

    .product-table {
      width: 90%;
      margin: 20px auto;
      border-collapse: collapse;
    }

    .product-table td {
      border: 1px solid #ccc;
      padding: 8px;
    }

    .form-section {
      padding: 20px;
      background-color: #f4f4f4;
      border-radius: 10px;
    }

    .form-section input[type="text"],
    .form-section input[type="date"] {
      width: 95%;
      padding: 8px;
      margin-bottom: 10px;
    }

    .form-section input[type="submit"] {
      background-color: #333;
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
    }

    .muangay {
        color: white; /* Màu chữ trắng */
        background-color: red; /* Màu nền đỏ */
        padding: 5px 10px; /* Thêm khoảng cách xung quanh chữ */
        text-decoration: none; /* Loại bỏ gạch chân mặc định */
        border-radius: 5px; /* Bo tròn góc (tùy chọn) */
    }

    .left-column {
      width: 70%;
      vertical-align: top;
    }

    .right-column {
      width: 30%;
      vertical-align: top;
    }

    h2 {
      text-align: center;
    }
    .muangay:hover {
        background-color: darkred; /* Màu nền đậm hơn khi di chuột qua */
    }
  </style>
</head>
<body>

<table width="100%">
  <tr>
    <!-- CỘT 1: Giao diện, sản phẩm -->
    <td ><h2 style="text-align: center; color: white;">DANH SÁCH SẢN PHẨM (BẢNG TRANGCHU)</h2>
    <table border="1" cellpadding="10" cellspacing="0" align="center" style="background-color: white; width: 90%; text-align: center;">
        <thead style="background-color: #f2f2f2;">
            <tr>
                <th>Mã SP</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Đơn vị</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "cuahangdochoi");
            if (!$conn) {
                die("Kết nối thất bại: " . mysqli_connect_error());
            }

            $result = mysqli_query($conn, "SELECT * FROM trangchu");

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['msp'] . "</td>";
                echo "<td><img src='img/" . $row['ha'] . "' width='100' height='80' style='object-fit:cover;'></td>";
                echo "<td>" . $row['tsp'] . "</td>";
                echo "<td>" . $row['gia'] . "</td>";
                echo "<td>" . $row['dv'] . "</td>";
                echo "</tr>";
            }

            mysqli_close($conn);
            ?>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "cuahangdochoi");
            if (!$conn) {
                die("Kết nối thất bại: " . mysqli_connect_error());
            }

            $result = mysqli_query($conn, "SELECT * FROM hangmoi");

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['msp'] . "</td>";
                echo "<td><img src='img/" . $row['ha'] . "' width='100' height='80' style='object-fit:cover;'></td>";
                echo "<td>" . $row['tsp'] . "</td>";
                echo "<td>" . $row['gia'] . "</td>";
                echo "<td>" . $row['dv'] . "</td>";
                echo "</tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>
    </td>

    <!-- CỘT 2: Form đặt hàng -->
    <td class="right-column">
      <section class="form-section" id="form">
        <h2>Nhập Thông Tin Đặt Hàng</h2>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "cuahangdochoi");
        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());} ?>
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
              echo "<p style='color:green;'>✔️ Đặt hàng thành công!</p>";
            } else {
              echo "<p style='color:red;'>❌ Lỗi đặt hàng!</p>";
            }
            $stmt->close();
          }
        }
        ?>

        <form method="post" action="">
          Tên khách hàng: <input type="text" name="ten" required>
          Số điện thoại: <input type="text" name="sdt" required>
          Địa chỉ: <input type="text" name="dc" required>
          Mã sản phẩm: <input type="text" name="masp" required>
          Số lượng: <input type="text" name="sl" required>
          Ngày đặt: <input type="date" name="ngaydat" required>
          <input type="submit" name="them" value="Đặt hàng">
          <p><i>Chúng tôi sẽ liên hệ theo số điện thoại để xác nhận đơn hàng. Khách hàng theo dõi đơn hàng thông qua mã vận đơn được gửi qua tin nhắn<br></i></p>
        </form>
      </section>
    </td>
  </tr>
</table>

</body>
</html>
