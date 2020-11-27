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
        </section>
        <section class="admin_box">
            <div class="center">
                <div class="panel_box">
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
                            $member_select = $_POST['member_search_select'];
                            $member_input = $_POST['member_search_input'];


                            $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
                            
                            if($member_select == 'id'){
                                $sql="select * from member where id LIKE '%$member_input%' order by num desc";
                            } else {
                                $sql="select * from member where name LIKE '%$member_input%' order by num desc";
                            }

                            $result=mysqli_query($con, $sql);
                            $num_row=mysqli_num_rows($result);

                            if(!$num_row){
                                echo ' <li style="text-align:center; color:#fff; padding:15px 0;">데이터가 존재하지 않습니다. 검색 조건 및 검색어를 확인해주세요. <a href="admin_form.php">[돌아가기]</a></li>';
                               
                            }else{
                                while($row=mysqli_fetch_array($result)){
                                    $num=$row["num"];
                                    $id=$row["id"];
                                    $name=$row["name"];
                                    $pass=$row["pass"];
                                    $email=$row["email"];
                                    $regist_day=date("Y-m-d(H:i)");
                                    $level=$row["level"];
                                    $point=$row["point"];
                                
                        ?>
                        <ul class="member_list list clear">
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
                        }
                            ?>
                        <div class="back_button">
                            <a href="admin_form.php" class="community_btn">돌아가기</a>
                        </div>

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
