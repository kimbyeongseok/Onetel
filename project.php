<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>OneTel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/media.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">

    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1">
</head>

<body>
    <div class="wrap">
        <?php include "include/sub_header.php" ?>
        <div class="sub_img">
            <img src="images/Earth2.jpg" alt="">
            <div class="img_slogan">
                <h2>Wonderful Projects</h2>
                <p>Explore Our Creative World!!</p>
            </div>
        </div>
        <section class="project_section">
            <div class="center">
                <div class="login_icon">
                    <i class="fa fa-sign-language" aria-hidden="true"></i>
                </div>
                <div class="sub_page_title">
                    <h2>Our Projects</h2>
                </div>
                <!-- contents(Loop element) -->
                <div class="contents_box clear">
                    <?php
                        $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
                        $sql="select * from project order by num desc";
                        $result=mysqli_query($con, $sql);
                        while($row=mysqli_fetch_array($result)){
                            $num=$row["num"];
                            $img=$row["image"];
                            $title=$row["title"];
                            $text=$row["text"];
                    ?>
                    <div class="content">
                        <div>
                            <span>
                                <img src="images/<?=$img?>" alt="portfolio1">
                            </span>
                            <div class="con_txt">
                                <h3><?=$title?></h3>
                                <p><?=$text?></p>
                                <a href="project_detail.php?num=<?=$num?>">VIEW MORE <i class="fa fa-plus"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <!-- end of contents(Loop element) -->
                <div class="load_more">
                    <button type="button" class="more">Load More <b><i class="fa fa-plus"
                                aria-hidden="true"></i></button>
                    <button type="button" class="fold">fold <b><i class="fa fa-minus" aria-hidden="true"></i></button>
                </div>
            </div>

        </section>
        <?php include "include/footer.php" ?>



    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="js/custom.js?v=<?php echo time(); ?>"></script>
    <script></script>
</body>

</html>
