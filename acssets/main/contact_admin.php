<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hòm Thư Góp Ý  </title>
    <link rel="stylesheet" type="text/css" href="headerAndFooter.css">
    <link rel="stylesheet" type="text/css" href="../css/cart.css">
</head>
<style>
    .item  .image {
    height: 100%;
    width: 40%;
    }  
    .item .quantity {
    height: 100%;
    width: 60%;
    font-size: 130%;
    margin-top: 0;
    margin-left: 0;
   
    } 
    /* CSS */
    /* .quantity {
        display: flex;
       
    }

    .quantity button {
        width: 40px;
        height: 40px;
        border: 1px solid #ccc;
        border-radius: 50%;
        background-color: #f0f0f0;
        font-size: 18px;
        margin: 0 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .quantity button:hover {
        background-color: #e0e0e0;
    }

    .quantity span {
        font-size: 18px;
        font-weight: bold;
    } */

    /* Style cho button Xóa Hết */
    .clear-cart-button {
        background-color: #ff5252;
        /* Màu đỏ */
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin-bottom: 10px;
        cursor: pointer;
        border-radius: 5px;
    }

    .clear-cart-button:hover {
        background-color: #ff0000;
        /* Màu đỏ sáng khi di chuột vào */
    }

    /* Style cho button Mua */
    .buy-button {
        background-color: #4caf50;
        /* Màu xanh lá cây */
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin-bottom: 10px;
        cursor: pointer;
        border-radius: 5px;
    }

    .buy-button:hover {
        background-color: #45a049;
        /* Màu xanh lá cây sáng khi di chuột vào */
    }

   
</style>
<?php
session_start();
ob_start();
$conn = mysqli_connect("127.0.0.1", "root", "", "ql_sach") or die("Không kết nối được");
mysqli_set_charset($conn, "utf8");
$query = "SELECT * FROM `contact` ";
$result = mysqli_query($conn, $query)or die(mysqli_error($conn));

$i = 0 ;
?>

<body>
<div id="header">
        <img class="logo" src="../icon/bookicon.jpg  "alt="a">
        <ul class="sub">
            <a class="login" href="">=====</a>
            <li class="child-sub">
                <a href="../main/admin_detail_book.php">Quản lí Sách</a>
            </li>
            <li class="child-sub">
                <a href="../main/BuyForAdmin.php">Đơn Hàng</a>
            </li>
            <li class="child-sub">
                <a href="../main/admin_profile.php">Trang cá nhân</a>
            </li>
            <li class="child-sub">
                <a href="../main/logout.php">Đăng xuất</a>
               
                </li>

        </ul>
        <ul class="head-bar">
            <li>
                <a href="../main/admin_page.php">Trang chủ</a>
            </li>
        </ul>

</div>
 <div id="body" style="background: url(../img/homepage.jpg) no-repeat center ;background-size: cover " >   
    <?php

         
            
  
    while($rows = mysqli_fetch_array($result)){
    echo ' <div class="shopping-cart"  style="box-shadow : 5px 2px 3px 0 solid ;"> ';
            echo '  <div class="title"> ';
            echo '  Góp Ý ' . ($i += 1);
            echo '  </div> ';
            echo '<div class="item">';
            echo '<div class="image">';
           
            echo '<span>Góp Ý Thứ : ' . $rows['id'] . '</span><br>';
            echo '<span>Tên người gửi : ' . $rows['name'] . '</span><br>';
            echo '<span>Tài khoản : ' . $rows['username'] . '</span><br>';
            echo '<span>Email : ' . $rows['email'] . '</span><br>';
            echo '<span>Số Điện Thoại: ' . $rows['phone'] . '</span><br>';
            echo '</div>';
            echo '<div class="quantity">';
            echo '<form method="post" action="">
        <input type="hidden" name="id" value="">
          <span><b>Nội dung góp ý :' . $rows['noi_dung_y_kien'] . '</b></span>
          </form>';

            echo '</div>';
            
            echo '</div>';
            
    
            echo ' <form method="post" action="">
            <input type="hidden" name="clear_cart" value="' . $i . ' onclick">
            <button type="submit" name="" class="buy-button">Phản Hồi</button>
            <button type="submit" name="btnclear_cart" class="clear-cart-button">Xóa Góp Ý</button>
            </form>';

          





            echo '  </div>';

            if(isset($_POST['btnclear_cart'])){
                $id = $rows['id'];
                $sql = "DELETE FROM `contact` WHERE `id`='$id';";
                $delete = mysqli_query($conn, $sql)or die(mysqli_error($conn));
              
              
              header("location:admin_page.php");   
        
              if($delete){
                  echo "Xóa Thành Công Thành Công";
                 
              }
              else{
                  echo "Xóa Thất Bại";
              }
            }
            if(empty($rows)){
                echo '<a href="../main/admin_page.php" style="text-decoration : none ;"><h1 style ="color : red ; text-align : center ; padding :5%"> Bạn Chưa Mua Cuốn Sách Nào  </h1></a>';
            }
            } 
       
        
    
        ?>
           </div>
       
    
   
         

    </div>

    <div id=footer></div>
</body>

</html>