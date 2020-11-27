<meta charset=utf-8>
<?php
    $id=$_POST["id"];
    $pass=$_POST["pass"];
    $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
    $sql="select * from member where id='$id'";
    $result=mysqli_query($con, $sql);
    $num_match=mysqli_num_rows($result);
    if(!$num_match){
        echo"
        <script>
            window.alert('등록되지 않은 아이디 입니다.');
            history.go(-1);
        </script>
        ";
    }else{
        $row=mysqli_fetch_array($result);
        $db_pass=$row["pass"];
        if($pass != $db_pass){
            echo"<script>
                window.alert('비밀번호가 다릅니다.');
                history.go(-1);
            </script>";
            exit;
        }else{
            session_start();
            $_SESSION["userid"]=$row["id"];
            $_SESSION["userlevel"]=$row["level"];
            
            echo "
            <script>
                location.href='../index.php';
            </script>
            ";
        }
    }
?>
