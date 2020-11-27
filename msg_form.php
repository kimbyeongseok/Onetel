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
    <link rel="stylesheet" href="css/msg_form.css?v=<?php echo time(); ?>">

    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1">
</head>

<body>
    <div class="wrap">
        <?php include "include/sub_header.php" ?>
        <section class="msg_check">
            <div class="sub_img">
                <img src="images/Earth2.jpg" alt="">
                <div class="img_slogan">
                    <h2>Messages from Universe</h2>
                    <p>Explore creative ideas!!</p>
                </div>
            </div>
            <div class="center clear">

                <?php
                $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
                $sql="select * from msg_table order by num desc";
                $result=mysqli_query($con, $sql);
                while($row=mysqli_fetch_array($result)){
                    $num=$row["num"];
                    $name=$row["name"];
                    $email=$row["email"];
                    $message=$row["message"];
                    $regist_day=$row["regist_day"]
            
            ?>
                <div class="msg_check_box">
                    <p>Num : <?=$num?></p>
                    <p>Name : <?=$name?></p>
                    <p>E-mail : <?=$email?></p>
                    <p>Message : <?=$message?></p>
                    <p>Regist Day : <?=$regist_day?></p>
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
