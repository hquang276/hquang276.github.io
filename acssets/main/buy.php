<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Mua</title>
    <link rel="stylesheet" type="text/css" href="headerAndFooter.css">
    <link rel="stylesheet" type="text/css" href="../css/buy.css">
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

</style>
<?php

session_start();
require_once("config.php");
$query = "SELECT * FROM `users` ";
$result = mysqli_query($conn, $query)or die(mysqli_error($conn));

?>
<body>
    <div id="header">
        <img class="logo" src="../icon/bookicon.jpg  "alt="a">
        <ul class="sub">
            <a class="login" href="">=====</a>
            
            <li class="child-sub">
                <a href="../user_profile.php">Trang cá nhân</a>
            </li>
            <li class="child-sub">
                <a href="../main/cart.php"><img class="shop" src="">Giỏ Hàng</a>
            </li>
            <li class="child-sub">
                <a href="../main/logout.php">Đăng xuất</a>
            </li>

        </ul>
        <ul class="head-bar">
            <li>
                <a href="../main/user_page.php">Trang chủ</a>
            </li>
        </ul>

    </div>

    <div id="body">
    <div class="content-box">
        <div class="bigbox1">
            <div class="shopping-cart">
                <!-- Title -->
                <div class="title">
                  Giỏ Hàng
                </div>
               <?php

  if (!empty($_SESSION['giohang'])) {
 
  foreach($_SESSION['giohang'] as $item) {
     
      $bookId = $item[0];
      $soluong = $item[5];

      // Truy vấn thông tin sách từ CSDL
      $query = "SELECT * FROM books WHERE id = '$bookId'";
      $result = mysqli_query($conn, $query);
      if ($result) {
          // Lấy dữ liệu từ kết quả truy vấn
          $book = mysqli_fetch_assoc($result);
          $totalPrice =0 ;
            
          echo '<div class="item">';

          echo '<div class="image">';
          echo '<img src="../img/' . $book['img'] . '" alt="' . $book['name_book'] . '">';
          echo '</div>';
          echo '<div class="description">';
          echo '<span> ' . $book['name_book'] . '</span>';
          echo '</div>';
          echo '<div class="quantity" style="text-align : center ;">';  
          echo '<form method="post" action="">
          <input type="hidden" name="id" value=""' . $bookId . '">
         
          <span style="font-size: 150% ;">'. $soluong .' </span>
        
          </form>';
          echo '</div>';
          echo '<div class="total-price">' . $book['prices'] * $soluong . ' VNĐ</div>';
          echo '</div>';
      }
        ?>
        
        <?php

          $totalPrice += $book['prices'] * $soluong;
         
          $Ship = 0 ;
          $Discount = 0 ;
          if($soluong >=3 && $soluong < 5){
            $Ship = 10000 && $Discount = 25000 ;
          }
          else if ($soluong >= 5 && $soluong <10 ||  $totalPrice ==400000){
           $Discount = 50000;

          }else if ($soluong >= 10 || $totalPrice ==500000 ){
            $Discount = 100000;

          }else{
            $Ship = 25000 ;
          }
          $BuyPrices = $totalPrice + $Ship -$Discount ;
          
      }
      

    ?>
              </div>
        </div>
        
               
            
          
        
        
        <div class="bigbox2">
            <div class="content">
                <div class="title2" style="color: black;">
                    Đơn Mua Của Bạn
                  </div>
            </div>
            
            <div class="check_out">
            <form action="" method="post">
                <div class="information">
              
                <b><p>Địa Chỉ :</p></b> 
                <input type="text" value="" name= "locate" required ><br>
                <b><p>Số Điện Thoại :</p></b>
                <input type="tel" value="" name="sdt" required ><br>
                </div>
                <div class="payment" name="payment">            
                   <p>Thẻ Ngân Hàng <input checked id="visa" name="payment-method" type="radio" /> <br></p>
                    <p>Thẻ Ghi Nợ<input id="paypal" name="payment-method" type="radio" /><br></p>
                    <p> Thanh Toán Khi Nhận Hàng<input id="mastercard" name="payment-method" type="radio" /></p>                 
                </div>        
                <div class="total-prices"> 
                <?php
                   echo' <p>Phí Vận Chuyển :<b> '.$Ship.' </b></p>';
                    echo ' <p>Mã Giảm Giá :<b> '.$Discount.' </b></p>';
                      echo'   <p>Tổng Đơn :<b><i> '.$BuyPrices.' VNĐ</i></b> </p>';
                     ?>
            
                   </div>
    
                <div class="done">
                    <a href="../main/user_page.php"><button type="submit"  name="buyforadmin" value="" onclick>Mua</button></a>


                </div>

                    
               
                </form>
                
        </div>
    </div>

    </div>
    <?php
     
     } else{

    echo '<a href="../main/user_page.php"><h1> Bạn Không có gì để mua !! Hãy Cùng nhau xem vài cuốn sách nhé!! Click vào đây</h1></a>';
  }
  ?>
  <?php
                    if(isset($_POST['buyforadmin'])) {
                        $diaChi = $_POST['locate'];
                        $soDienThoai = $_POST['sdt'];
                      

                        if (!empty($_SESSION['giohang'])) {
                            // $orderDetails = array(); // Mảng lưu trữ thông tin của đơn hàng
                            foreach($_SESSION['giohang'] as $item) {
                                $bookId = $item[0];
                                $soluong = $item[5];
                               
                                $query = "SELECT * FROM books WHERE id = '$bookId'";
                                $result = mysqli_query($conn, $query);
                                    if ($result) {
                              // Lấy dữ liệu từ kết quả truy vấn
                                     $book = mysqli_fetch_assoc($result);
                                    $productDetails = array(
                                        "name" => $book['name_book'],
                                        "image" => $book['img'],
                                        "quantity" => $soluong,
                                        "price" => $book['prices'],
                                        "tacgia" =>$book['name_author'],
                                        "diachi" =>  $diaChi,
                                        "sdt" => $soDienThoai,

                                       
                                    );
                                    $_SESSION['orderDetails'][] = $productDetails;
                                }
                            }   
                           
                            $_SESSION['giohang'] = array();
                            
                    }

                    ?>
        <script>
        onclick= window.location.reload(true);
        alert("Bạn Đã Đặt Hàng Thành Công");
    

    </script>

                    <?php
                    header("location: user_page.php");
                }
                    ?>
         </div>
    
     <div id="footer">

    </div>
</body>
</html>