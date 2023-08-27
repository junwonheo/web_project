<?php
$host="localhost";
$user="root";
$pw="";
$dbname="webproject";
$conn=mysqli_connect($host,$user,$pw,$dbname) or die("can't access DB");

$email=$_POST['email'];
$user_id=$_POST['user_id'];
$user_pw=$_POST['user_pw'];
$user_pw2=$_POST['user_pw2'];

if ($user_pw != $user_pw2){
    echo "<script>alert('$user_pw,$user_pw2');history.back()</script>";
}

if(mysqli_query($conn,"insert into member values('$email','$user_id','$user_pw');")){
    echo "<script>alert('회원가입이 완료되었습니다.');</script>";
}
else{
    echo "<script>alert('회원가입에 실패했습니다');</script>";
}
?>