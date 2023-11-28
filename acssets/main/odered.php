<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Đơn Hàng </title>
    <link rel="stylesheet" type="text/css" href="headerAndFooter.css">
    <link rel="stylesheet" type="text/css" href="../css/cart.css">
    <link rel="shorcut icon" href="../icon/bookicon.jpg">
</head>
<style>
    /* CSS */
    .quantity {
        display: flex;
        align-items: center;
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
    }

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

    .total-price {
        display: inline;
        width: 100%;

    }

    .total-price p {
        float: left;
        margin-left: 2%;
    }

    .total-price h3 {
        color: green;
        margin-right: 69%;
        font-size: 20px;
    }

    .total-price button {
        float: right;
        margin-right: 2%;
    }
</style>
<?php
session_start();
ob_start();
$conn = mysqli_connect("127.0.0.1", "root", "", "ql_sach") or die("Không kết nối được");
mysqli_set_charset($conn, "utf8");
$totalPrice = 0;
$i = 0;
$Ship = 0;
$Discount = 0;

?>

<body>
    <div id="header">
        <a><img class="logo" src="../icon/bookicon.jpg  " alt="a">

            <ul class="sub">
                <a class="login" href="">=====</a>

                <li class="child-sub">
                    <a href="../main/user_profile.php?name=">Trang cá nhân</a>

                </li>

                <li class="child-sub">
                    <a href="../main/cart.php">Giỏ Hàng</a>
                </li>
                <li class="child-sub">
                    <a href="../main/contact.php">Liên Hệ</a>
                </li>
                <li class="child-sub">
                    <a href="../main/user_page.php">Shopping</a>
                </li>
                <li class="child-sub">
                    <a href="../main/homepage.php">Đăng xuất</a>
                </li>



            </ul>
    </div>



    <?php

    echo ' <div id="body" style="box-shadow : 5px 2px 3px 0 solid ;"> ';



    if (isset($_SESSION['orderDetails']) && !empty($_SESSION['orderDetails'])) {

        $orderDetails = $_SESSION['orderDetails'];
        foreach ($orderDetails as $i => $item) {
            echo ' <div class="shopping-cart"> ';
            echo '  <div class="title"> ';
            echo '  Đơn Hàng Thứ ' . ($i + 1);
            echo '  </div> ';
            echo '<div class="item">';
            echo '<div class="image">';
            echo '<img src="../img/' . $item['image'] . '" alt="' . $item['name'] . '">';
            echo '</div>';
            echo '<div class="description">';
            echo '<span>Tên sách: ' . $item['name'] . '</span>';
            echo '<span>Tác giả: ' . $item['tacgia'] . '</span>';
            echo '<span>Giá: ' . $item['price'] . ' VNĐ</span>';
            echo '</div>';
            echo '<div class="quantity">';
            echo '<form method="post" action="">
        <input type="hidden" name="id" value="">
          <span><h1>' . $item['quantity'] . '</h1> </span>
          </form>';

            echo '</div>';
            echo '<div class="total-price"><h1>' . $item['price'] * $item['quantity'] . ' VNĐ</h1></div>';

            $totalPrice += $item['price'] * $item['quantity'];
            echo '</div>';
            if ($item['quantity'] >= 3 && $item['quantity'] < 5) {
                $Ship = 10000;
                $Discount = 25000;
            } else if ($item['quantity'] >= 5 && $item['quantity'] < 10 ||  $totalPrice == 400000) {
                $Discount = 50000;
            } else if ($item['quantity'] >= 10 || $item['quantity'] == 500000) {
                $Discount = 100000;
            } else {
                $Ship = 25000;
            }
            $BuyPrices = $totalPrice + $Ship - $Discount;
            echo '<div class="total-price"><p>Tổng giá sau khi thêm ship và khuyến mãi:<h3> ' . $BuyPrices . ' VNĐ</h3></p><br>';
            echo '<p>Địa Chỉ : <h3>' . $item['diachi'] . '</h3></p><br> ';
            echo '<p>Số Điện Thoại : <h3>' . $item['sdt'] . '</h3></p><br>';
            echo ' <form method="post" action="">
            <input type="hidden" name="clear_cart" value="' . $i . ' onclick">
            <button type="submit" name="btnclear_cart" class="clear-cart-button">Hủy Đơn</button>
          
            </form>';

            if (isset($_POST['btnclear_cart'])) {
                // Lấy chỉ số của đơn hàng cần xóa từ input hidden
                $orderIndexToRemove = $_POST['clear_cart'];

                // Xóa đơn hàng có chỉ số tương ứng từ mảng $_SESSION['orderDetails']
                if (isset($_SESSION['orderDetails'][$orderIndexToRemove])) {
                    unset($_SESSION['orderDetails'][$orderIndexToRemove]);
                    // Sau khi xóa đơn hàng, bạn có thể cần reindex lại mảng để tránh lỗ hổng chỉ số
                    $_SESSION['orderDetails'] = array_values($_SESSION['orderDetails']);
                }
            }


            if (isset($_POST['buy'])) {

                $_SESSION['orderDetails'] = array();
            }





            echo '  </div>';
            echo ' </div>';
        }
        $i++;
    } else {
        echo '<a href="../main/user_page.php" style="text-decoration : none ;"><h1 style ="color : red ; text-align : center ; padding :5%"> Bạn Chưa Mua Cuốn Sách Nào  </h1></a>';
    }

    ?>

    </div>

    <div id=footer></div>
</body>

</html>