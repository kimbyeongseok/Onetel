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
    <link rel="stylesheet" href="css/admin.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="css/media.css?v=<?php echo time(); ?>">



    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1">
</head>

<body>
    <div class="wrap">
        <?php include "include/sub_header.php" ?>
        <?php
            // if(!$userid  $userlevel ! = 1 ){
            //     echo "<p>관리자 페이지 입니다. 권한이 있는 관리자만이 접근 가능합니다.</p>";
            // }else{
        ?>
        <section class="community_section">
            <div class="center">
                <div class="login_icon">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                </div>
                <div class="sub_page_title">
                    <h2>My Admin</h2>
                </div>
        </section>
        <section class="admin_box">
            <div class="center ">
                <div class="tab_box">
                    <button type="button" class="on">메세지 관리</button>
                    <button type="button">회원 관리</button>
                    <button type="button">상품 관리</button>
                    <button type="button" class="current">게시판 관리</button>
                </div>
                <div class="panel_box">
                    <!-- message section -->
                    <div class="panel msg_panel clear">
                        <ul class="msg_list title clear">
                            <li>Num</li>
                            <li>Name</li>
                            <li>E-mail</li>
                            <li>Message</li>
                            <li>Regist Day</li>
                            <li></li>
                        </ul>
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
                        <ul class="msg_list list clear">
                            <li><?=$num?></li>
                            <li><?=$name?></li>
                            <li><?=$email?></li>
                            <li id="txt_len">
                                <p><?=$message?></p>
                                <b><i class="fa fa-angle-down"></i></b>
                            </li>
                            <li><?=$regist_day?></li>
                            <li onclick="location.href='php/admin_msg_delete.php?num=<?=$num?>'">X</li>
                            <li class="slide_txt"><?=$message?></li>
                        </ul>

                        <?php
            }
            ?>
                        <form action="msg_search_form.php" name="msg_search" method="post" class="msg_search clear">
                            <select name="msg_search_select">
                                <option value="name">name</option>
                                <option value="message">msg</option>
                            </select>
                            <input type="text" name="msg_search_input">
                            <button type="button" onclick="check_input()"><i class="fa fa-search"></i></button>
                            <script>
                            function check_input() {
                                if (!document.msg_search.msg_search_input.value) {
                                    alert("U must write something!!");
                                    return;
                                }
                                document.msg_search.submit();
                            }
                            </script>

                        </form>
                    </div>
                    <!-- end of message section -->
                    <!-- member section -->
                    <div class="panel member_panel clear">
                        <ul class="member_list title clear">
                            <li>Num</li>
                            <li>ID</li>
                            <li>Name</li>
                            <li>Password</li>
                            <li>E-mail</li>
                            <li>Regist Day</li>
                            <li>Level</li>
                            <li>Point</li>
                            <li>수정</li>
                            <li>삭제</li>
                        </ul>
                        <?php
                $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
                $sql="select * from member order by num desc";
                $result=mysqli_query($con, $sql);
                while($row=mysqli_fetch_array($result)){
                    $num=$row["num"];
                    $id=$row["id"];
                    $name=$row["name"];
                    $pass=$row["pass"];
                    $email=$row["email"];
                    $regist_day=substr($row['regist_day'], 0, 10);
                    $level=$row["level"];
                    $point=$row["point"];
            
            ?>
                        <ul class="member_list clear">
                            <form action="php/member_update.php?num=<?=$num?>" method="post">
                                <li><?=$num?></li>
                                <li><?=$id?></li>
                                <li><?=$name?></li>
                                <li><?=$pass?></li>
                                <li><?=$email?></li>
                                <li><?=$regist_day?></li>
                                <li><input type="number" name="level" value="<?=$level?>"></li>
                                <li><input type="number" name="point" value="<?=$point?>"></li>
                                <li><button type="submit">수정</button></li>
                                <li><button type="button"
                                        onclick="location.href='php/admin_member_delete.php?num=<?=$num?>'">X</button>
                                </li>
                            </form>
                        </ul>
                        <?php
            }
            ?>
                        <form action="member_search_form.php" name="member_search" method="post">
                            <select name="member_search_select">
                                <option value="id">ID</option>
                                <option value="name">Name</option>
                            </select>
                            <input type="text" name="member_search_input">
                            <button type="button" onclick="member_check_input()"><i class="fa fa-search"></i></button>
                            <script>
                            function member_check_input() {
                                if (!document.member_search.member_search_input.value) {
                                    alert("U must write something!!");
                                    return;
                                }
                                document.member_search.submit();
                            }
                            </script>
                        </form>
                    </div>
                    <!-- end of member section -->
                    <!-- project section -->
                    <div class="panel project_panel">
                        <ul class="project_list title clear">
                            <li>Num</li>
                            <li>Image</li>
                            <li>Title</li>
                            <li>Text</li>
                            <li>Code</li>
                            <li>Lan</li>
                            <li>Price</li>
                            <li>수정</li>
                            <li>삭제</li>
                        </ul>
                        <?php
                $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
                $sql="select * from project order by num desc";
                $result=mysqli_query($con, $sql);
                while($row=mysqli_fetch_array($result)){
                    $num=$row["num"];
                    $image=$row["image"];
                    $title=$row["title"];
                    $text=$row["text"];
                    $code=$row["code"];
                    $lan=$row["lan"];;
                    $price=$row["price"];;
            
            ?>
                        <ul class="project_list clear">
                            <form action="php/admin_project_delete.php?num=<?=$num?>" method="post">
                                <li><?=$num?></li>
                                <li><img src="images/<?=$image?>" alt=""></li>
                                <li><input type="text" name="title" value="<?=$title?>"></li>
                                <li> <textarea name="text"><?=$text?></textarea></li>
                                <li><input type="text" name="code" value="<?=$code?>"></li>
                                <li><input type="text" name="lan" value="<?=$lan?>"></li>
                                <li><input type="text" name="price" value="$ <?=$price?>"></li>
                                <li><input type="submit" value="수정" formaction='
                                        php/project_update.php?num=<?=$num?>'></input>
                                </li>
                                <li><input type="submit" value="X"></input>
                                </li>
                            </form>
                        </ul>
                        <?php
            }
            ?>
                        <form action="project_search_form.php" name="project_search" method="post"
                            class="project_search clear">
                            <select name="project_search_select">
                                <option value="title">title</option>
                                <option value="text">text</option>
                                <option value="code">code</option>
                            </select>
                            <input type="text" name="project_search_input">
                            <button type="button" onclick="project_check_input()"><i class="fa fa-search"></i></button>
                            <script>
                            function project_check_input() {
                                if (!document.project_search.project_search_input.value) {
                                    alert("U must write something!!");
                                    return;
                                }
                                document.project_search.submit();
                            }
                            </script>
                            <button class="search_btn" type="button" onclick="location.href='project_input_form.php'"><i
                                    class="fa fa-upload"></i> Upload
                                Project</button>
                        </form>

                    </div>
                    <!-- end of project section -->
                    <!-- community section -->
                    <div class="panel board_panel board_table">
                        <ul class="board_list title clear">
                            <li>Check</li>
                            <li>Num</li>
                            <li>Id</li>
                            <li>Title</li>
                            <li>Content</li>
                            <li>Hits</li>
                        </ul>
                        <ul class="board_list list clear board_list_num">
                        </ul>
                        <div class="numbering">
                            <span onclick="firstPage()">&#10094;&#10094;</span>
                            <span onclick="goToPrev()">&#10094;</span>
                            <?php
                        $con=mysqli_connect("localhost", "tmxlraos","kbs1867628!","tmxlraos");
                        $sql="select * from community_board order by num desc";
                        $result=mysqli_query($con, $sql);
                        $total_record = mysqli_num_rows($result);
                        $scale = 8;
                        
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
                        <form action="community_search_form.php" name="community_search" method="get"
                            class="community_search clear">
                            <select name="community_search_select">
                                <option value="id">id</option>
                                <option value="title">title</option>
                                <option value="content">content</option>
                            </select>
                            <input type="text" name="community_search_input">
                            <button type="button" onclick="community_check_input()"><i
                                    class="fa fa-search"></i></button>
                            <script>
                            function community_check_input() {
                                if (!document.community_search.community_search_input.value) {
                                    alert("U must write something!!");
                                    return;
                                }
                                document.community_search.submit();
                            }
                            </script>

                        </form>
                        <button class="delete_btn" type="button" onclick="community_delete_input()">선택
                            삭제</button>
                        <script>
                        function community_delete_input() {
                            document.community_delete.submit();
                        };
                        </script>
                    </div>
                    <!-- end of community section -->
                </div>
            </div>
        </section>
        <!-- <?php
            // }
        ?> -->
        <?php include "include/footer.php" ?>



    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="js/custom.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="js/admin.js?v=<?php echo time(); ?>"></script>
    <script>
    var currentPage = 1;
    var url = "data/admin_community_list_ajax.php";
    $.get(url, {
        page: 1
    }, function(args) {
        $(".board_list_num").html(args);

    });

    function get_page(no) {
        var url = "data/admin_community_list_ajax.php";
        $(".page_number").removeClass("active");
        $(".page_number").eq(no - 1).addClass("active");
        $.get(url, {
            page: no
        }, function(args) {
            $(".board_list_num").html(args);
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
        $(".tab_box button.current").addClass("on");

    }
    $(".page_number").eq(0).trigger("click");


    $(document).ready(function() {
        $(".list #txt_len b").click(function() {
            $(this).toggleClass("on");
            if ($(this).hasClass("on")) {
                $(this).parent().siblings(".slide_txt").slideDown("fast");
                $(this).find("i").attr("class", "fa fa-angle-up");
            } else {
                $(this).parent().siblings(".slide_txt").slideUp("fast");
                $(this).find("i").attr("class", "fa fa-angle-down");
            }
        });
    });
    </script>
</body>

</html>
