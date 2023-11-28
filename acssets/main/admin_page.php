<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Dành Cho Quản Lý</title>
    <link rel="stylesheet" type="text/css" href="headerAndFooter.css">
    <link rel="stylesheet" type="text/css" href="../css/admin_page.css">
</head>
<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
$conn = mysqli_connect("127.0.0.1","root","","ql_sach") or die("Không kết nối được");
mysqli_set_charset($conn,"utf8");
$query = 'SELECT * FROM `books`';
$result = mysqli_query($conn, $query)or die(mysqli_error($conn));
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
        <ul class="head-bar">
            <li>
                <a href="../main/contact_admin.php">Hòm Góp Ý</a>
            </li>
        </ul>
    </div>

    </div>

    <div id="body" style="background-image : url(../img/book_shop.jpg)">
        <div class="big_content">
            <p>Các Sách Hiện Tại Đang Quản Lý </p>
     <form action="" method="post">
             <h3>Tìm Kiếm : <input class="search" type="text" name="txt_search" value="">
            <button name="btn_search"><img class="search_img" src="../icon/searchicon.png"></button></h3>
     <div calss="drop-box">
    <label for="prices" style="color: white ; margin-left: 37%; font-size: 150% ; text-align: center;">Chọn mức giá:</label> 
    <select name="drop_prices" id="prices" style="font-size: 150%;">
        <option value="no" name="no">Không</option>  
        <option value="re" name="re">50,000vnd->100,000vnd</option> 
        <option value="vua" name="vua">100,000vnd->200,000vnd</option> 
        <option value="dat" name="dat">200,000vnd-500,0000vnd</option> 
        <option value="discout" name="discout">Khuyến Mãi</option>

    </select>
       
    </form>

</div>


        </div>
        
        <div class="big-box">
            
                
        <?php
            if (isset($_POST["btn_search"]) ) {
                $drop_prices = $_POST["drop_prices"];
                $_SESSION["drop_prices"] = $drop_prices;
                $key = $_POST["txt_search"];
                $sql = "SELECT * FROM `books` Where name_book like '%$key%' order by name_book";
                if (isset($_SESSION["drop_prices"]) && ($_SESSION["drop_prices"] == "re")){
                    $key = $_POST["txt_search"];
                    $sql = "SELECT * FROM `books` Where name_book like '%$key%' And prices >= 50000 and prices <=100000 ORDER BY name_book " ;
               
    
            
                }if (isset($_SESSION["drop_prices"]) && ($_SESSION["drop_prices"] == "vua")){
                    $key = $_POST["txt_search"];
                    $sql = "SELECT * FROM `books` Where name_book like '%$key%' And prices >= 100000 and prices <=200000 ORDER BY name_book " ;
                   
    
                } if (isset($_SESSION["drop_prices"]) && ($_SESSION["drop_prices"] == "dat")){
                    $key = $_POST["txt_search"];
                    $sql = "SELECT * FROM `books` Where name_book like '%$key%' And prices >= 200000 and prices <=500000 ORDER BY name_book " ;
                    

            }
            
            

            }else{
                $sql = 'SELECT * FROM `books`' ;
                
            }
            $result =mysqli_query($conn,$sql) or die(mysqli_error($conn));
            
           
            

            ?>

           
             <?php
               While($rows = mysqli_fetch_assoc($result)){
                $id = $rows['id'];
                $name_book = $rows['name_book'];
                $img = $rows['img'];
                $price = $rows['prices'];

                ?>
                
            <div class="small_box" >
                <div class="content">
                    <?php echo "<p><b>$price.VND</b></p>";?>
                </div>
                
               <div class="book_pics">
               
                
              <a><img class="img" src="../img/<?php echo $img ?>" alt="Ảnh Sách"></a>

                
                </div>
                <div class="content1">
                    <a value="book"  href="../main/edit_book.php?id=<?php echo  $id ?>"><?php echo $name_book ?></a>
                </div>
        </div> 
            
           
           
            <?php
               }

                ?>
            
           
               
        



        </div>
   


    </div>


  
    
</body>
</html>