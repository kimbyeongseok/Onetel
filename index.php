<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>OneTel</title>
    <!-- favicon link -->
    <link rel="icon" href="assets/img/favicon.png" />
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/media.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1">
</head>

<body>
    <div class="wrap">
        <?php include "include/header.php" ?>
        <section class="main_img"></section>
        <section class="site_info">
            <div class="center">
                <div class="boxes clear">
                    <div class="box box1">
                        <div>
                            <div class="icon">
                                <i class="fa fa-laptop" aria-hidden="true"></i>
                            </div>
                            <h2>Responsive</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has
                                been the industry's standard dummy text.</p>
                        </div>
                    </div>
                    <div class="box box2">
                        <div>
                            <div class="icon">
                                <i class="fa fa-mobile" aria-hidden="true"></i>
                            </div>
                            <h2>Easy to Use</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has
                                been the industry's standard dummy text.</p>
                        </div>
                    </div>
                    <div class="box box3">
                        <div>
                            <div class="icon">
                                <i class="fa fa-life-ring" aria-hidden="true"></i>
                            </div>
                            <h2>Quick Support</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has
                                been the industry's standard dummy text.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of site info -->

        <section class="about" id="about">
            <div class="center clear">
                <div class="company start_up_left"></div>
                <div class="company start_up_right">
                    <div class="about_txt">
                        <h2>Startup Business</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has
                            been the industry's standard dummy text. </p>
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly.</p>
                        <a href="#">LEARN MORE</a>
                    </div>

                </div>
            </div>

        </section><!-- end of about -->

        <section class="portfolio" id=portfolio>
            <div class="center">
                <div class="title_box clear">
                    <div class="txt_contents">
                        <h2 class="title">Recent Project</h2>
                        <p class="title_txt">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.Lorem
                            Ipsum has been the industry's standard dummy text.<br>In publishing and graphic design,
                            Lorem
                            ipsum is a placeholder text commonly used to demonstrate the visual form</p>
                    </div>
                    <div class="view_more">
                        <a href="project.php">VEIW MORE</a>
                    </div>
                </div>
                <div class="port_con_box clear">
                    <?php
                        $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
                        $sql="select * from project order by num desc limit 3";
                        $result=mysqli_query($con, $sql);
                        while($row=mysqli_fetch_array($result)){
                            $num=$row["num"];
                            $img=$row["image"];
                            $title=$row["title"];
                            $text=$row["text"];
                  ?>
                    <div class="port_con">
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
                <!-- end of port_con_box -->

            </div>
        </section><!-- end of portfolio -->
        <section class="gallery" id="gallery">
            <div class="center">
                <div class="title_box clear">
                    <div class="txt_contents">
                        <h2 class="title">Gallery</h2>
                        <p class="title_txt">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.Lorem
                            Ipsum has been the industry's standard dummy text.<br>In publishing and graphic design,
                            Lorem
                            ipsum is a placeholder text commonly used to demonstrate the visual form</p>
                    </div>
                    <div class="view_more">
                        <a href="gallery.php">Go to Gallery</a>
                    </div>
                </div>
                <div class="gallery_contents clear">
                    <?php
                        // $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
                        $sql="select * from gallery_items order by num desc limit 8";
                        $result=mysqli_query($con, $sql);
                        while($row=mysqli_fetch_array($result)){
                            $large_img=$row["large_img"];
                  ?>
                    <div class="gallery_view">
                        <div>
                            <img src="images/gallery/<?=$large_img?>" alt="">
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- end of gallery -->
        <section class="contact" id="contact_msg">
            <div class="center">
                <div class="title_box clear">
                    <div class="txt_contents">
                        <h2 class="title">Community</h2>
                        <p class="title_txt">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                    <div class="view_more">
                        <a href="community.php">Go to Community</a>
                    </div>

                </div>
                <!-- end of title box -->
                <div class="map_box">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27414.156194088!2d111.04506650126189!3d30.809096999999984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x368477b3750c94f5%3A0xacbcac6e2574b3ee!2sThree%20Gorges%20Dam%20Scenic%20Area!5e0!3m2!1sen!2skr!4v1595295832281!5m2!1sen!2skr"
                            width="100%" height="300"></iframe>
                    </div>
                </div>
                <div class="msg_box clear">
                    <form action="php/msg_insert.php" method="post" name="msg_form">
                        <p class="msg_name">
                            <input type="text" placeholder="Your Name" name="msg_name">
                        </p>
                        <p class="msg_email">
                            <input type="text" placeholder="Your E-mail" name="msg_email">
                        </p>
                        <p class="message">
                            <textarea placeholder="write here" name="message"></textarea>
                        </p>
                        <button type="submit" onclick="check_input()"> SUBMIT</button>
                    </form>
                </div>
            </div>
        </section>
        <?php include "include/footer.php" ?>

    </div>
    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="js/custom.js?v=<?php echo time(); ?>"></script>
    <script>
    function check_input() {
        if (!document.msg_form.msg_name.value) {
            alert("이름을 입력해 주세요.");
            document.msg_form.msg_name.focus();
            return;
        }
        if (!document.msg_form.msg_email.value) {
            alert("이메일을 입력해 주세요.");
            document.msg_form.msg_email.focus();
            return;
        }
        if (!document.msg_form.message.value) {
            alert("메세지를 입력해 주세요.");
            document.msg_form.message.focus();
            return;
        }
        document.msg_form.submit();
    }
    </script>
</body>

</html>
