<meta charset="utf-8">

<?php
    $name=$_POST["msg_name"];
    $email=$_POST["msg_email"];
    $message=$_POST["message"];
    $message=htmlspecialchars($message, ENT_QUOTES);
    $regist_day=date("Y-m-d(H:i)");


    
    $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
    $sql="insert into msg_table(name,email,message,regist_day) values('$name','$email','$message','$regist_day')";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
     <script>
        alert('메세지가 전송 되었습니다.');
        location.href='../index.php';
     </script>
    ";

?>
