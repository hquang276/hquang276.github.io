<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="headerAndFooter.css">
    <link rel="stylesheet" type="text/css" href="../css/admin_detail_page.css">
    <title>Chỉnh Sủa Sách</title>
</head>
<?php
$conn = mysqli_connect("127.0.0.1","root","","ql_sach") or die("Không kết nối được");
mysqli_set_charset($conn,"utf8");

$query = "SELECT * FROM `books` ";
$result = mysqli_query($conn, $query)or die(mysqli_error($conn));
?>
<body>
    <div id="header">
        <img class="logo" src="../icon/bookicon.jpg  "alt="">
        <ul class="sub">
            <a class="login" href="">=====</a>
            <li class="child-sub">
                <a href="../main/BuyForAdmin.php">Đơn Hàng</a>
            </li>
            <li class="child-sub">
                <a href="../main/admin_profile.php">Trang cá nhân</a>
            </li>
            <li class="child-sub">
                <a href="../main/BuyForAdmin.php">Đơn Hàng</a>
            </li>
            <li class="child-sub">
                <a href="../main/login.php">Đăng xuất</a>
            </li>
    </div>

    <div id="body">
        <div class="content">
            <h1>Danh sách Sách</h1>
            <a href="../main/add_book.php" class="add_book">Thêm Sách</a>
        </div>
        <div class="big-box">
        <form method="get" action="../main/edit.php">
        
            <table clas="information" border="1px" style="align-items: center;">
              
                    <tr>
                        <th style="width: 5% ; height :fit-content">Mã Sách</th>
                        <th style="width: 7%;  height :fit-content">Tên Sách</th>
                        <th style="width: 7%;  height :fit-content">Tác Giả</th>
                        <th  style="width: 7% ; height :fit-content">Ảnh</th>
                        <th  style="width: 45% ;  height :100%">Mô Tả </th>
                        <th style="width: 5%;  height :fit-content">Giá</th>
                        <th style="width: 2%;  height :fit-content">Số Lượng</th>
                        <th  style="width: 7%;  height :fit-content">Sửa</th>
                    </tr>
                    <?php 
             while($rows = mysqli_fetch_array($result)){

        ?>
                    <tr>
                        <td class="td"><?php echo($rows["id"]) ?></td>
                        <td class="td"><?php echo($rows["name_book"]) ?></td>
                        <td class="td"><?php echo($rows["name_author"]) ?></td>
                        <td class="td" ><img src="../img/<?php echo ($rows["img"]) ?>" alt=""></td>
                        <td class="td"><p><?php echo($rows["info"]) ?></p></td>
                        <td class="td"><?php echo($rows["prices"]) ?></td>
                        <td class="td"><?php echo($rows["soluong"]) ?></td>
                        <td class="td">
                            <a href="./edit_book.php?id=<?php echo ($rows["id"]) ?>" ><img src="../icon/edit_icon">
                            </a>
                            <a href="./clear_book.php?id=<?php echo ($rows["id"]) ?>"><img src="../icon/trash-solid.svg" ></a>
                        </td>
                    </tr>
               

                    <?php 
            }

            ?>    

               
                
                    
                

            </table>
        </form>
    </div>

    </div>

   
          
        
                
            
            
            
           
    
           
               
            

        

    
</body>
</html>