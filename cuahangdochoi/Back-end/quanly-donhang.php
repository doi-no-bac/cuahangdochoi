<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý</title>
    <style>
        body {
            display: flex; /* Kích hoạt flexbox cho body */
            min-height: 100vh; /* Đảm bảo chiều cao tối thiểu bằng chiều cao viewport */
            flex-direction: column; /* Sắp xếp các phần tử con theo cột */
            margin: 0; /* Loại bỏ margin mặc định của body */
            font-family: sans-serif; /* Chọn font chữ mặc định */
            background-color: #f4f4f4; /* Màu nền trang */
        }

        h1 {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            margin-bottom: 0;
        }

        hr {
            border: none;
            height: 1px;
            background-color: #ccc;
            margin: 0;
        }

        ul {
            list-style: none;
            padding: 20px;
            margin: 0;
            background-color: #f9f9f9;
            border-bottom: 1px solid #ddd;
            display: flex; /* Sắp xếp các li theo hàng ngang */
            justify-content: space-around; /* Phân bố đều khoảng trắng giữa các li */
        }

        ul li {
            margin-bottom: 0; /* Loại bỏ margin dưới các li */
        }

        ul li a {
            text-decoration: none;
            font-size: 18px;
            color: brown;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        ul li a:hover {
            background-color: #e0e0e0;
        }

        main {
            display: flex; /* Kích hoạt flexbox cho main để chia cột */
            padding: 20px;
            flex-grow: 1; /* Cho phép main chiếm phần không gian còn lại */
            background-color: #fff; /* Màu nền khu vực main */
        }

        main > table {
            flex: 1; /* Bảng chiếm toàn bộ chiều rộng còn lại */
            border-collapse: collapse; /* Gộp đường viền các ô */
            width: 100%;
        }

        main > table th,
        main > table td {
            padding: 12px 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        main > table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        main > table td > h2 {
            margin-top: 0;
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        main > table td > form {
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px solid #eee;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        main > table td > form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        main > table td > form input[type="text"],
        main > table td > form input[type="submit"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box; /* Đảm bảo padding và border không làm tăng kích thước phần tử */
            width: calc(100% - 22px); /* Điều chỉnh chiều rộng input */
        }

        main > table td > form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        main > table td > form input[type="submit"]:hover {
            background-color: #45a049;
        }
        .delivered {
    color: green;
    font-weight: bold;
}
.cancelled {
    color: red;
    font-weight: bold;
}
.pending {
    color: orange;
    font-weight: bold;
}
button {
    padding: 6px 10px;
    margin: 2px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}
button[name="delivered"] {
    background-color: green;
    color: white;
}
button[name="cancelled"] {
    background-color: red;
    color: white;
}

    </style>
</head>
<body>
    <h1>QUẢN LÝ</h1>
    <hr />
    <ul>
        <li>
            <a href="quanly-trangchu.php">Quản lý Trang chủ</a>
        </li>
        <li>
            <a href="quanly-hangmoi.php">Quản lý trang Hàng mới</a>
        </li>
  

        <li>
            <a href="quanly-donhang.php">Quản lý Đơn đặt hàng</a>
        </li>
    </ul>
    <hr />
    <h2 style="text-align: center">Quản lý Đơn đặt hàng</h2>

    <main>
      <?php
      $hostname = 'localhost';
      $username = 'root';
      $password = '';
      $database = 'cuahangdochoi';

      $conn = mysqli_connect($hostname, $username, $password, $database);

      if (!$conn) {
        echo "Kết nối thất bại";
      } else {
        echo "";
      }
      ?>
      <?php
      $result = $conn->query('SELECT * FROM donhang');
      if (!$result) {
          die("Lỗi truy vấn: " . $conn->error);
      }
      
      ?>

      <table border="1" align="center" style="text-align: center">
        <thead>
          <tr>
            <td>Tên khách hàng</td>
            <td>Số điện thoại</td>
            <td>Địa chỉ</td>
            <td>Mã sản phẩm</td>
            <td>Số lượng</td>
            <td>Ngày đặt</td>
            <td>Trạng thái</td>
            <td>Hành động</td>
          </tr>
        </thead>

        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
              <td><?php echo $row['ten']; ?></td>
              <td><?php echo $row['sdt']; ?></td>
              <td><?php echo $row['dc']; ?></td>
              <td><?php echo $row['masp']; ?></td>
              <td><?php echo $row['sl']; ?></td>
              <td><?php echo $row['ngaydat']; ?></td>
              <td class="<?php
              if ($row['trangthai'] == 'Đã giao') {
                echo 'delivered';
              } elseif ($row['trangthai'] == 'Đã hủy') {
                echo 'cancelled';
              } else {
                echo 'pending';
              }
              ?>">
                <?php echo $row['trangthai']; ?>
                <td class="action-buttons">
    <form method="post" action="update_status.php">
        <input type="hidden" name="sdt" value="<?php echo $row['sdt']; ?>"> <button type="submit" name="delivered">Đã giao</button>
        <button type="submit" name="cancelled">Hủy</button>
    </form>
</td>
<td>
    <form method="post" action="delete_product.php" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
        <input type="hidden" name="sdt" value="<?php echo $row['sdt']; ?>"> <button type="submit" name="delete_product">Xóa</button>
    </form>
</td>

            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </main>
</body>
</html>
