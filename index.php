<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                        
                        <?php
                            include "config.php";

                            $limit=5;
                    
                            if(isset($_GET['page'])){
                                $page=$_GET['page'];
                            }else{
                                $page=1;
                            }
        
                            $offset= ($page-1)*$limit;

                            $q1="SELECT p.post_id, p.title, p.description, c.category_name, p.post_date, u.username, p.category, p.post_img, p.author 
                            from post p left join category c ON p.category=c.category_id
                            left join user u ON p.author=u.user_id
                            ORDER BY  p.post_id DESC LIMIT {$offset}, {$limit}";
                            
                            

                            $r1=mysqli_query($con, $q1) or die("Query failed.");

                            if(mysqli_num_rows($r1)>0){
                               while($r=mysqli_fetch_assoc($r1)){   

                        ?>

                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $r['post_id']; ?>"><img src="admin/upload/<?php echo $r['post_img']; ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $r['post_id']; ?>'><?php echo $r['title']; ?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?cid=<?php echo $r['category']; ?>'><?php echo $r['category_name']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php?aid=<?php echo $r['author']; ?>'><?php echo $r['username']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $r['post_date']; ?>
                                            </span>
                                        </div>
                                        <p class="description">
                                            <?php echo substr($r['description'],0, 150); ?>....
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $r['post_id']; ?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                            <?php
                               }//while loop ends

                            }//if ends
                            else{
                                echo "<h2>No Record Found.</h2>";
                            }

                            

                            ?>

                        <!-- </div> -->
                       
                        <?php
                        
                        
                            $q2="SELECT * FROM post";
                            $r2=mysqli_query($con,$q2) or die("Query Failed");

                            if(mysqli_num_rows($r2)>0){
                                $total_records=mysqli_num_rows($r2);
                            
                                $total_pages= ceil($total_records/$limit);
                            
                                echo '<ul class="pagination admin-pagination">';
                                
                                if($page>1){
                                    echo '<li><a href="index.php?page='.($page-1).'">Prev</a></li>';
                                }

                                for($i=1; $i<=$total_pages; $i++){
                                    
                                    if($i==$page){
                                        $active="active";
                                    }else{
                                        $active="";
                                    }
                                    
                                    echo ' <li class="'.$active.'"><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                                }

                                if($total_pages>$page){ 
                                    echo '<li><a href="index.php?page='.($page+1).'">Next</a></li>';
                                }
                                echo '</ul>';

                        
                            }
                        ?>
                        
                        
                        <!-- <ul class='pagination'>
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                        </ul> -->
                        
                    </div>
                    <!-- /post-container -->
                </div>
                    <?php include 'sidebar.php'; ?> 
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
