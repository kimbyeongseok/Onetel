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
        <section class="community_section">
            <div class="center">
                <div class="login_icon">
                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                </div>
                <div class="sub_page_title">
                    <h2>My Admin Search Result</h2>
                </div>
            </div>
        </section>
        <section class="admin_box">
            <div class="center">
                <div class="panel_box">
                    <div class="panel board_panel">
                        <ul class="board_list title clear">
                            <li>Check</li>
                            <li>Num</li>
                            <li>Id</li>
                            <li>Title</li>
                            <li>Content</li>
                            <li>Hits</li>
                        </ul>
                        <form name="community_delete" method="post" action="php/admin_community_delete.php">
                            <?php
                            $community_select = $_REQUEST['community_search_select'];
                            $community_input = $_REQUEST['community_search_input'];


                            $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
                            
                            if($community_select == 'id'){
                                $sql="select * from community_board where id LIKE '%$community_input%' order by num desc";
                            } else{
                                if($community_select == 'title'){
                                    $sql="select * from community_board where title LIKE '%$community_input%' order by num desc";
                                }else{
                                    $sql="select * from community_board where content LIKE '%$community_input%' order by num desc";
                                }
                            }
                            $result=mysqli_query($con, $sql);
                            $num_row=mysqli_num_rows($result);
                            if(!$num_row){
                                echo ' <li style="text-align:center; color:#fff; padding:15px 0;">데이터가 존재하지 않습니다. 검색 조건 및 검색어를 확인해주세요. <a href="admin_form.php">[돌아가기]</a></li>';
                               
                            }else{
                                while($row=mysqli_fetch_array($result)){
                                    $num=$row["num"];
                                    $id=$row["id"];
                                    $title=$row["title"];
                                    $content=$row["content"];
                                    $hits=$row["hits"];        
                                   
                        ?>
                            <ul class="board_list list clear">
                                <li><input type="checkbox" name="item[]" value="<?=$num?>"></li>
                                <li><?=$num?></li>
                                <li><?=$id?></li>
                                <li><?=$title?></li>
                                <li id="txt_len">
                                    <p><?=$content?></p>
                                    <b><i class="fa fa-angle-down"></i></b>
                                </li>
                                <li><?=$hits?></li>
                                <li class="slide_txt"><?=$content?></li>
                            </ul>
                            <?php
                            }
                        }
                        ?>
                        </form>

                        <div class="back_button">
                            <a href="admin_form.php" class="community_btn">돌아가기</a>
                        </div>
                        <button class="delete_btn" type="button" onclick="community_delete_input()">선택
                            삭제</button>
                        <script>
                        function community_delete_input() {
                            document.community_delete.submit();
                        }
                        </script>
                    </div>
                </div>
            </div>
        </section>
        <?php include "include/footer.php" ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="js/custom.js?v=<?php echo time(); ?>"></script>
    <script type="text/javascript" src="js/admin.js?v=<?php echo time(); ?>"></script>

</body>

</html>
