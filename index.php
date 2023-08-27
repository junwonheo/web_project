<?php
session_start();
if(isset($_SESSION['username'])){
    
}
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <title>WebProject</title>
        <link rel="stylesheet" href="css/index.css">
        <script> 
            function popup_sign_up(){
                var url="nav/sign_up/sign_up.html";
                var name = "회원가입";
                var option = "width = 500, height = 500, top = 100, left = 200, location = no";
                window.open(url,name,option);
            }
            function popup_find_id_pw(){
                var url="nav/find_id_pw.html";
                var name = "회원가입";
                var option = "width = 500, height = 500, top = 100, left = 200, location = no";
                window.open(url,name,option);
            }
        </script>
    </head>
    <body>
        <div id="first">
            <header> <!--게시판 목차-->
                <div class="header_b1">
                <a href="./index.html">
                <img src="img/logo.png">
                보안쟁이<br><h2>community</h2>
                </a>
                </div>
                <div class="header_b2">
                    <table>
                        <tr>
                            <td><a href="section/webhack.html">웹해킹</a></td>
                            <td><a href="section/reverse.html">리버싱</a></td>
                            <td><a href="section/pwn.html">포너블</a></td>
                            <td><a href="section/crypto.html">암호학</a></td>
                        </tr></table>
                </div>
            </header>
            
            <nav> <!--로그인-->
                <div class="nav_b1">
                    <p>로그인</p>
                    <form method="post" action="./nav/login.php">
                    <input id='user_id' type="text" placeholder="id">
                    <input id='user_pw'type="password" placeholder="pw">
                    <input type="submit" value="로그인" id="login"><br>
                    </form>
                    <!--회원가입-->
                    <button onclick="popup_sign_up()">회원가입</button>
                    <button onclick="popup_find_id_pw()">아이디/비밀번호 찾기</button>
                </div>
                <div class="nav_b2">
                    <p><a href="nav/writing.html">내가 쓴 글</a></p>
                    <p><a href="nav/comment.html">댓글 단 글</a></p>
                    <p><a href="nav/user_script.html">내 스크랩</a></p>
                </div>
            </nav>

            <section><!--내용-->
                <div class="secion_b1">
                    <a href="section/webhack.html">웹해킹 게시판</a>
                </div>
                <div class="secion_b2">
                    <a href="section/reverse.html">리버싱 게시판</a>
                </div>
                <div class="secion_b3">
                    <a href="section/pwn.html">포너블 게시판</a>
                </div>
                <div class="secion_b4">
                    <a href="section/crypto.html">암호학 게시판</a>
                </div>
            </section>

            <aside><!--검색-->
                <div class="aside_b1">
                    <p>검색</p>
                    <input type="text">
                    <input type="button" onclick="location.href='./aside/search.html'" value="검색">
                </div>
                <div class="aside_b2">
                    <p><a href="./aside/hot_contents.html" style="text-decoration: none; color: black;">HOT 게시물</a></p>
                </div>
                <div class="aside_b3">
                    <p><a href="./aside/recent_contents.html" style="text-decoration: none; color: black;">최근 게시물</a></p>
                </div>
            </aside>
        </div>
    </body>
</html>