<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Trang Cá Nhân</title>
    <link rel="stylesheet" type="text/css" href="../css/add_book.css">
    <link rel="stylesheet" type="text/css" href="../main/headerAndFooter.css">
    
</head>
<?php
$conn = mysqli_connect("127.0.0.1","root","","ql_sach") or die("Không kết nối được");
mysqli_set_charset($conn,"utf8");

$query = "SELECT * FROM `users` ";
$result = mysqli_query($conn, $query)or die(mysqli_error($conn));
$fix = false ;

if($result){
    $fix =true ;
}

?>
<body style="background: url(../img/book_shop.jpg) ;">
  
 <div id="header">
        <img class="logo" src="../icon/bookicon.jpg  "alt="a">
        <ul class="sub">
            <a class="login" href="">=====</a>

            <li class="child-sub">
                <a href="../main/user_page.php">Shopping</a>
            </li>
            <li class="child-sub">
                <a href="../main/user_profile.php">Trang Cá Nhân</a>
            </li>
            <li class="child-sub">
                <a href="../main/cart.php">Giỏ Hàng</a>
            </li>
            <li class="child-sub">
                <a href="../main/homepage.php">Đăng xuất</a>
            </li>
        </ul>


    </div> 

    <div id="body">
        
        <div class="big_box" style=" height:fit-content  ; ">
        <?php
               if($rows = mysqli_fetch_array($result)){
                ?>   
        <div class="content">
            <h1>Chỉnh Sửa Trang Cá Nhân</h1>
        
        </div>
        <div id="big_form">
        <form action="" method="post">    
            <div class="small-form">
          
       
                
                <p>ID : <input type="text" name="id_user" value="<?php echo($rows["id_user"]) ?>" ></p>
                <p>Tên Hiển Thị : <input type="text" name="name" value="<?php echo($rows["name"])?>"></p>
                <p>Mật Khẩu :<input type="password" name="password" value="<?php echo($rows["password"])?>"></p>
                <p>Nhập Lại Mật Khẩu : <input type="password" name="re-password" value=""></p>
                <p>Ảnh: <img src="../user_profile_img/<?php echo $rows['img']; ?>" alt="Ảnh hiện tại"></p>
                <p>Chọn ảnh mới: <input type="file" name="img"></p>
                <p>Email: <input type="email" name="email" value="<?php echo($rows["email"])?> " ></p>
                <button name="btn_add" class="butt" >Chỉnh Sửa</button>
      
                </form>
            
        
        </div>
    
            
        </div>
           
            <?php
       
            if(isset($_POST['btn_add']) ) {
                    $id_user = $_POST['id_user'];
                  $name = $_POST['name'];
                  $pass = $_POST['password'];
                  $re_pass = $_POST['re-password'];
                  $img = $_POST['img'];
                  $email = $_POST['email'];
                

                  $errors = [];

                  if (!empty($name) && strlen($name) < 3) {
                    $errors['name'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $name,
                        'msg' => 'Tên phải có ít nhất 3 kí tự và không được để trống !!'
                    ];
                }

                if (!empty($name) && strlen($name) > 50) {
                    $errors['name'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $name,
                        'msg' => 'Mã không được vượt quá 50 và không được để trống !!'
                    ];
                }
                if (!empty($pass) && strlen($pass) < 3) {
                    $errors['pass'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $pass,
                        'msg' => 'Mật Khẩu phải có ít nhất 3 kí tự và không được để trống !!'
                    ];
                }

                if (!empty($pass) && strlen($pass) > 50) {
                    $errors['pass'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $pass,
                        'msg' => 'Mật Khẩu không được vượt quá 50 và không được để trống !!'
                    ];
                }

                if (empty($re_pass)&& !$pass) {
                    $errors['re_pass'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $re_pass,
                        'msg' => '2 mật khẩu không giống nhau , nhập lại'
                    ];
                }

                if (empty($email)) {
                    $errors['email'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $email,
                        'msg' => 'Vui lòng nhập email!!'
                    ];
                }
               


                if (empty($img)) {
                    $errors['img'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $img,
                        'msg' => 'Vui lòng up ảnh'
                    ];
                }
            
               
                
                if (!empty($errors)) {
                    
                    foreach($errors as $errorField) {
                        foreach($errorField as $error) {
                            echo  $error['msg'] . '<br />';
               
                        }
                    }
                    return;
                }

                if (empty($errors)) {
                    // Thực hiện cập nhật dữ liệu trong cơ sở dữ liệu
                    $sql = "UPDATE `users` SET `password`='$pass', `name`='$name', `email`='$email', `img`='$img' WHERE `id_user` = $id_user";
                    $fix = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                
                    if ($fix) {
                        ?>
                    <script>
                        alert("Chỉnh sửa thành công !!");
                    </script>
                        <?php


                        header("Location: user_profile.php");
                    } else {
                        echo 'Sửa Không Thành Công';
                    }
                }
            ?>
        </div>
        <?php
            }
               }

        ?>
         
        </div>
       


    
</div>
</body>
</html>