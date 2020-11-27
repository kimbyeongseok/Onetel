<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>OneTel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/join.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/media.css?v=<?php echo time(); ?>">


    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1">
</head>

<body>
    <div class="wrap">
        <?php include "include/sub_header.php" ?>

        <div class="sub_img">
            <img src="images/home-bg.jpg" alt="">
            <div class="img_slogan">
                <h2>Welcome!</h2>
                <p>To Be Our Passionate Members.</p>
            </div>
        </div>

        <section class="join_section sub_section">
            <div class="sub_page_title">
                <div class="login_icon">
                    <i class="fa fa-rocket" aria-hidden="true"></i>
                </div>
                <h2>JOIN US</h2>
            </div>
            <div class="join_box">
                <form action="php/insert_member.php" method="post" name="member_form">
                    <p class="clear input_box">
                        <span class="col_con">ID</span>
                        <input type="text" name="id" class="col_con" placeholder="your ID" id="id_check">
                        <button type="button" name="button" id="check" class="col_con" onclick="checkID()"><i
                                class="fa fa-check-circle" aria-hidden="true"></i></button>
                    </p>
                    <p class="clear name_box">
                        <span class="col_con">NAME</span>
                        <input type="text" name="name" class="col_con" placeholder="your name">

                    </p>
                    <p class="clear pass_box">
                        <span class="col_con">PW</span>
                        <input type="text" name="pass" class="col_con" placeholder="your password">
                    </p>
                    <p class="clear pass_check_box">
                        <span class="col_con">PW-<i class="fa fa-check-circle" aria-hidden="true"></i></span>
                        <input type="text" name="pass_check" class="col_con" placeholder="check your password">

                    </p>
                    <p class="clear email_box">
                        <span class="col_con">E-MAIL</span>
                        <input type="text" name="email1" class="col_con" placeholder="your e-mail id">
                        <span class="col_con">@</span>
                        <input type="text" name="email2" class="col_con" placeholder="your e-mail site">
                    </p>
                    <div class="join_btns clear">
                        <button type="button" onclick="check_input()">SEND</button>
                        <button type="button" onclick="reset_form()">RESET</button>
                    </div>
                </form>
            </div>
        </section>

        <?php include "include/footer.php" ?>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="js/custom.js?v=<?php echo time(); ?>"></script>
    <script>
    var check_count = 0;

    function checkID() {
        check_count++;
        // console.log(check_count);
    }

    function check_input() {
        if (!document.member_form.id.value) {
            alert("아이디를 입력해주세요!");
            document.member_form.id.focus();
            return;
        }
        if (!document.member_form.name.value) {
            alert("이름을 입력해주세요!");
            document.member_form.name.focus();
            return;
        }
        if (!document.member_form.pass.value) {
            alert("비밀번호를 입력해주세요!");
            document.member_form.pass.focus();
            return;
        }
        if (!document.member_form.pass_check.value) {
            alert("비밀번호를 확인을 입력 해주세요!");
            document.member_form.pass_check.focus();
            return;
        }
        if (document.member_form.pass.value != document.member_form.pass_check.value) {
            alert("비밀번호가 일치하지 않습니다. \n다시 입력해 주세요!");
            document.member_form.pass_check.value = "";
            document.member_form.pass_check.focus();
            return;
        }

        if (!document.member_form.email1.value) {
            alert("이메일를 입력해주세요!");
            document.member_form.email1.focus();
            return;
        }
        if (!document.member_form.email2.value) {
            alert("이메일를 입력해주세요!");
            document.member_form.email2.focus();
            return;
        }
        if (check_count == 0) {
            alert("아이디 중복체크를 눌러 주세요!")
        } else {
            document.member_form.submit();
        }

    }

    function reset_form() {
        document.member_form.id.value = "";
        document.member_form.name.value = "";
        document.member_form.pass.value = "";
        document.member_form.pass_check.value = "";
        document.member_form.email1.value = "";
        document.member_form.email2.value = "";
        document.member_form.id.value.focus();
        return;
    }
    </script>
    <script>
    $(document).ready(function() {
        $("#check").click(function() {
            var url = "php/member_check_id.php?id=" + $("#id_check").val();
            $.get(url, function(args) {
                alert(args);
            });
        });
    });
    </script>
</body>

</html>