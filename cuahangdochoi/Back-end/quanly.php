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
    <h2 style="text-align: center">Quản Lý</h2>

    <main>

  
    </main>
</body>
</html>