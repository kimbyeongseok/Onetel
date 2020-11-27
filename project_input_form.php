<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Project Upload</title>
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
                    <h2>Upload Project</h2>
                </div>
        </section>
        <section class="admin_box">
            <div class="center ">
                <div class="panel_box">
                    <div class="panel project_panel">
                        <ul class="project_list upload title clear">
                            <li>Image</li>
                            <li>Title</li>
                            <li>Text</li>
                            <li>Code</li>
                            <li>Lan</li>
                            <li>Price</li>
                            <li></li>
                        </ul>

                        <ul class="project_list upload clear">
                            <form action="php/project_input.php" method="post" name="project_data"
                                enctype="multipart/form-data">
                                <li>
                                    <div class="upload_right">
                                        <div class="image_box clear">
                                            <input class="upload_name" value="file name">
                                            <label for="large_img">File Upload</label>
                                            <input type="file" id="large_img" class="upload_hidden" name="image"
                                                accept='image/*'>
                                        </div>
                                        <div class="large_box wrap_box">
                                            <img id="img2">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <input type="text" name="title">
                                </li>
                                <li>
                                    <textarea name="desc"></textarea>
                                </li>
                                <li>
                                    <input type="text" name="code">
                                </li>
                                <li>
                                    <input type="text" name="lan">
                                </li>
                                <li>
                                    <input type="text" name="price">
                                </li>
                                <li><input type="submit" value="Upload"></input>
                                </li>
                            </form>
                        </ul>
                        <div class="back_button">
                            <a href="admin_form.php" class="community_btn">돌아가기</a>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <?php include "include/footer.php" ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?php echo time(); ?>">
        </script>
        <script type="text/javascript" src="js/custom.js?v=<?php echo time(); ?>"></script>
        <script type="text/javascript" src="js/admin.js?v=<?php echo time(); ?>"></script>
        <script>
        $(document).ready(function() {
            var imageUpload = function() {
                var fileTarget = $(".image_box .upload_hidden");
                fileTarget.on("change", function() {
                    //값이 변경될 경우
                    if (window.FileReader) {
                        var filename = $(this)[0].files[0].name;
                        //파일 이름 추출하여 filename 에 저장
                    } else {
                        var filename = $(this).val().split('/').pop().split('//').pop();
                    }
                    $(this).siblings(".upload_name").val(filename);
                    console.log(filename);
                });
                $("#large_img").on("change", largeFileSelect)
            };
            imageUpload();
        });
        var largeFileSelect = function(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('img2');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        };
        </script>
</body>

</html>



<!-- <form action="php/project_input.php" method="post" name="project_data" enctype="multipart/form-data">
            <li>
                이미지 경로 : <input type="file" name="image">
            </li>
            <li>
                제목 : <input type="text" name="title">
            </li>
            <li>
                설명 : <textarea name="desc"></textarea>
            </li>
            <li>
                코드 : <input type="text" name="code">
            </li>
            <li>
                언어 : <input type="text" name="lan">
            </li>
            <li>
                가격 : <input type="text" name="price">
            </li>
            <button type="submit">올리기</button>
            <button type="button" onclick="location.href='admin_form.php'">돌아가기</button>
        </form> -->