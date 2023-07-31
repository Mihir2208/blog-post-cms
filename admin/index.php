<?php include "in/adminheader.php"; ?>

    <div id="wrapper">
       
       
        
       

        <!-- Navigation -->
        <?php include "in/adminnavigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to my Blogs!
                            <small> <?php echo $_SESSION['username']; ?> </small>
                        </h1>
                        <h1>
                          
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                
                       
                <!-- /.row --> 
                 
<div class="row"> 
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

<?php 

    $query = "select * from posts";
    $select_all_posts = mysqli_query($connection, $query);
    $post_count= mysqli_num_rows($select_all_posts);

 echo " <div class='huge'> {$post_count}</div> " ;

    ?>

                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php
                        
                        $query = "select * from comment";
                      $select_all_comments = mysqli_query($connection, $query);
                       $comment_count= mysqli_num_rows($select_all_comments);
                        
                        echo "<div class='huge'>{$comment_count}</div>" ; 
                        
                        ?>
                   
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comment.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php 
                        
                      $query = "select * from users";
                      $select_all_users = mysqli_query($connection, $query);
                      $user_count= mysqli_num_rows($select_all_users);
                        
                    echo "<div class='huge'>{$user_count}</div>" ;
                        
                        
                    ?>
                   
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                       
                        <?php 
                        
                      $query = "select * from categories";
                      $select_all_category = mysqli_query($connection, $query);
                      $category_count= mysqli_num_rows($select_all_category);
                        
                    echo "<div class='huge'>{$category_count}</div>" ;
                        
                        
                    ?>
                       
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href= "categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                <?php 
                
    $query = "select * from posts where post_status = 'published' ";
    $select_all_published_posts = mysqli_query($connection, $query);
    $published_post_count= mysqli_num_rows($select_all_published_posts);
                
    $query = "select * from posts where post_status = 'draft' ";
    $select_all_draft_posts = mysqli_query($connection, $query);
    $draft_post_count= mysqli_num_rows($select_all_draft_posts);

    $query = "select * from comment where comment_status = 'unapproved' ";
    $select_all_unapproved_comments = mysqli_query($connection, $query);
    $unapproved_comment_count= mysqli_num_rows($select_all_unapproved_comments);            
                
    $query = "select * from users where user_role = 'subscriber' ";
    $select_all_subscriber_users = mysqli_query($connection, $query);
    $subscriber_user_count= mysqli_num_rows($select_all_subscriber_users);           
                
            
                ?>
               
                   
                     <div class="row">
                    
                    
                     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            
            <?php
            
           $element_text = ['All Posts' , 'Published Posts', 'Draft Posts' , 'Comments', 'Unapproved Comments', 'Users' , 'Subscribers' , 'Categories'];
        $element_count = [$published_post_count, $post_count, $draft_post_count, $comment_count , $unapproved_comment_count , $user_count, $subscriber_user_count , $category_count ];
            
            
            for($i = 0; $i < 8; $i++) {
                
                
                echo "['{$element_text[$i]}'" . " , " . " {$element_count[$i]}],  " ;
                
                
            }
            
            
            
            ?>  
            
            
            
         
    /*  <?php echo " ['Comments',  $comment_count ], " ; ?>  */ 
            
       /*  <?php echo " ['Posts',  $post_count ] , " ; ?>  */
            
       /*  <?php echo " ['Users',  $user_count ] , " ; ?>  */
            
        /* <?php echo " ['Category',  $category_count ]  " ; ?>  */
            
        
            
        
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
          
              <div id="columnchart_material" style="width: 'auto' ; height: 500px;"></div>       
                    
                    
                    
                </div>
                
                
                
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 <?php include "in/adminfooter.php"; ?>
