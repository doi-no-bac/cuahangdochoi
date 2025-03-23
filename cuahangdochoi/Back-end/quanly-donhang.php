<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý</title>
    <style>
      h1 {background-image: url(../img/bgr.jpg);}
      a {
        text-decoration: none;
      }
      table {
        width: 100%;
        border-collapse: collapse;
      }
      th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
      }
      th {
        background-color: #f2f2f2;
      }
      .action-buttons {
        display: flex;
        justify-content: center;
      }
      .action-buttons button {
        margin: 5px;
        padding: 5px 10px;
        cursor: pointer;
      }
      .delivered {
        background-color: #d4edda;
        color: #155724;
      }
      .pending {
        background-color: #fff3cd;
        color: #856404;
      }
      .cancelled {
        background-color: #f8d7da;
        color: #721c24;
      }
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
    <h2 style="text-align: center">Danh sách đơn đặt hàng</h2>

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
              </td>
              <td class="action-buttons">
                <form method="post" action="update_status.php">
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delivered">Đã giao</button>
                  <button type="submit" name="cancelled">Hủy</button>
                </form>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </main>
  </body>
</html>