<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sách</title>
    <link rel="stylesheet"  type="text/css" href="../css/edit_book.css">
    <link rel="stylesheet" type="text/css" href="headerAndFooter.css">
    <link rel="shorcut icon" href="../icon/bookicon.jpg">
</head>
<?php
$conn = mysqli_connect("127.0.0.1","root","","ql_sach") or die("Không kết nối được");
mysqli_set_charset($conn,"utf8");
$id=$_GET['id'];
$query = "SELECT * FROM `books` Where id='$id' ";
$result = mysqli_query($conn, $query)or die(mysqli_error($conn));
$deleted = false ;
$edited = false;

if($result){
    $deleted = true ;
}

if($result){
    $edited = false;
}


?>
<body style="background : url(../img/login_img.jpg)">
    <div id="header">
        <img class="logo" src="../icon/bookicon.jpg  "alt="a">
        <ul class="sub">
            <a class="login" href="">=====</a>

            <li class="child-sub">
                <a href="../main/admin_profile.php">Trang cá nhân</a>
            </li>
            <li class="child-sub">
                <a href="../main/admin_detail_book.php">Quản Lý Sách</a>
            </li>
            <li class="child-sub">
                <a href="../main/homepage.php">Đăng xuất</a>
            </li>


    </div>

    <div id="body">
        <div class="big_box">
        <div class="content">
            <h1>Sửa Sách</h1>

        </div>
        <div id="big_form">
                 <?php
               while($rows = mysqli_fetch_array($result)){
                ?>
        <form action="" method="post">
            <div class="small-form">
           
                <p>ID: <input type="text" name="id" value="<?php echo($rows["id"]) ?> "></p>
                <p>Tên Sách :<input type="text" name="name_book" value="<?php echo($rows["name_book"]) ?> "></p>
                <p>Tên Tác Giả : <input type="text" name="name_author" value="<?php echo($rows["name_author"]) ?> "></p>
                <p>Mô Tả :<input style="line-height: 100px;" type="text" name="mota" value="<?php echo($rows["info"]) ?> "></p>
                <p>Ảnh:<input type="file" name="img" value="<?php echo($rows["img"]) ?> "></p>
                <p>Giá : <input type="text" name="price" value="<?php echo($rows["prices"]) ?> " ></p>
                
                <p>Số Lượng :<input type="number " name="sl" value="<?php echo($rows["soluong"]) ?> " ></p>
            </div>
            <div class="btn_form">
                <button name="btn_edit" class="butt_edit"  >Chỉnh Sửa</button>
                <button name="btn_delete" class="butt_delete">Xóa</button>
            </div>
           

        </div>
            
     <?php
     if ( isset($_POST['btn_edit']) ) {
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
      if (!empty($tacgia) && strlen($tacgia) < 3) {
          $errors['tacgia'][] = [
              'rule' => 'minlength',
              'rule_value' => 3,
              'value' => $tacgia,
              'msg' => 'Mã phải có ít nhất 3 kí tự và không được để trống !!'
          ];
      }

      if (!empty($tacgia) && strlen($tacgia) > 50) {
          $errors['tacgia'][] = [
              'rule' => 'minlength',
              'rule_value' => 3,
              'value' => $tacgia,
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


      $sql = "UPDATE `books` SET `id`='$id',`name_book`='$name_book',`name_author`='$name_author',`soluong`='$sl',`prices`='$price',`img`='$img',`info`='$mota' WHERE `id`='$id'";
      $update = mysqli_query($conn, $sql)or die(mysqli_error($conn));
      
      
     

      if($update){
         echo '?><script> alert("Chỉnh Sửa Thành Công");</script>  <?php ';

        
        header("location:../main/admin_page.php"); 
       
      
     } else{
          echo "Chỉnh Sửa Thất Bại";
      }
    }

    else if(isset($_POST['btn_delete'])) {

        $id = $_POST['id'];
        $name_author = $_POST['name_author'];
        $name_book = $_POST['name_book'];
        $mota = $_POST['mota'];
        $img = $_POST['img'];
        $price = $_POST['price'];
        $sl = $_POST['sl'];

        $errors = [];

        $sql = "DELETE FROM `books` WHERE `id`='$id';";
        $delete = mysqli_query($conn, $sql)or die(mysqli_error($conn));
      
      
      header("location:admin_page.php");   

      if($update){
          echo "Xóa Thành Công Thành Công";
         
      }
      else{
          echo "Xóa Thất Bại";
      }
    }
        ?>
        
    
                    


            <?php
    }
            
                ?>
        </form>
        </div>

       


    </div>
</div>
</body>
</html>