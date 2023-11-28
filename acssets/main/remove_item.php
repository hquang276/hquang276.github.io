<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include_once("config.php");
session_start();
ob_start();
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];

    // Xóa sản phẩm có id tương ứng từ giỏ hàng
    foreach ($_SESSION['giohang'] as $key => $item) {
        if ($item[0] == $bookId) {
            unset($_SESSION['giohang'][$key]);
        }
    }
    $_SESSION['giohang'] = array_values($_SESSION['giohang']);

    header("Location: cart.php");
    exit();
}
?>
</body>
</html>