<?php
$host="localhost";
$user="root";
$pw="";
$dbname="webproject";
$conn=mysqli_connect($host,$user,$pw,$dbname) or die("can't access DB");

if(isset($_POST['user_email'])){
    $email=$_POST['user_email'];
    $user_id=$_POST['user_id'];
    $user_pw=$_POST['user_pw'];
    $user_pw2=$_POST['user_pw2'];
    if ($user_pw != $user_pw2){
        echo "<script>alert('$user_pw,$user_pw2');</script>";
    }
    
    if(mysqli_query($conn,"insert into member values('$email','$user_id','$user_pw');")){
        echo "<script>alert('회원가입이 완료되었습니다.');</script>";
    }
    else{
        echo "<script>alert('회원가입에 실패했습니다');history.back()</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <title>WebProgect</title>
        <link rel="stylesheet" href="/css/sign_up.css">
        <script>
            function check_id(){
                url="check_id.php";
                var option = "width = 500, height = 500, top = 100, left = 200, location = no";
                window.open(url,"아이디 중복 확인",option);
            }
            function check_email(){
                url="check_email.php";
                var option = "width = 500, height = 200, top = 100, left = 200, location = no";
                window.open(url,"email 인증",option);
            }
        </script>
    </head>
    <body>
        <form id="sign_up" method="post" action="<?=$_SERVER['PHP_SELF']?>">
            <ul>
                <h1>회원가입</h1>
                <li>
                    <label for="umail">이메일</label>
                    <input type="email" id="user_email" name="user_email" required readonly>
                    <input type="button" value="이메일 중복 확인" onclick="check_email()">
                </li>
                <li>
                    <label for="uid">아이디</label>
                    <input type="text" id="user_id" name="user_id" placeholder="3글자 이상 입력하세요." minlength="3" required readonly>
                    <input type="button" value="아이디 중복 확인" onclick="check_id()">
                </li>
                <li>
                    <label for="upw">비밀번호</label>
                    <input type="password" id="user_pw" name="user_pw" placeholder="(7~20)글자 입력하세요." minlength="7" maxlength="20" required>
                </li>
                <li>
                    <label for="upw2">비밀번호 확인</label>
                    <input type="password" id="user_pw2" name="user_pw2" required>
                </li>
            </ul>
            <div id="sign_up_button">
                <input type="submit" value="가입하기">
                <input type="reset" value="취소">
            </div>
        </form>
    </body>
</html>