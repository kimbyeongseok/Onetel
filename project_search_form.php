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
                    <div class="panel project_panel clear">
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
                            $project_select = $_POST['project_search_select'];
                            $project_input = $_POST['project_search_input'];


                            $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
                            
                            if($project_select == 'title'){
                                $sql="select * from project where title LIKE '%$project_input%' order by num desc";
                            } else {
                                if($project_select == 'text'){
                                    $sql="select * from project where text LIKE '%$project_input%' order by num desc";
                                }else{
                                    $sql="select * from project where code LIKE '%$project_input%' order by num desc";
                                }  
                            }

                            $result=mysqli_query($con, $sql);
                            $num_row=mysqli_num_rows($result);

                            if(!$num_row){
                                echo ' <li style="text-align:center; color:#fff; padding:15px 0;">데이터가 존재하지 않습니다. 검색 조건 및 검색어를 확인해주세요. <a href="admin_form.php">[돌아가기]</a></li>';
                               
                            }else{
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
                                <li><input type="text" name="price" value="<?=$price?>"></li>
                                <li><input type="submit" value="수정" formaction='
                                        php/project_update.php?num=<?=$num?>'></input>
                                </li>
                                <li><input type="submit" value="X"></input>
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
