<?php
$host="localhost";
$user="root";
$pw="";
$dbname="webproject";
$conn=mysqli_connect($host,$user,$pw,$dbname) or die("can't access DB");

session_start();

if(isset($_POST['id'])&&isset($_POST['pw'])){
    $id=$_POST['id'];
    $pw=$_POST['pw'];
    $result=mysqli_query($conn,"select * from member where id = '$id' and pw = '$pw';");
if(mysqli_fetch_assoc($result)){
    $_SESSION['id']=$id;
    echo "<script>opener.location.reload();window.close();</script>";
}
else{
    echo "<script>alert('다시확인해주세요')</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>로그인</h1>
    <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
    <input type="text" placeholder="id" name='id'><br>
    <input type="password" placeholder="pw" name='pw'><br>
    <input type="submit" value="로그인">
    </form>
</body>
</html>