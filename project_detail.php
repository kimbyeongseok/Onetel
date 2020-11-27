<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>OneTel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/project.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/project_detail.css?v=<?php echo time(); ?>">
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
        <section class="detail_section">
            <div class="center">
                <?php
                    $num=$_GET["num"];
                    $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
                    $sql="select * from project where num=$num";
                    $result=mysqli_query($con, $sql);
                    while($row=mysqli_fetch_array($result)){
                            $img=$row["image"];
                            $title=$row["title"];
                            $text=$row["text"];
                            $code=$row["code"];
                            $lan=$row["lan"];
                            $price=$row["price"];
                    ?>
                <div class="login_icon">
                    <i class="fa fa-sign-language" aria-hidden="true"></i>
                </div>
                <div class="sub_page_title">
                    <h2><?=$title?></h2>
                </div>
                <div class="detail_box clear">
                    <div class="detail_image">
                        <img src="images/<?=$img?>" alt="portfolio1">
                    </div>
                    <div class="detail_contents">
                        <div class="detail_title">
                            <h3><?=$title?></h3>
                        </div>
                        <div class="text_contents clear">
                            <div class="text_left">
                                <p>Code No.</p>
                                <p>Project Language</p>
                                <p>Project Info</p>
                            </div>
                            <div class="text_right">
                                <p><?=$code?></p>
                                <p><?=$lan?></p>
                                <P><?=$text?></P>
                            </div>
                        </div>
                        <div class="price clear">
                            <div class="price_left">
                                <p>Price</p>
                            </div>
                            <div class="price_right">
                                <p>&#8361; <?=$price?></p>
                            </div>
                        </div>
                        <div class="detail_btns clear">
                            <button type="button"><a href="#">BUY NOW</a></button>
                            <button type="button"><a href="#">ADD TO CART</a></button>
                            <button type="button"><a href="#">WISH LIST</a></button>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>

        </section>

        <?php include "include/footer.php" ?>



    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="js/custom.js?v=<?php echo time(); ?>"></script>
</body>

</html>
