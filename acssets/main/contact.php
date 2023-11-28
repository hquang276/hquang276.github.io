<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="headerAndFooter.css">
    <link rel="stylesheet" type="text/css" href="../css/contact.css">
    <title>Liên Hệ Góp Ý Với Chúng Tôi</title>
    <link rel="shorcut icon" href="../icon/bookicon.jpg">
    
</head>
<?php

session_start();
require_once("config.php");
$query = "SELECT * FROM `users` ";
$result = mysqli_query($conn, $query)or die(mysqli_error($conn));
$add = false ;

if($result){
    $add= true ;
}
?>
<body>
<div id="header">

<a><img class="logo" src="../icon/bookicon.jpg  " alt="a">

    <ul class="sub">
        <a class="login" href="">=====</a>
       
        <li class="child-sub">
            <a href="../main/user_page.php">Shopping</a>

        </li>
        <li class="child-sub">
            <a href="../main/user_profile.php?name=">Trang cá nhân</a>

        </li>
        

        <li class="child-sub">
            <a href="../main/cart.php">Giỏ Hàng</a>
        </li>
        <li class="child-sub">
            <a href="../main/odered.php">Đơn Hàng</a>
        </li>
        <li class="child-sub">
            <a href="../main/homepage.php">Đăng xuất</a>
        </li>



    </ul>


    <script>
        function submitForm() {
            document.getElementById("contactForm").style.display = "none";
            document.getElementById("thankYouMessage").style.display = "block";
            return false;
        }
    </script>




</div>
    <div id="body">
    <div class="outer-container">
        <div class="form-container" id="contactForm">
            <h2>Hòm Thư Góp Ý</h2>
            <form onsubmit="return submitForm()" action="" method="post">
            <?php
                    if($rows = mysqli_fetch_array($result)){

            ?>
                <div class="form-group">
                    <label for="ho_ten">Họ và Tên:</label>
                    <input type="text" id="ho_ten" name="name" value="<?php $rows['name']?>" required>
                </div>
                <div class="form-group">
                    <label for="tai_khoan">Tài Khoản:</label>
                    <input type="text" id="tai_khoan" name="username" value="<?php $rows['username']?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php $rows['email']?>" required>
                </div>
                <div class="form-group">
                    <label for="so_dien_thoai">Số Điện Thoại:</label>
                    <input type="tel" id="so_dien_thoai" name="phone" value="" required>
                </div>
                <div class="form-group">
                    <label for="noi_dung_y_kien">Nội Dung Ý Kiến:</label>
                    <textarea id="noi_dung_y_kien" name="noi_dung_y_kien" value="" required></textarea>
                </div>
                <button type="submit" name="btnsend">Gửi</button>
            </form>
            <?php
            if(isset($_POST['btnsend'])){
                $name = $_POST['name'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $noi_dung_y_kien = $_POST['noi_dung_y_kien'];

                $sql = "INSERT INTO `contact`(`name`, `username`, `email`, `phone`, `noi_dung_y_kien`) VALUES (' $name','$username','  $email','$phone',' $noi_dung_y_kien')";
                $add = mysqli_query($conn, $sql)or die(mysqli_error($conn));
           
            ?>
        </div>
        <?php 
        if($add){
      echo'  <div class="thank-you-message" id="thankYouMessage" style="display:none;">
            <h2 style="color: rgb(0, 0, 0);">Cảm ơn bạn đã đóng góp!</h2>
            <p style="color: rgb(0, 0, 0);">Mọi ý kiến của bạn đều được tiếp nhận và chú ý.</p>
            <button>
                <a href="../main/user_page.php"  style="color: azure;">OK</a>
            </button>
            
        </div>';
          }
        }
    }

        ?>
    </div>
    </div>
    <div id="footer">
    <div class="box-1">
           <h3>Email liên hệ: nhom12@gmail.com</h3> 
           <p>Được phát triển bởi nhóm 12 </p>
           <a href="Đã có tài khoản" >Chính sách sử dụng</a>
        </div>
        <div class="box-2">
            <a href="Đã có tài khoản" ><img class="icon" src="../icon/fbicon.jpg" alt=""></a>
            <a href="Đã có tài khoản" ><img class="icon" src="../icon/igicon.jpg" alt=""></a>
        </div>
    </div>
</body>

</html>