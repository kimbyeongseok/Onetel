<meta charset=utf-8>
<?php
session_start();
if(isset($_SESSION["userid"])){
  $userid=$_SESSION["userid"];
}else{
  $userid="";
}
if(isset($_SESSION["userlevel"])){
  $userlevel=$_SESSION["userlevel"];
}else{
  $userlevel="";
}

if($userlevel !=1){
    echo"
        <script>
            alert('삭제는 관리자만 할 수 있습니다!!');
            history.go(-1);
        </script>
    ";
}else{
    $num=$_GET['num'];
    $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
    $sql="delete from member where num=$num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo"
        <script>
            alert('삭제가 완료 되었습니다!!');
            location.href='../admin_form.php';
        </script>
    ";

}

?>
