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
                            <small>By PriyaVora</small>
                        </h1>
                       
                      <?php if(isset($_GET['source'])){
                        
                             $source= $_GET['source'];
                          
                            } else {
                              
                             $source= ''; 
    
}
                        switch($source){
                                
                            case 'add_post';
                            include 'in/add_posts.php';   
                            break;
                                
                            case 'edit_post';
                            include 'in/edit_posts.php';
                            break;
                         
                            default:
                            include 'in/view_all_comment.php';   
                            break;
                        }
                       
                       
                     ?>
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 <?php include "in/adminfooter.php"; ?>
