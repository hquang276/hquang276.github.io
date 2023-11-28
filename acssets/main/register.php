<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <link rel="stylesheet" type="text/css" href="headerAndFooter.css">
    <link rel="shorcut icon" href="../icon/bookicon.jpg">
    <title>Đăng Kí</title>
      <?php
session_start(); 
$conn = mysqli_connect("127.0.0.1","root","","ql_sach") or die("Không kết nối được");
mysqli_set_charset($conn,"utf8");

$query = "SELECT * FROM `users`";
$result = mysqli_query($conn, $query)or die(mysqli_error($conn));
$register = false;

if ($result) {
    $register = true;
}
?> 
</head>

<body>
    <div id="body" style="background-image : url(../img/book_shop.jpg)">
        <img src="../img/" alt="">
    
        <div class="big-box">
            <div class="box-1">
                <h1>
                    THAM GIA CÙNG CHÚNG TÔI
                </h1>
                <h2>
                    ĐĂNG KÝ NGAY!
                </h2>
                <div class="clear"></div>
            </div>
            <div class="box-2">
                <div class="small-box">
                    <form action="" method="post">
                        <div class="register">
                            <h3>*Tài Khoản</h3>
                            <input type="text" name="txtuser" placeholder="Nhập Tài khoản " required>
                        </div>
                        <div class="register">
                            <h3>*Mật khẩu(gồm chữ và số)</h3>
                            <input type="password" name="txtpass" placeholder="Nhập mật khẩu " required>
                           
                        </div>
                        <div class="register">
                            <h3>* Nhập lại mật khẩu(gồm chữ và số)</h3>
                            <input type="password" name="txtre_pass" placeholder="Nhập lại mật khẩu " required>
                        </div>
                    </form>
                </div>
                <div class="small-box">
                <form action="" method="post">
                        <div class="register">
                            <h3>*Tên</h3>
                            <input type="text" name="txtname" placeholder="Tên hiển thị" required>
                        </div>
                        <div class="register">
                            <h3>*Email</h3>
                            <input type="text" name="txtemail" placeholder="Nhập email  " required >
                        </div>
                        <div class="register">
                            <h3>*Só Điện Thoại</h3>
                            <input type="text" name="txtsdt" placeholder="Nhập Số Điện Thoại  " required>
                        </div>
                        </form>
                </div>
            </div>
            <div class="box-3">
                <div class="login">
                    <a href="../main/login.php" >Đã có tài khoản? Đăng Nhập</a>
                </div>
                <div class="create">
                <form action="" method="post">
                  <input type="submit" name="btnregister" class="btnregister" value="ĐĂNG KÝ">
                </form>
                </div>
                 <?php
               
               if(isset($_POST["btnregister"])){
                   $user_name = $_POST["txtuser"];
                   $pass =  $_POST["txtpass"];
                   $re_pass = $_POST["txtre_pass"];
                   $name = $_POST["txtname"];
                   $email = $_POST["txtemail"];
                   $phone = $_POST["txtsdt"];
               
                   $errors = [];

                   if (!empty($user_name) && strlen($user_name) < 3) {
                     $errors['user'][] = [
                         'rule' => 'minlength',
                         'rule_value' => 3,
                         'value' => $user_name,
                         'msg' => 'Tên phải có ít nhất 3 kí tự và không được để trống !!'
                     ];
                 }
 
                 if (!empty($user_name) && strlen($user_name) > 50) {
                     $errors['user'][] = [
                         'rule' => 'minlength',
                         'rule_value' => 3,
                         'value' => $user_name,
                         'msg' => 'Tên không được vượt quá 50 và không được để trống !!'
                     ];
                 }
                 if (!empty($pass) && strlen($pass) < 3) {
                     $errors['pass'][] = [
                         'rule' => 'minlength',
                         'rule_value' => 3,
                         'value' => $pass,
                         'msg' => 'Mật khẩu phải có ít nhất 3 kí tự và không được để trống !!'
                     ];
                 }
                 if (!empty($pass) && strlen($pass) > 50) {
                    $errors['pass'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $pass,
                        'msg' => 'Mật khẩu phải có ít nhất 3 kí tự và không được để trống !!'
                    ];
                }
                if(!empty($phone) && strlen($phone) > 50){
                    $errors['phone'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $phone,
                        'msg' => 'Số điện thoại không được để trống và không được việt quá 50 kí tự và không được để trống !!'
                    ];
            
                }
                if (!empty($name) && strlen($name) < 3) {
                    $errors['name'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $name,
                        'msg' => 'Tên Hiển Thị phải có ít nhất 3 kí tự và không được để trống !!'
                    ];
                }
                if (!empty($email) && strlen($email) < 3) {
                    $errors['email'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $email,
                        'msg' => 'Email phải có ít nhất 3 kí tự và không được để trống !!'
                    ];
                }
                if($re_pass != $pass){
                    $errors['pass'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $pass,
                        'msg' => 'Mật khẩu và xác nhận không giống nhau !!'
                    ];
                }
                if (!empty($errors)) {
                    // In ra thông báo lỗi
                    // kèm theo dữ liệu thông báo lỗi
                    foreach($errors as $errorField) {
                        foreach($errorField as $error) {
                            echo  $error['msg'] . '<br />';
               
                        }
                    }
                    return;
                }

               $sql = "INSERT INTO `users` (`username`,`password`, `name`,`email`, `phone`) VALUES ('$user_name', '$pass','$name','$email','$phone')";   
               $register =  mysqli_query($conn, $sql)or die(mysqli_error($conn));
             
               if($register) {
                header("location:../main/login.php");
                setcookie("success", "Đăng ký thành công!", time()+1, "/","", 0);
               
            }else{
                echo 'Đăng kí Không thành công ';

            }
            mysqli_stmt_close($stmt);
           
               }
                
           
           ?> 
            </div>
           

           

        </div>
    </div>

</body>
</html>