<?php
  session_start();
  if(isset($_SESSION["userid"])){
    $userid=$_SESSION["userid"];
  }else{
    $userid="";
  }
  if(isset($_SESSION["userlevel"])){
    $userlevel=$_SESSION["userlevel"];
  }else{
    $userlevel="";
  }
?>
<div class="top_line" id="home">
    <div class="center">
        <div class="center">
            <div class="login_bar clear">
                <?php
                if(!$userid){
                ?>
                <!-- <a href="#">ADMIN</a> -->
                <a href="join_form.php">JOIN US</a>
                <a href="login_form.php">LOGIN</a>
                <?php
                }else{
                    if($userlevel==1){
                 ?>
                <a href="admin_form.php">ADMIN</a>
                <a href="#"><?=$userid?></a>
                <a href="php/logout.php">LOGOUT</a>
                <?php       
                    }else{
                ?>
                <a href="#"><?=$userid?></a>
                <a href="php/logout.php">LOGOUT</a>
                <?php
                    }
                }
                ?>
            </div>
        </div>
        <header>
            <h1 class="logo">
                <a href="index.php">
                    <i class="fa fa-globe" aria-hidden="true"></i>
                    <p>NETEL</p>
                </a>
            </h1>

            <ul class="gnb">
                <li class=""><a href="index.php" value="home">HOME</a></li>
                <li><a href="about.php" value="about">ABOUT US</a></li>
                <li><a href="project.php" value="portfolio">PROJECT</a></li>
                <li><a href="gallery.php" value="gallery">GALLERY</a></li>
                <li><a href="community.php" value="contact">COMMUNITY</a></li>
            </ul>

            <div class="nav_icon">
                <span></span>
                <span></span>
                <span></span>
            </div>

        </header>

    </div>

</div>
<!-- end of top line -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?php echo time(); ?>"></script>
<script>
$(document).ready(function() {
    var pathname = window.location.pathname;
    console.log(pathname);
    if (pathname == '/onetel/index.php') {
        $(".gnb li").eq(0).addClass("active");
    } else if (pathname == '/onetel/about.php') {
        $(".gnb li").eq(1).addClass("active");
    } else if (pathname == '/onetel/project.php') {
        $(".gnb li").eq(2).addClass("active");
    } else if (pathname == '/onetel/gallery.php') {
        $(".gnb li").eq(3).addClass("active");
    } else if (pathname == '/onetel/community.php') {
        $(".gnb li").eq(4).addClass("active");
    } else if (pathname == '/onetel/admin_form.php') {
        $(".login_bar a").eq(0).addClass("active");
    }

})
</script>