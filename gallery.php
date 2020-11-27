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
    <link rel="stylesheet" href="css/gallery.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/venobox.min.css?v=<?php echo time(); ?>">



    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1">
</head>

<body>
    <div class="wrap">
        <?php include "include/sub_header.php" ?>
        <div class="sub_img">
            <img src="images/contact-header.jpg" alt="">
            <div class="img_slogan">
                <h2>Creative Editorial Pictures</h2>
                <p>Explore Our Creative World!!</p>
            </div>
        </div>
        <section class="gallery_section sub_section">

            <div class="center">
                <div class="login_icon">
                    <i class="fa fa-sign-language" aria-hidden="true"></i>
                </div>
                <div class="sub_page_title">
                    <h2>Our Pictures</h2>
                </div>
                <div class="filtering">
                    <button type="button" class="on" data-filter="all">All</button>
                    <button type="button" data-filter="people">People</button>
                    <button type="button" data-filter="animals">Animals</button>
                    <button type="button" data-filter="nature">Nature</button>
                    <button type="button" data-filter="plantes">Plantes</button>
                    <button type="button" data-filter="architects">Architects</button>
                </div>
                <div class="gallery_box">
                    <div class="grid-sizer"></div>

                </div>
                <div class="gallery_btns">
                    <button id="load_more">Load More</button>
                    <?php
                    if(!$userid){
                        echo(
                        "<button type='button'><a href='login_form.php' onclick='plzLog()'>Upload Image</a></button>"
                        );
                    } else {
                        echo(
                        "<button type='button'><a href='upload_gallery.php'>Upload Image</a></button>"   
                        );
                    }
                    ?>
                </div>
            </div>

        </section>

        <?php include "include/footer.php" ?>



    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?php echo time(); ?>"></script>
    <script src="js/venobox.min.js?v=<?php echo time(); ?>"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="js/custom.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="js/gallery.js?v=<?php echo time(); ?>"></script>
    <!-- <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script> -->
    <script>
    function plzLog() {
        alert("Without Login, nothing to do! So I move your page to login page!!!")
    }
    </script>



</body>

</html>