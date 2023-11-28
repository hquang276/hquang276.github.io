<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chúc Bạn Trọn Được Quyển Sách Ưng Ý</title>
    <link rel="stylesheet" type="text/css" href="headerAndFooter.css">
    <link rel="stylesheet" type="text/css" href="../css/admin_page.css">
    <link rel="shorcut icon" href="../icon/bookicon.jpg">
</head>
<?php
session_start();
$conn = mysqli_connect("127.0.0.1", "root", "", "ql_sach") or die("Không kết nối được");
mysqli_set_charset($conn, "utf8");

$_SESSION['username'];
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
while ($rows = mysqli_fetch_assoc($result)) {
    $id = $rows['id_user'];



?>

    <body>
        <div id="header">

            <a><img class="logo" src="../icon/bookicon.jpg  " alt="a">

                <ul class="sub">
                    <a class="login" href="">=====</a>

                    <li class="child-sub">
                        <a href="../main/user_profile.php?id=<?php echo $id ?>">Trang cá nhân</a>

                    </li>

                    <li class="child-sub">
                        <a href="../main/cart.php"><img class="shop" src="../icon/giohang.jpg">Giỏ Hàng</a>
                    </li>
                    <li class="child-sub">
                        <a href="../main/odered.php">Đơn Hàng</a>
                    </li>
                    <li class="child-sub">
                        <a href="../main/contact.php">Liên Hệ</a>
                    </li>
                    <li class="child-sub">
                        <a href="../main/homepage.php">Đăng xuất</a>
                    </li>



                </ul>







        </div>

        </div>

        <div id="body" style="background-image : url(../img/book_shop.jpg)">
            <div class="big_content">
                <p>Chào mừng
                <p style="color : wheat ; display : inline "><?php echo '' . $_SESSION["username"] . '' ?>
                <p>Các Sách Hiện Tại Đang Bán </p>
                <form action="" method="post">
                    <h3>Tìm Kiếm : <input class="search" type="text" name="txt_search" value="">
                        <button name="btn_search"><img class="search_img" src="../icon/searchicon.png"></button>
                    </h3>
                    <div calss="drop-box">
                        <label for="prices" style="color: white ; margin-left: 37%; font-size: 150% ; text-align: center;">Chọn mức giá:</label>
                        <select name="drop_prices" id="prices" style="font-size: 150% ; " >
                            <option value="no" name="no">Vui lòng chọn mức giá</option>
                            <option value="re" name="re">50,000vnd -> 100,000vnd</option>
                            <option value="vua" name="vua">100,000vnd -> 200,000vnd</option>
                            <option value="dat" name="dat">200,000vnd -> 500,0000vnd</option>
                            <option value="discout" name="discout">Khuyến Mãi</option>

                        </select>

                </form>

            </div>
        </div>

        <div class="big-box">


            <?php
            if (isset($_POST["btn_search"])) {
                $drop_prices = $_POST["drop_prices"];
                $_SESSION["drop_prices"] = $drop_prices;
                $key = $_POST["txt_search"];
                $sql = "SELECT * FROM `books` Where name_book like '%$key%' order by name_book";
                if (isset($_SESSION["drop_prices"]) && ($_SESSION["drop_prices"] == "re")) {
                    $key = $_POST["txt_search"];
                    $sql = "SELECT * FROM `books` Where name_book like '%$key%' And prices >= 50000 and prices <=100000 ORDER BY name_book ";
                }
                if (isset($_SESSION["drop_prices"]) && ($_SESSION["drop_prices"] == "vua")) {
                    $key = $_POST["txt_search"];
                    $sql = "SELECT * FROM `books` Where name_book like '%$key%' And prices >= 100000 and prices <=200000 ORDER BY name_book ";
                }
                if (isset($_SESSION["drop_prices"]) && ($_SESSION["drop_prices"] == "dat")) {
                    $key = $_POST["txt_search"];
                    $sql = "SELECT * FROM `books` Where name_book like '%$key%' And prices >= 200000 and prices <=500000 ORDER BY name_book ";
                }
            } else {
                $sql = 'SELECT * FROM `books`';
            }
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));


            // In ra sản phẩm     

            ?>
            <?php

            while ($rows = mysqli_fetch_assoc($result)) {
                $id = $rows['id'];
                $name_book = $rows['name_book'];
                $img = $rows['img'];
                $price = $rows['prices'];

            ?>

                <div class="small_box">
                    <div class="content">
                        <?php echo "<p><b>$price.VND</b></p>"; ?>
                    </div>

                    <div class="book_pics">


                        <a><img class="img" src="../img/<?php echo $img ?>" alt="Ảnh Sách"></a>


                    </div>
                    <div class="content1">
                        <a value="book" href="../main/detail_book.php?id=<?php echo  $id ?>"><?php echo $name_book ?></a>

                    </div>
                </div>
        <?php

            }
        }
        ?>













        </div>



        </div>



    </body>

</html>