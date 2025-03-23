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
        background-image: url("img/banner.jpg");
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
      </style>
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
            <td>
              <a href="index.php" style="color: black">TRANG CHỦ</a>
            </td>
            <td>
              <a href="hangmoi.php" style="color: black">HÀNG</a>
            </td>
            <td>
              <a href="danhmuc.php" style="color: black"> DANH </a>
            </td>
            <td>
              <a href="sanpham.php" style="color: black">SẢN </a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="index.php" style="color: black"></a>
            </td>
            <td>
              <a href="hangmoi.php" style="color: black"> MỚI</a>
            </td>
            <td>
              <a href="danhmuc.php" style="color: black">MỤC</a>
            </td>
            <td>
              <a href="sanpham.php" style="color: black"> PHẨM</a>
            </td>
          </tr>
        </table>
      </div>
    </header>
    <hr />
<br>
    <div class="banner"></div>
    
<br>
Sản phẩm bán chạy
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
<?php 
$result=$conn->query('SELECT * FROM trangchu')   ?>


<table border="1" align="center" style="text-align: center;">


<tbody>
<?php While($row = mysqli_fetch_assoc($result)) :?>
         <tr>
          <td><?php echo $row['msp']; ?></td>
          <td><?php echo $row['ha']; ?></td>
          <td><?php echo $row['tsp']; ?></td>
          <td><?php echo $row['gia']; ?></td>
          <td><?php echo $row['dv']; ?></td>
          <td style="color: black" ><a href="muangay.php">Mua ngay</a></td>
         </tr>
     <?php endwhile; ?>
</tbody>


</table>


</main>




    <footer>
        <table class="tb-footer">
            <tr><td>
LIÊN HỆ VỚI CHÚNG TÔI<br>
         Facebool: <a href="">luckyboy</a><br>

         E-mail:  <a href="">luckyboy</a><br>

         Call: 9999999999
        </td>
        <td style="text-align: right;"><a class="a-footer" href="index.php" style="color: white; text-align: right;"> Quay lại đầu trang</a></td>
        </tr>
        </table>
    </footer>
  </body>
</html>
