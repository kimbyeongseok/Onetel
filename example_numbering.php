<?php
$sql = 'select count(*) as cnt from board_free';

$result = $db->query($sql);

$row = $result->fetch_assoc();



$total_record = $row['cnt']; //전체 게시글의 수



$scale = 15; // 한 페이지에 보여줄 게시글의 수.

$total_page = ceil($allPost / $onePage); //전체 페이지의 수



if($page < 1 || ($allPage && $page > $allPage)) {

?>

<script>
alert("존재하지 않는 페이지입니다.");

history.back();
</script>

<?php

	exit;

}
$oneSection = 10; //한번에 보여줄 총 페이지 개수(1 ~ 10, 11 ~ 20 ...)

$currentSection = ceil($page / $oneSection); //현재 섹션

$allSection = ceil($allPage / $oneSection); //전체 섹션의 수



$firstPage = ($currentSection * $oneSection) - ($oneSection - 1); //현재 섹션의 처음 페이지



if($currentSection == $allSection) {

	$lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.

} else {

	$lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지

}



$prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.

$nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.



?>