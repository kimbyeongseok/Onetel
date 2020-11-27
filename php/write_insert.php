<meta charset="utf-8">
<?php
    session_start();
    if(isset($_SESSION["userid"])){
      $userid=$_SESSION["userid"];
    }else{
      $userid="";
    }
    $title=$_POST["title"];
    $content=$_POST["content"];
    $content=addslashes($content);

    
    $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
    $sql="insert into community_board(id,title,content,hits) values('$userid','$title','$content','0')";
    mysqli_query($con, $sql);

    $sql="select * from community_board order by num desc";
    $result = mysqli_query($con, $sql);

    $res = array();
    
    while($row=mysqli_fetch_array($result)){
        array_push($res, array(
            'id'=>$row["id"],
            'title'=>$row["title"],
            'content'=>$row["content"],
        ));
    }
    
    $sql="select * from member where id='$userid'";
    $point_res = mysqli_query($con, $sql);
    $point_row = mysqli_fetch_array($point_res);
    $point = $point_row["point"];
    $pointUp=$point + 100;
    $sql="update member set point=$pointUp where id='$userid'";
    mysqli_query($con, $sql);

    //json 파일 생성 및 데이터 json 인코딩
    file_put_contents("../data/community.json", json_encode($res, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE ));

    mysqli_close($con);

    echo "
     <script>
        alert('Uploaded!!');
        location.href='../community.php';
     </script>
    ";

?>
