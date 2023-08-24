<?php
$host = "localhost";
$user = "root";
$pw = "";
$db = "wp";

$conn = new mysqli($host, $user, $pw, $db);
if ($conn->connect_error) {
    echo "접속실패";
} else {
    echo "접속 성공<br>";
    if (isset($_POST['userid'])) {
        $username = $_POST["userid"];
        $password = $_POST["userpw"];
        $sql = mysqli_query($conn, "select * from user where user_id='$username'");
        $member = $sql->fetch_array();
        if ($member) {
            $hash_pwd = $member['user_pw'];
            $hash_pwd = substr($hash_pwd,0,99);
            if (password_verify( $password, $hash_pwd )) {
                echo "<script>alert('로그인 성공!');history.back();</script>";
            } 
            else {
                echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
            }
        } 
        else {
            echo "<script>alert('해당 아이디가 존재하지 않습니다.'); history.back();</script>";
        }
    }
}

?>