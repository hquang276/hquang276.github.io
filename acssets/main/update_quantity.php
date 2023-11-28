<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();

if (isset($_POST['id']) && isset($_POST['action'])) {
    $bookId = $_POST['id'];
    $action = $_POST['action'];


    // Tìm sản phẩm trong giỏ hàng
    foreach ($_SESSION['giohang'] as &$item) {
        if ($item[0] == $bookId) {
            if ($action == 'add') {
                // Tăng số lượng sản phẩm
                $item[5]++;
            } else if ($action == 'subtract' &&  $item[5] > 1) {
                // Giảm số lượng sản phẩm, nhưng không thể giảm dưới 1
                $item[5]--;
            }
            break;
        }
    }

    // Chuyển hướng đến trang giỏ hàng
    header("Location: cart.php");
    exit();
}
?>

</body>
</html>