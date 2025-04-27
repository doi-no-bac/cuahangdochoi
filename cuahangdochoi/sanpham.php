<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thế giới đồ chơi LEGO</title>
    <link rel="stylesheet" href="css/style.css" />
    <style>
        .banner {
            padding: 150px;
            background-image: url("img/bn.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        a {
            text-decoration: none;
            color: black;
            text-align: center;
            padding: 20px;
        }
        header {
            background-color: rgb(232, 232, 232);
        }
        main {
            background-color: rgb(232, 232, 232);
        }
        footer {
            background-color: rgb(232, 232, 232);
            padding: 40px;
            background-color: black;
            color: white;
        }
        



        .product-table {
        width: 40%; /* Hoặc chiều rộng bạn muốn */
        margin: 20px auto; /* Căn giữa bảng */
        border-collapse: collapse; /* Gộp đường viền ô */
        color:linen; 
    }

    .product-table td {
        border: 1px solid #ddd; /* Đường viền cho ô */
        padding: 8px; /* Khoảng cách bên trong ô */
        caret-color: #ddd
    }

    .merged-cell {
        width: 300px; /* Điều chỉnh kích thước ô chứa ảnh */
        height: 200px;
        padding: 0; /* Loại bỏ padding để ảnh phủ kín */
    }

    .product-image {
        width: 100%; /* Ảnh phủ kín chiều rộng ô */
        height: 100%; /* Ảnh phủ kín chiều cao ô */
        object-fit: cover; /* Hoặc contain, tùy theo mong muốn */
    }
    .muangay {
        color: white; /* Màu chữ trắng */
        background-color: red; /* Màu nền đỏ */
        padding: 5px 10px; /* Thêm khoảng cách xung quanh chữ */
        text-decoration: none; /* Loại bỏ gạch chân mặc định */
        border-radius: 5px; /* Bo tròn góc (tùy chọn) */
    }

    .muangay:hover {
        background-color: darkred; /* Màu nền đậm hơn khi di chuột qua */
    }

    main{
      background-image: url("img/bgrmain2.jpg");
    }
    </style>
</head>
<body>
    <header>
        <table>
            <tr>
                <td>
                    <div class="star"></div>
                </td>
                <td>
                    <p style="font-size: 30px">Thế Giới Đồ Chơi LEGO </p>
                </td>
            </tr>
        </table>

       
        <div>
        <table align="center" style="text-align: center">
            <tr>
                <td><a href="index.php">TRANG CHỦ</a></td>
                <td><a href="hangmoi.php">HÀNG MỚI</a></td>
                <td><a href="danhmuc.php">DANH MỤC</a></td>
                <td><a href="sanpham.php">SẢN PHẨM</a></td>
             
            </tr>
        </table><br>
    </div>
      
    </header>
 <hr>
    <br />
    <div class="banner"></div>
    <br />
  
    <main>
       <div>
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
        $result = $conn->query('SELECT * FROM trangchu');
        ?>
  <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <table align="center" class="product-table">
    <tbody>
        <tr>
            <td class="merged-cell" rowspan="5">
                <img src="img/<?php echo $row['ha']; ?>" alt="<?php echo htmlspecialchars($row['tsp']); ?>"
                    class="product-image">
            </td>
            <td>Mã Sp</td>
            <td><?php echo $row['msp']; ?></td>
        </tr>
        <tr>
            <td>Sản phẩm</td>
            <td><?php echo $row['tsp']; ?></td>
        </tr>
        <tr>
            <td>Giá</td>
            <td><?php echo $row['gia']; ?></td>
        </tr>
        <tr>
            <td>Đơn vị</td>
            <td><?php echo $row['dv']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td class="muangay"><a href="muangay.php">Mua ngay</a></td>
        </tr>
    </tbody>
</table>
<?php endwhile; ?>
       </div>

       <div><?php
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
        $result = $conn->query('SELECT * FROM hangmoi');
        ?>
  <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <table align="center" class="product-table">
    <tbody>
        <tr>
            <td class="merged-cell" rowspan="5">
                <img src="img/<?php echo $row['ha']; ?>" alt="<?php echo htmlspecialchars($row['tsp']); ?>"
                    class="product-image">
            </td>
            <td>Mã Sp</td>
            <td><?php echo $row['msp']; ?></td>
        </tr>
        <tr>
            <td>Sản phẩm</td>
            <td><?php echo $row['tsp']; ?></td>
        </tr>
        <tr>
            <td>Giá</td>
            <td><?php echo $row['gia']; ?></td>
        </tr>
        <tr>
            <td>Đơn vị</td>
            <td><?php echo $row['dv']; ?></td>
        </tr>
        <tr>
            <td></td>
            <td class="muangay"><a href="muangay.php">Mua ngay</a></td>
        </tr>
    </tbody>
</table>
<?php endwhile; ?>
</div>
    </main>

    <footer>
    <div>
        LIÊN HỆ VỚI CHÚNG TÔI<br>
        Facebool: <a href="">luckyboy</a><br>
        E-mail: <a href="">luckyboy</a><br>
        Call: 9999999999
    </div>
    <div style="text-align: right;">
        <a class="a-footer" href="sanpham.php" style="color: white;"> Quay lại đầu trang</a>
    </div>
</footer>
</body>
</html>