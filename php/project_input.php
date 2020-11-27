<meta charset="utf-8">
<?php

$title=$_POST["title"];
$desc=$_POST["desc"];
$code=$_POST["code"];
$lan=$_POST["lan"];
$price=$_POST["price"];
$regist_day=date("Y-m-d(H:i)");
$desc=htmlspecialchars($desc, ENT_QUOTES);
$title=htmlspecialchars($title, ENT_QUOTES);

$upload_dir = '../images/';

$image_name=$_FILES["image"]["name"];
$image_tmp_name=$_FILES["image"]["tmp_name"];
$image_error=$_FILES["image"]["error"];

if($image_name && !$image_error){
  $uploaded_image_file=$upload_dir.$image_name;
  if(!move_uploaded_file($image_tmp_name, $uploaded_image_file)){
    echo "
      <script>
        alert('upload fail!!');
      </script>
    ";
    exit;
  }
} else {
  $image_name='';
}

$con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
$sql="insert into project (image, title, text, code, lan, price, regist_day) values('$image_name', '$title', '$desc', '$code', '$lan', '$price', '$regist_day')";
mysqli_query($con, $sql);

echo "
  <script>
    alert('입력 완료!!');
    location.href='../admin_form.php';
    </script>
";

?>
