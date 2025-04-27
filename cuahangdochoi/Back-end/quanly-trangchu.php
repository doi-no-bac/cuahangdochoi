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
    <h2 style="text-align: center">Quản lý Trang chủ</h2>

    <main>

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
            <thead>
                <tr>
                    <th>Thêm sản phẩm</th>
                    <th>Sửa sản phẩm</th>
                    <th>Xóa sản phẩm</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
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

                                $stmt->close();
                            }
                        }
                        ?>

                        <form method="post" action="">
                            <label for="them_msp">Thêm Mã sản phẩm:</label>
                            <input type="text" name="msp" placeholder="z...." id="them_msp"><br><br>

                            <label for="them_ha">Thêm Hình ảnh:</label>
                            <input type="text" name="ha" placeholder="...jpg" id="them_ha"><br><br>

                            <label for="them_tsp">Thêm Tên sản phẩm:</label>
                            <input type="text" name="tsp" id="them_tsp"><br><br>

                            <label for="them_gia">Thêm Giá:</label>
                            <input type="text" name="gia" id="them_gia"><br><br>

                            <label for="them_dv">Thêm Đơn vị:</label>
                            <input type="text" name="dv" id="them_dv">

                            <input type="submit" name="them" value="Thêm">
                        </form>
                    </td>
                    <td>
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
                                $stmt->bind_param("sssss", $ha , $tsp, $gia, $dv, $msp);
                                if ($stmt->execute()) {
                                    echo "Cập nhật dữ liệu thành công";
                                } else {
                                    echo "Lỗi: " . $stmt->error;
                                }
                                $stmt->close();
                            } else {
                                echo "Lỗi: " . $conn->error;
                            }
                        }
                        ?>

                        <form method="post" action="">
                            <label for="update_msp">Nhập Mã sản phẩm cần sửa:</label>
                            <input type="text" name="msp" placeholder="z..." id="update_msp"> <br><br>
                            <label for="update_ha">Nhập Hình sản phẩm mới:</label>
                            <input type="text" name="ha" placeholder="...jpg" id="update_ha"><br><br>
                            <label for="update_tsp">Nhập Tên sản phẩm mới:</label>
                            <input type="text" name="tsp" id="update_tsp"><br><br>
                            <label for="update_gia">Nhập Giá mới:</label>
                            <input type="text" name="gia" id="update_gia"><br><br>
                            <label for="update_dv">Nhập Đơn vị mới:</label>
                            <input type="text" name="dv" id="update_dv">
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
                        }
                        ?>

                        <form method="post" action="">
                            <label for="delete_msp">Nhập Mã sản phẩm cần xóa:</label>
                            <input type="text" name="msp" id="delete_msp">
                            <input type="submit" name="delete" value="Xóa">
                        </form>
                  
                    </td>
                    <td><h2 style="text-align: center; color: white;">DANH SÁCH SẢN PHẨM (BẢNG TRANGCHU)</h2>
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
                echo "<td><img src='../img/" . $row['ha'] . "' width='100' height='80' style='object-fit:cover;'></td>";
                echo "<td>" . $row['tsp'] . "</td>";
                echo "<td>" . $row['gia'] . "</td>";
                echo "<td>" . $row['dv'] . "</td>";
                echo "</tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table></td>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>