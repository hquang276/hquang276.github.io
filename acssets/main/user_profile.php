<?php
session_start(); 
$conn = mysqli_connect("127.0.0.1", "root", "", "ql_sach") or die("Không kết nối được");
mysqli_set_charset($conn, "utf8");
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}


 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Cá Nhân</title>
    <link rel="stylesheet"  type="text/css" href="../css/admin_profile.css">
    <link rel="stylesheet" type="text/css" href="headerAndFooter.css">
    <link rel="shorcut icon" href="../icon/icon_pro.jpg">
</head>

<body>
   
    <div id="header">
    <img class="logo" src="../icon/bookicon.jpg  "alt="a">
    <ul class="sub">
        <a class="login" href="">=====</a>
        <li class="child-sub">
            <a href="../main/cart.php"><img class="shop" src="">Giỏ Hàng</a>
        </li>
        <li class="child-sub">
                    <a href="../main/contact.php">Liên Hệ</a>
                </li>
        <li class="child-sub">
            <a href="../main/login.php">Đăng xuất</a>
        </li>

    </ul>
    <ul class="head-bar">
        <li>
            <a href="../main/user_page.php">Trang chủ</a>
        </li>
    </ul>
</div>

<?php 
$username = $_SESSION["username"];

ob_start();
$id = $_GET['id'];
$sql = "SELECT * FROM `users` WHERE id_user='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

 ?> <?php  
       
       echo'
       <div id="body" style="background-image: url(../img/book_shop.jpg);">
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <div class="wrapper" style="box-shadow : 1px 2px 3px 0; border : 1px solid black">
    
        <div class="left">
            <div class="image">
            <img src="../user_profile_img/'.$row['img'].'" alt="user" >
        </div>
       
        <div class="content">
            <h4>'.$row['name'].'</h4>
            <p>Người Dùng</p>
            <p><a href="../main/edit_profile.php?id='.$row["id_user"].'&&name='.$row["username"].'"><img src="../icon/edit_icon" alt=""></a>
            
            </p>
        </div>
        </div>
        <div class="right">
            <div class="info">
                <h3>Thông Tin</h3>
                <div class="info_data">
                    <div class="data">
                        <h4>Email</h4>
                        <p>'.$row["email"].'</p>
                        
                    </div>
                    <div class="data">
                    <h4>Phone</h4>
                        <p>'.$row["phone"].'</p>
                </div>
                </div>
            </div>
            
        
        <div class="projects">
                <h3>Tài Khoản </h3>
                <div class="projects_data">
                    <div class="data">
                        <h4>Số Lượng Sách Đã Đặt</h4>
                        <p>20</p>
                    </div>
                    <div class="data">
                    <h4>Thông Tin Tài Khoản</h4>
                        <p>Tên Tài Khoản : '.$row["username"].' </p>
                        <p>Mật Khẩu : '.$row["password"].' </p>
                       
                    </div>

                </div>
            </div>

          
        
            <div class="social_media">
                <ul>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
        </div>
    </div>
</div>'
?>
<?php
}
}
?>


<div id="footer">
    <div class="box-1">
        <h3>Email liên hệ: nhom12@gmail.com</h3> 
        <p>Được phát triển bởi nhóm 12 </p>
        <a href="Đã có tài khoản" >Chính sách sử dụng</a>
     </div>


</div>
    
</body>
</html>