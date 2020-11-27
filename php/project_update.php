<meta charset="utf-8">

<?php
$num=$_GET['num'];
$title=$_POST['title'];
$text=$_POST['text'];
$code=$_POST['code'];
$lan=$_POST['lan'];
$price=$_POST['price'];

$con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
$sql="update project set title='$title', text='".addslashes($text)."', code='$code', lan='$lan', price='$price' where num=$num";
mysqli_query($con, $sql);
mysqli_close($con);

echo "
 <script>
    alert('수정 되었습니다.');
    location.href='../admin_form.php';
 </script>
";


?>
