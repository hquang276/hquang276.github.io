<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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


$id = $_POST['id'];
$sql = "DELETE FROM `books` WHERE `id`='$id';";
$delete = mysqli_query($conn, $sql)or die(mysqli_error($conn));
      
      
      header("location:admin_page.php");   

?> 

<form action="post" >
<p>ID: <input type="text" name="id" value="<?php echo($rows["id"]) ?> "></p>

</form>
    
</body>
</html>