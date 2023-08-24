<?php
$host="localhost";
$user="root";
$pw="";
$db="wp";

$conn=new mysqli($host,$user,$pw,$db);
if($conn->connect_error){
   echo "접속실패";
}
else {echo"접속 성공<br>";
    if (isset($_POST['userid'])) {
        $username=$_POST["userid"];
        $password=$_POST["userpw"];
        $sql = mysqli_query($conn, "SELECT EXISTS (SELECT * from user WHERE user_id='$username') as success");
        $member = $sql->fetch_assoc();
        if ($member['success']==1) {
            $_SESSION['id'] = $member["id"];
            echo "<script>alert('로그인 성공!'); location.href='./index.html';</script>";
        } 
        else {
            echo "아이디 또는 비밀번호를 확인하세요";
        }
    }
}

?>