<?php
    $title=$_POST['title'];
    $select=$_POST['category_select'];
    $upload_dir='../images/gallery/';
    $title=addslashes($title);

    //thumb img
    $thumb_name=$_FILES['thumb']['name'];
    $thumb_tmp_name=$_FILES['thumb']['tmp_name'];
    $thumb_error=$_FILES['thumb']['error'];
    //large img
    $large_name=$_FILES['large']['name'];
    $large_tmp_name=$_FILES['large']['tmp_name'];
    $large_error=$_FILES['large']['error'];

    if($thumb_name && !$thumb_error){
        $uploaded_thumb_file=$upload_dir.$thumb_name;
            if(!move_uploaded_file($thumb_tmp_name, $uploaded_thumb_file)){
                
                echo"
                <script>
                    alert('upload fail!!');
                </script>
                ";
                exit;
            }
    }
    if($large_name && !$large_error){
        $uploaded_large_file=$upload_dir.$large_name;
            if(!move_uploaded_file($large_tmp_name, $uploaded_large_file)){
                echo"
                <script>
                    alert('upload fail!!');
                </script>
                ";
                exit;
            }
    }
    
    $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
    $sql="insert into gallery_items(title,category,thumb_img,large_img) values('$title','$select','$thumb_name','$large_name')";
    mysqli_query($con, $sql);

    $sql="select * from gallery_items order by num desc";
    $result = mysqli_query($con, $sql);
    
    $res = array();

    while($row=mysqli_fetch_array($result)){
        array_push($res, array(
            'title'=>$row['title'],
            'category'=>$row['category'],
            'thumb'=>$row['thumb_img'],
            'large'=>$row['large_img']
        ));
            
    }
    //json 파일 생성 및 데이터 json 인코딩
    file_put_contents("../data/images.json", json_encode($res, JSON_PRETTY_PRINT));

    mysqli_close($con);

    echo "
    <script>
       alert('Image Uploaded!');
       location.href='../gallery.php';
    </script>
    ";


?>
