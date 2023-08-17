<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    include "config.php";

                    if(isset($_GET['cid'])){
                       $cid=$_GET['cid']; 
                    }

                    $q1="SELECT * from category where post > 0 Order by category_name ";
                    $r1=mysqli_query($con, $q1) or die("Query failed : category"); 
                    if(mysqli_num_rows($r1)>0){
                ?>
                <ul class='menu'>
                    <li><a href='<?php echo $host; ?>'>Home</a></li>
                    <?php 
                        $Selected="";
                        while($r=mysqli_fetch_assoc($r1)){
                            if(isset($_GET['cid'])){
                                if($r['category_id']==$cid){
                                    $Selected="active";
                                }else{
                                    $Selected="";
                                }
                            }
                            
                            echo "<li><a class='{$Selected}' href='category.php?cid={$r['category_id']}'>{$r['category_name']}</a></li>";
                   
                        }//while ends  
                    ?>
                   
                </ul>
               
                <?php    }//if ends  ?>
           
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
