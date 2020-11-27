   <form name="community_delete" method="post" action="php/admin_community_delete.php">
       <?php
                $page=$_REQUEST["page"];
                if($page == ""){
                    $page=1;
                }
                $from = ($page-1)*8;

                $con=mysqli_connect("localhost", "tmxlraos","","tmxlraos");
                $sql="select * from community_board order by num desc limit $from, 8";
                $result=mysqli_query($con, $sql);
                $num_row=mysqli_num_rows($result);
                
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
            ?>
   </form>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?v=<?php echo time(); ?>"></script>
   <script type="text/javascript" src="js/custom.js?v=<?php echo time(); ?>"></script>
   <script type="text/javascript" src="js/admin.js?v=<?php echo time(); ?>"></script>
