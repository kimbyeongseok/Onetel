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
                <div class="board_table clear">
                    <ul class="board_list" id="board_list">

                    </ul>
                    <div class="numbering">
                        <span onclick="firstPage()">&#10094;&#10094;</span>
                        <span onclick="goToPrev()">&#10094;</span>
                        <?php
                        $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
                        $sql="select * from community_board order by num desc";
                        $result=mysqli_query($con, $sql);
                        $total_record = mysqli_num_rows($result);
                        $scale = 6;
                        if($total_record % $scale == 0){
                            $total_page = floor($total_record/$scale);
                        }else{
                            $total_page = floor($total_record/$scale) + 1;
                        }
                        for($i=1; $i<=$total_page; $i++){
                        ?>

                        <span class="page_number" onclick="get_page(<?=$i?>)"><?=$i?></span>

                        <?php
                        }
                        ?>
                        <span onclick="goToNext()">&#10095;</span>
                        <span onclick="lastPage()">&#10095;&#10095;</span>
                    </div>
                    <div class="community_board_btn clear">

                        <form class="search_box" method="post" name="search_box" action="search_result.php">
                            <select name="search_select" id="">
                                <option value="id">아이디</option>
                                <option value="title">제목</option>
                            </select>
                            <input type="text" name="search_input" placeholder="검색어를 입력해 주세요.">
                            <button type="button" onclick="check_input()"><i class="fa fa-search"></i></button>
                            <script>
                            function check_input() {
                                if (!document.search_box.search_input.value) {
                                    alert("U must write something!!");
                                    return;
                                }
                                document.search_box.submit();
                            }
                            </script>
                        </form>
                        <div>
                            <?php
                        if(!$userid){
                        ?>
                            <a href="#" class="community_btn" onclick="javascript:alert('로그인이 필요합니다.')">글쓰기</a>
                            <?php
                        }else{
                        ?>
                            <a href="write_form.php" class="community_btn">글쓰기</a>
                            <?php
                        }
                        ?>
                        </div>

                    </div>

                </div>

            </div>
        </section>
        <?php include "include/footer.php" ?>



    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="js/custom.js?v=<?php echo time(); ?>"></script>
    <script>
    var currentPage = 1;
    var url = "data/board_list_ajax.php";
    $.get(url, {
        page: 1
    }, function(args) {
        $("#board_list").html(args);
    });

    function get_page(no) {
        var url = "data/board_list_ajax.php";
        $(".page_number").removeClass("active");
        $(".page_number").eq(no - 1).addClass("active");
        $.get(url, {
            page: no
        }, function(args) {
            $("#board_list").html(args);
            currentPage = no;
        });
    };

    function goToNext() {
        console.log(pageNumber);
        var pageNumber = $(".page_number").length;
        if (currentPage === pageNumber) {
            get_page(pageNumber);
        } else {
            get_page(currentPage + 1);

        }
    }
    goToNext();

    function goToPrev() {
        if (currentPage === 1) {
            get_page(1);
        } else {
            get_page(currentPage - 1);
        }
    }

    function firstPage() {
        get_page(1);
    }

    function lastPage() {
        var pageNumber = $(".page_number").length;
        get_page(pageNumber);
    }
    $(".page_number").eq(0).trigger("click");
    </script>
</body>

</html>
