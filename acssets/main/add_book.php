<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sách</title>
    <link rel="stylesheet" type="text/css" href="../css/add_book.css">
    <link rel="stylesheet" type="text/css" href="../main/headerAndFooter.css">
</head>
<?php
$conn = mysqli_connect("127.0.0.1","root","","ql_sach") or die("Không kết nối được");
mysqli_set_charset($conn,"utf8");

$query = "SELECT * FROM `books`";
$result = mysqli_query($conn, $query)or die(mysqli_error($conn));
$add = false;

if ($result) {
    $add = true;
}
?>
<body style="background: url(../img/book_shop.jpg) ;">
  
 <div id="header">
        <img class="logo" src="../icon/bookicon.jpg  "alt="a">
        <ul class="sub">
            <a class="login" href="">=====</a>

            <li class="child-sub">
                <a href="../main/admin_profile.php">Trang cá nhân</a>
            </li>
            <li class="child-sub">
                <a href="../main/BuyForAdmin.php">Đơn Hàng</a>
            </li>
            <li class="child-sub">
                <a href="../main/homepage.php">Đăng xuất</a>
            </li>
        </ul>


    </div> 

    <div id="body">
        
        <div class="big_box" style=" height:fit-content  ; ">
           
        <div class="content">
            <h1>Thêm Sách</h1>
        
        </div>
        <div id="big_form">
            <div class="small-form">
        <form action="" method="post">
                <p>ID: <input type="text" name="id"></p>
                <p>Tên Sách :<input type="text" name="name_book"></p>
                <p>Tên Tác Giả : <input type="text" name="name_author"></p>
                <p>Mô Tả :<input type="" style="line-height: 100px;"; name="mota"></p>
                <p>Ảnh:<input type="file" name="img" ></p>
                <p>Giá : <input type="number" name="price"></p>
                <p>Số Lượng :<input type="number " name="sl"></p>
                <button name="btn_add" class="butt" >Thêm </button>
        </form>

            
        
        </div>
        
            
        </div>
           
            <?php
       
            if ( isset($_POST['btn_add']) ) {
                  $id = $_POST['id'];
                  $name_author = $_POST['name_author'];
                  $name_book = $_POST['name_book'];
                  $mota = $_POST['mota'];
                  $img = $_POST['img'];
                  $price = $_POST['price'];
                  $sl = $_POST['sl'];

                  $errors = [];

                  if (!empty($id) && strlen($id) < 3) {
                    $errors['id'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $id,
                        'msg' => 'Mã phải có ít nhất 3 kí tự và không được để trống !!'
                    ];
                }

                if (!empty($id) && strlen($id) > 50) {
                    $errors['id'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $id,
                        'msg' => 'Mã không được vượt quá 50 và không được để trống !!'
                    ];
                }
                if (!empty($name_author) && strlen($name_author) < 3) {
                    $errors['name_author'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $name_author,
                        'msg' => 'Mã phải có ít nhất 3 kí tự và không được để trống !!'
                    ];
                }

                if (!empty($name_author) && strlen($name_author) > 50) {
                    $errors['name_author'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $name_author,
                        'msg' => 'Mã không được vượt quá 50 và không được để trống !!'
                    ];
                }

                if (empty($name_book)) {
                    $errors['name_book'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $name_book,
                        'msg' => 'Vui lòng nhập tên sách'
                    ];
                }

                if (empty($mota)) {
                    $errors['mota'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $mota,
                        'msg' => 'Vui lòng nhập mô tả '
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
                if (empty($price)) {
                    $errors['price'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $price,
                        'msg' => 'Vui lòng nhập giá'
                    ];
                }
                if (empty($sl)) {
                    $errors['sl'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $sl,
                        'msg' => 'Vui lòng nhập số lượng'
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


                $sql = "INSERT INTO `books`(`id`, `name_book`, `name_author`, `soluong`, `prices`, `img`, `info`) VALUES ('$id','$name_book','$name_author','$sl','$price','$img','$mota')";
                $add = mysqli_query($conn, $sql)or die(mysqli_error($conn));
                
                
                header("location:admin_page.php");   

                if($add){
                    echo "Thêm Thành Công";
                }
                else{
                    echo "Thêm Thất Bại";
                }
                $_SESSION['giohang'] = array();
            ?>
        </div>
        <?php
            }
        

        ?>
       
        </div>
       


    
</div>
</body>
</html>