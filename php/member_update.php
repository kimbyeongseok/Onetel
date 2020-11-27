<meta charset="utf-8">

<?php
$num=$_GET['num'];
$level=$_POST['level'];
$point=$_POST['point'];

$con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
$sql="update member set level='$level', point='$point' where num=$num";
mysqli_query($con, $sql);
mysqli_close($con);

echo "
 <script>
    alert('수정 되었습니다.');
    location.href='../admin_form.php';
 </script>
";


?>
