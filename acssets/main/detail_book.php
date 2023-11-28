<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/detail_book.css">
    <link rel="stylesheet" type="text/css" href="headerAndFooter.css">
    <link rel="shorcut icon" href="../icon/bookicon.jpg">
    <title>Thông Tin Chi Tiết Của Sách </title>
</head>
<?php
$conn = mysqli_connect("127.0.0.1","root","","ql_sach") or die("Không kết nối được");
mysqli_set_charset($conn,"utf8");
session_start();
ob_start();
$id=$_GET['id'];
$query = "SELECT * FROM `books` Where id='$id' ";
$result = mysqli_query($conn, $query)or die(mysqli_error($conn));
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = array();
}
?>

<style>
.small-box{
    transition: transform 0.3s ease;
}
.small-box:hover {
    transform: translateY(-10px); /* Di chuyển lên trên 10px khi hover */
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2); /* Hiển thị bóng đổ khi hover */
}
</style>
<body>
    <div id="header">
        
        <li class="child-sub" style=" display : inline ;">
                <a href="../main/user_page.php" style=" 
    background-color:rgb(179, 148, 114) ;
    border-radius : 20px ;
    font-size : 25px ;
    float: left;
    height: 80x;
    width: 100px;
    text-decoration : none ;
    color : white ;
    margin-left: 100px;
        "><<= Quay Lại</a>
            </li>
        <ul class="sub">
            <a class="login" href="">=====</a>
            
            <li class="child-sub">
                <a href="../main/user_profile.php">Trang cá nhân</a>
            </li>
            <li class="child-sub">
                <a href="../main/cart.php">Giỏ Hàng</a>
            </li>
            <li class="child-sub">
                <a href="../main/homepage.php">Đăng xuất</a>
            </li>
    </div>

    <div id="body">
        <div class="big_box">
            <?php
            while($rows = mysqli_fetch_array($result)){
            ?>
       
            <div class="small-box1" >
                <img  class="img" src="../img/<?php echo($rows['img']) ?>">
                <input type="hidden" name="anh" value="">
                </div>
                <div class="small-box2">
                <div class="content"> 
                    <form method="post" action="">
            <ul>
                <li><h1><?php echo($rows["name_book"]) ?> </h1>
                <input type="hidden" name="ten_sach" value="<?php echo($rows["name_book"])?>"></li>
                <li>Mã Sách : <b><?php echo($rows["id"]) ?></b>
                <input type="hidden" name="id" value="<?php echo($rows["id"]) ?>"></li>
                <li>Thông tin :<b> <?php echo($rows["info"]) ?></b> 
                <input type="hidden" name="thongtin" value=" <?php echo($rows["info"]) ?>"></li>
                <li>Số Lượng : <?php echo($rows["soluong"]) ?>
                <input type="hidden" name="soluong" value="<?php echo($rows["soluong"]) ?>"></li>
                <li>Tác Giả:  <?php echo($rows["name_author"]) ?>
                <input type="hidden" name="tacgia" value=" <?php echo($rows["name_author"]) ?>"></li>
                <li><h2>Giá :<?php echo($rows["prices"]) ?> </h2>
                <input type="hidden" name="gia" value="<?php echo($rows["prices"]) ?> "></li>
             </ul>
          
            </div>
               
              <div class="input" >  
                 <button type="submit" name="dathang" class="button-add">Thêm Vào Giỏ Hàng</button>
              
             </div>
             </form>
             <?php
require_once("config.php");

if (isset($_POST['dathang'])) {
    // Lấy thông tin sách từ database
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $query = "SELECT * FROM `books` WHERE id='$id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $book = mysqli_fetch_assoc($result);
    $ten_sach = $book['name_book'];
    $thongtin = $book['info'];
    $tacgia = $book['name_author'];
    $gia = $book['prices'];
    $soluong = 1; // Số lượng cố định là 1

    // Kiểm tra xem sách đã có trong giỏ hàng hay chưa
    $itemFound = false;
    foreach ($_SESSION['giohang'] as &$item) {
        if ($item[0] == $id) {
            // Nếu sản phẩm đã có trong giỏ hàng, chỉ cập nhật số lượng
            $item[5] += $soluong;
            $itemFound = true;
            break;
        }
    }

    // Nếu sách chưa có trong giỏ hàng, thêm mới
    if (!$itemFound) {
        $item = array($id, $ten_sach, $thongtin, $tacgia, $gia, $soluong);
        $_SESSION['giohang'][] = $item;
    }

    header("Location: ../main/cart.php");
    exit();
}
?>

<?php 
            }

?>
               
    
        </div>
    </div>   
        
                
            
            
            
           
    
           
               
            

        

    <div id="footer">
        <h1 style="text-align: center;">Đánh Giá 5 Sao Nhé  </h1>
    </div>
</body>
</html>