<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="headerAndFooter.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css"> 
    <link rel="shorcut icon" href="../icon/bookicon.jpg">
    <title>Đăng Nhập</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<style>
    .sub li {
        text-align: center;
        margin-top: 15px;
        font-size: 25px;
    }

    .sub li a {
        text-decoration: none;
        color: white;
    }
</style>

<body>
    <div id="header">
        <img class="logo" src="../icon/bookicon.jpg" alt="a">
        <ul class="sub">
            <li>
                <a href="../main/homepage.php">Trang Chủ </a>
            </li>
        </ul>
    </div>
    <div id="body" style="background:no-repeat url(../img/login_img.jpg) ; background-size : 100% ">
        <div class="box2">
            <div class="small-box" style="box-shadow: 1px 2px 3px 0; border: 1px solid ">
                         
                <div class="small-box2">
                    <h1>ĐĂNG NHẬP</h1>
                </div>
    

                <div class="small-box3">
                    <div class="content">
                        <form action="" method="post">
                            <div class="login">
                                <h2>*Tài Khoản</h2> 
                                <input type="text" id="username" placeholder="Nhập Tài Khoản" name="username" required>
                            </div>

                             <div class="login">
                                <h2>*Mật Khẩu</h2>
                                <i class="fas fa-eye-slash toggle-password" onclick="togglePasswordVisibility()"></i>
                                <input type="password" id="passwordInput" placeholder="Nhập Mật Khẩu" name="password" required>
                            </div>
                            <?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ql_sach";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tk = $_POST["username"];
    $mk = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$tk' AND password='$mk'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION["username"] = $tk;
        header("Location:user_page.php?name=$tk");
    } else {
        echo "<p style='color:  white ; text-align : center ; font-size: 18px'>Đăng nhập không thành công. Vui lòng kiểm tra tài khoản và mật khẩu.<p>";
    }
}

// if (isset($_SESSION["username"])) {
//     header("Location: user_page.php");
//     exit();
// }

$conn->close();
?>
                                    

                        
    

                        

                            <div class="create-login">
                                <a href="../main/admin_login.php" class="forgot">Đăng Nhập Dành Cho Quản Lý</a>
                                <a href="../main/register.php" class="create">Đăng Ký?</a>
                                <a href="#" class="forgot">Quên Mật Khẩu?</a>
                            </div>
                            
                            <div class="account">
                                <input type="submit" name="btnlogin" value="Đăng Nhập" onclick="login()">
                                
                                      
                                
                            </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="footer">
        <div class="box-1">
            <h3>Email liên hệ: nhom12@gmail.com</h3>
            <a href="Đã có tài khoản">Chính sách sử dụng</a>
        </div>
        <div class="box-2">
            <a href="Đã có tài khoản"><img class="icon" src="../icon/fbicon.jpg" alt=""></a>
            <a href="Đã có tài khoản"><img class="icon" src="../icon/igicon.jpg" alt=""></a>
        </div>
    </div>
</body>
<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById('passwordInput');
        var eyeIcon = document.querySelector('.toggle-password');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    }
</script>

</html>