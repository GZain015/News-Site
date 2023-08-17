<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                          
                    <?php
                            include "config.php";

                           $pid=$_GET['id'];

                            $q1="SELECT p.post_id, p.title, p.description, c.category_name, p.post_date, u.username, p.category, p.post_img, p.author
                            from post p left join category c ON p.category=c.category_id
                            left join user u ON p.author=u.user_id where p.post_id={$pid}";
                            

                            $r1=mysqli_query($con, $q1) or die("Query failed.");

                            if(mysqli_num_rows($r1)>0){
                               while($r=mysqli_fetch_assoc($r1)){   

                        ?>
                        <div class="post-content single-post">
                            <h3><?php echo $r['title']; ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href="category.php?cid=<?php echo $r['category']; ?>"><?php echo $r['category_name']; ?></a>
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
                            <img class="single-feature-image" src="images/<?php echo $r['post_img']; ?>" alt="image"/>
                            <p class="description">
                                <?php echo $r['description']; ?>
                            </p>
                        </div>
                        <?php
                               }//while loop ends

                            }//if ends
                            else{
                                echo "<h2>No Record Found.</h2>";
                            }

                            

                            ?>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
