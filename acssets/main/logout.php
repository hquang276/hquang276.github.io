<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
                class Logout {
                    public function __construct()
                    {
                        unset($_SESSION['username']); // xóa session user đã tạo khi đăng nhập
                        header('Location: ../main/login.php'); // chuyển hướng về trang chủ
                        exit();
                    }
                }
                $logout = new Logout();
                ?>