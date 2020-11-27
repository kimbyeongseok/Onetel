<li class="board_title clear">
    <span class="num">번호</span>
    <span class="tit">제목</span>
    <span class="id">아이디</span>
    <span class="hit">조회수</span>
</li>
<?php
                $page=$_REQUEST["page"];
                if($page == ""){
                    $page=1;
                }
                $from = ($page-1)*6;


                $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
                $sql="select * from community_board order by num desc limit $from, 6";
                $result=mysqli_query($con, $sql);
                while($row=mysqli_fetch_array($result)){
                    $num=$row["num"];
                    $id=$row["id"];
                    $title=$row["title"];
                    $content=$row["content"];
                    $hits=$row["hits"];

                 ?>
<li class="board_content clear">
    <span class="num"><?=$num?></span>

    <?php
            $sql="select * from reply where content_num='$num' order by num desc";
            $reply_res=mysqli_query($con, $sql);
            $reply_row=mysqli_fetch_array($reply_res);
            $reply_con=$reply_row["answer_content"];
            if(!$reply_row){
    ?>
    <span class="tit"><a id="txt_len" href="board_view.php?num=<?=$num?>"><?=$title?></a><br></span>
    <?php
            }else{
    ?>
    <span class="tit">
        <a id="txt_len" href="board_view.php?num=<?=$num?>"><?=$title?></a>
        <br>
        <b> [Replied : view]</b>
    </span>
    <?php    
            }
    ?>
    <span class="id"><?=$id?></span>
    <span class="hit"><?=$hits?></span>
    <?php
    if(!$reply_row){
    ?>
    <input type="hidden">
    <?php
    }else{
    ?>
    <span id="anwser">Reply : <?=$reply_con?></span>
    <?php
    }
    ?>
</li>
<?php
                }
                ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?php echo time(); ?>"></script>
<script>
$(document).ready(function() {
    $(".tit b").click(function() {
        $(this).toggleClass("on");
        if ($(this).hasClass("on")) {
            $(this).parent().siblings("#anwser").slideDown("slow");
            $(this).text("[Replied : close]")
        } else {
            $(this).parent().siblings("#anwser").slideUp("slow");
            $(this).text("[Replied : view]")
        }

    });
    //cutting long text
    var cuttingText = function() {
        var winWidth = $(window).width()
        for (var i = 0; i < $(".board_content").length; i++) {
            var txt_length = $(".board_content").eq(i).find("#txt_len").text();
            if (winWidth <= 800) {
                if (txt_length.length > 15) {
                    $(".board_content")
                        .eq(i)
                        .find("#txt_len")
                        .text(txt_length.substr(0, 15) + "...");
                }
            } else {
                txt_length;
            }

        }
    };
    cuttingText();
})
</script>
