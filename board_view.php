<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>OneTel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/community.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/media.css?v=<?php echo time(); ?>">


    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1">

</head>

<body>
    <div class="wrap">
        <?php include "include/sub_header.php" ?>
        <?php
        $num=$_GET["num"];
            $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
            $sql="select * from community_board where num=$num";
            $result=mysqli_query($con, $sql);
            $row=mysqli_fetch_array($result);

            $id=$row["id"];
            $title=$row["title"];
            $content=$row["content"];
            $hits=$row["hits"];
                        
            $content=str_replace("", "&nbsp", $content);
            $content=str_replace("\n", "<br>", $content);

            $new_hit = $hits + 1;
            $sql="update community_board set hits=$new_hit where num=$num";
            mysqli_query($con, $sql);
        ?>
        <div class="sub_img">
            <img src="images/contact-header.jpg" alt="">
            <div class="img_slogan">
                <h2>Visit Our Community</h2>
                <p>Explore Our Creative World!!</p>
            </div>
        </div>

        <section class="community_section">
            <div class="center">
                <div class="login_icon">
                    <i class="fa fa-sign-language" aria-hidden="true"></i>
                </div>
                <div class="sub_page_title">
                    <h2>Our community</h2>
                </div>
                <div class="board_table">
                    <div class="write_box">
                        <form action="php/write_insert.php" method="post" name="write_form" class="clear">
                            <p>
                                <label for="id">아이디</label>
                                <input type="text" id="id" value="<?=$id?>" name="id" readonly>
                            </p>
                            <p> <label for="title">제목</label>
                                <input type="text" id="title" value="<?=$title?> [조회수 : <?=$new_hit?>]" name="title"
                                    readonly>
                            </p>
                            <p>
                                <textarea id="content" name="content" readonly><?=$content?></textarea>
                            </p>
                        </form>
                        <div class="write_btn clear">
                            <?php
                            if($userlevel !=1){
                                echo "<input type='hidden'>";
                            }else{
                                echo '<a href="reply_form.php?num='.$num.'" class="community_btn">답글 달기</a>';
                            }
                            ?>
                            <a href="community.php" class="community_btn">돌아가기</a>
                        </div>
                    </div>


                </div>

            </div>
        </section>
        <?php include "include/footer.php" ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?php echo time(); ?>"></script>

    <script type="text/javascript" src="js/custom.js?v=<?php echo time(); ?>">
    </script>

</body>

</html>
