<?php
$host="localhost";
$user="root";
$pw="";
$dbname="webproject";
$conn=mysqli_connect($host,$user,$pw,$dbname) or die("can't access DB");

if(isset($_GET['email'])){
    $email=$_GET['email'];
    $result=mysqli_query($conn,"select * from member where email='$email';");
    $row=mysqli_fetch_assoc($result);
    if($row){
        echo "이메일이 이미 있습니다.";
    }
    else{
        echo "<script>opener.document.getElementById('user_email').value='{$email}';window.close();</script>";
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
        <input type="email" name="email">
        <input type="submit" value="중복확인">
    </form>
</body>
</html>