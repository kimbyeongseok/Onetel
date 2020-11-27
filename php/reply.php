<?php
    $content_num=$_GET["num"];
    $reply_content=$_POST["reply_content"];
    $reply_content=addslashes($reply_content);
    $reply_content=nl2br($reply_content);


    $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
    $sql="insert into reply(content_num, answer_content) values ('$content_num','$reply_content')";
    mysqli_query($con, $sql);

    echo"
        <script>
            alert('Reply Uploaded~!');
            location.href='../community.php';
        </script>
    "

?>
