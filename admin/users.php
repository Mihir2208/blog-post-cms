<?php include "in/adminheader.php"; ?>

   <?php 

  if(!is_admin($_SESSION['username'])){
      
      header("Location: index.php");
  }


?>
   
   
   
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
                                
                            case 'add_users';
                            include 'in/add_users.php';   
                            break;
                                
                            case 'edit_users';
                            include 'in/edit_users.php';
                            break;
                         
                            default:
                            include 'in/view_all_users.php';   
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
