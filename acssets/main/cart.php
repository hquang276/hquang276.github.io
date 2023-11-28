<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cart.css">
    <link rel="stylesheet" type="text/css" href="headerAndFooter.css">
    <link rel="shorcut icon" href="../icon/cart_icon.jpg">
    <title>Giỏ Hàng</title>
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
        font-size: 16px;
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
        font-size: 16px;
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

$conn = mysqli_connect("127.0.0.1", "root", "", "ql_sach") or die("Không kết nối được");
mysqli_set_charset($conn, "utf8");
$username = $_SESSION["username"];



?>

<body>
    <div id="header">
        <ul class="sub">
            <a class="login" href="">=====</a>
            <li class="child-sub">
                <a href="../main/user_profile.php">Trang cá nhân</a>
            </li>
            <li class="child-sub">
                <a href="../main/user_page.php">Shopping</a>
            </li>
            <li class="child-sub">
                <a href="../main/homepage.php">Đăng xuất</a>
            </li>
        </ul>
    </div>

    <div id="body" style="box-shadow : 5px 2px 3px 0 solid ;">
        <div class="shopping-cart">
            <!-- Tiêu đề -->
            <div class="title">
                Giỏ Hàng
            </div>

            <?php


            include("update_quantity.php");

            $totalPrice = 0;
            if (!empty($_SESSION['giohang'])) {

                foreach ($_SESSION['giohang'] as $item) {

                    $bookId = $item[0];
                    $soluong = $item[5];

                    // Truy vấn thông tin sách từ CSDL
                    $query = "SELECT * FROM books WHERE id = '$bookId'";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        // Lấy dữ liệu từ kết quả truy vấn
                        $book = mysqli_fetch_assoc($result);


                        // Hiển thị thông tin sách trong giỏ hàng, bao gồm ảnh
                        echo '<div class="item">';

                        echo '<div class="buttons">';
                        echo '<span class="delete-btn"><a href="../main/remove_item.php?id=' . $bookId . '">';
                        echo '<img src="../icon/trash-solid.svg" alt="Xóa" /></a></span>';
                        echo '</div>';
                        echo '<div class="image">';
                        echo '<img src="../img/' . $book['img'] . '" alt="' . $book['name_book'] . '">';
                        echo '</div>';
                        echo '<div class="description">';
                        echo '<span>Tên sách: ' . $book['name_book'] . '</span>';
                        echo '<span>Tác giả: ' . $book['name_author'] . '</span>';
                        echo '<span>Giá: ' . $book['prices'] . ' VNĐ</span>';
                        echo '</div>';
                        echo '<div class="quantity">';
                        echo '<form method="post" action="">
        <input type="hidden" name="id" value="' . $bookId . '">
        <button type="submit" name="action" value="subtract" >-</button>
        <span>' . $soluong . ' </span>
        <button type="submit" name="action" value="add">+</button>
        </form>';
                        echo '</div>';
                        echo '<div class="total-price">' . $book['prices'] * $soluong . ' VNĐ</div>';
                        echo '</div>';
                        $totalPrice += $book['prices'] * $soluong;
                        


                    }
                }
                echo '<div class="total-price"><h1>Tổng giá: ' . $totalPrice . ' VNĐ</h1></div>';
                echo '<form method="post" action="">
    <button type="submit" name="clear_cart" class="clear-cart-button">Xóa Hết</button>
    </form>';
                echo '<form method="post" action="../main/buy.php">
    <button type="submit" name="buy"  class="buy-button">Mua</button>
    
        </form>';

                if (isset($_POST['clear_cart'])) {
                    // Xóa hết sản phẩm trong giỏ hàng bằng cách gán giỏ hàng thành một mảng trống
                    $_SESSION['giohang'] = array();
                }
            } else {
                echo '<a href="../main/user_page.php" style="text-decoration : none ;"><h1 style ="color : white ; text-align : center ; padding :5%">Giỏ Của Bạn Trống !!</h1></a>';
            }


            ?>




        </div>

    </div>
</body>

</html>