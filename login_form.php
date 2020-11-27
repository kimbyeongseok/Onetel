<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>OneTel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/media.css?v=<?php echo time(); ?>">


    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1">
</head>

<body>
    <div class="wrap">
        <?php include "include/sub_header.php" ?>
        <div class="sub_img">
            <img src="images/Earth2.jpg" alt="">
            <div class="img_slogan">
                <h2>Join Us</h2>
                <p>To Experience Creative World!!</p>
                <a href="join_form.php" class="join_btn">JOIN</a>
            </div>
        </div>
        <section class="login_section sub_section">
            <div class="login_icon">
                <i class="fa fa-grav" aria-hidden="true"></i>
            </div>
            <div class="sub_page_title">
                <h2>LOGIN</h2>
            </div>
            <div class="login_box">
                <form action="php/login.php" method="post" name="login_form">
                    <p class="input_id">
                        <input type="text" name="id" placeholder="Your ID">
                    </p>
                    <p class="input_pass">
                        <input type="password" name="pass" placeholder="Your Password">
                    </p>
                    <p class="login_btns clear">
                        <a href="#" onclick="login_submit()">LOGIN</a>
                        <a href="join_form.php">JOIN US</a>
                    </p>
                </form>
            </div>
        </section>
        <?php include "include/footer.php" ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <script>
    function login_submit() {
        document.login_form.submit();
    }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="js/custom.js?v=<?php echo time(); ?>"></script>
</body>

</html>