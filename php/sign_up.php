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
    if (isset($_POST['useremail'])) {
        $useremail=$_POST["useremail"];
        $username=$_POST["userid"];
        $password=$_POST["userpw"];
        $password2=$_POST["userpw2"];
        
        if($password2==$password){
            echo "비밀번호 통과<br>";
            $sql = mysqli_query($conn, "SELECT EXISTS (SELECT * from user WHERE user_email='$useremail') as success");
            $useremailcount = $sql->fetch_assoc();
            if($useremailcount['success']==1) {
                echo "<script>alert('존재하는 이메일입니다.');history.back();</script>";
            }
            else{
                echo "이메일 통과<br>";
                $sql = mysqli_query($conn, "SELECT EXISTS (SELECT * from user WHERE user_id='$username') as success");
                $usernamecount = $sql->fetch_assoc();
                if($usernamecount['success']==1) {
                    echo "<script>alert('존재하는 아이디입니다.');history.back();</script>";
                }
                
                else{
                    $encrypted_password = password_hash( $password, PASSWORD_DEFAULT);
                    $sql="INSERT INTO user(user_email, user_id, user_pw) VALUES('$useremail','$username','$encrypted_password')";
                    if($conn->query($sql)){
                        session_start();
                        $_SESSION["userid"]=$username;
                        echo "<script>alert('회원가입 성공.'); location.href='../index_login.html' </script>";
                    }
                    else{
                        echo "erro";
                    
                    }
                }
            }
        }
        else{
            echo "<script>alert('비밀번호가 다릅니다.');history.back();</script>";
        }
    }
}

?>