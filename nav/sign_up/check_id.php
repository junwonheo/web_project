<?php
$host="localhost";
$user="root";
$pw="";
$dbname="webproject";
$conn=mysqli_connect($host,$user,$pw,$dbname) or die("can't access DB");

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $result=mysqli_query($conn,"select * from member where id='$id';");
    $row=mysqli_fetch_assoc($result);
    if($row){
        echo "아이디가 이미 있습니다.";
    }
    else{
        echo "<script>opener.document.getElementById('user_id').value='{$id}';window.close()</script>";
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
    <form method="GET">
        <input type="text" name="id">
        <input type="submit" value="중복확인">
    </form>
</body>
</html>