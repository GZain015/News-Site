<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        
        <?php
            include "config.php";

            $limit=5;

            $q1="SELECT p.post_id, p.title, c.category_name, p.post_date, p.category, p.post_img 
            from post p left join category c ON p.category=c.category_id
            ORDER BY p.post_id DESC LIMIT {$limit}";

            $r1=mysqli_query($con, $q1) or die("Query failed : Recent Post");

            if(mysqli_num_rows($r1)>0){
            while($r=mysqli_fetch_assoc($r1)){   

        ?>

        <div class="recent-post">
            <a class="post-img" href="single.php?id=<?php echo $r['post_id']; ?>"><img src="admin/upload/<?php echo $r['post_img']; ?>" alt="image"/></a>
            <div class="post-content">
                <h5><a href='single.php?id=<?php echo $r['post_id']; ?>'><?php echo $r['title']; ?></a></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php?cid=<?php echo $r['category']; ?>'><?php echo $r['category_name']; ?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $r['post_date']; ?>
                </span>
                <a class='read-more pull-right' href='single.php?id=<?php echo $r['post_id']; ?>'>read more</a>
            </div>
        </div>

        <?php 
            }
        }

        ?>
    </div>
    <!-- /recent posts box -->
</div>
