<meta charset=utf-8>
<?php

    if(!isset($_POST['item'])){
        echo"
        <script>
            alert('삭제할 게시글을 선택해 주세요!');
            history.go(-1);
        </script>
        ";
    }
    $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
    for($i=0; $i<count($_POST['item']); $i++){
        $num=$_POST['item'][$i];
        $sql="delete from community_board where num=$num";
        mysqli_query($con, $sql);
    
    }
    mysqli_close($con);

    echo"
        <script>
            alert('삭제가 완료 되었습니다!!');
            location.href='../admin_form.php';
        </script>
    ";


?>
