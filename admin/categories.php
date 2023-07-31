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
                        <div class="col-xs-6">
                        <?php
                        
                        insert_category();    
                            
                        ?>
                             <form action="" method="post">
                            <div class="form-group">
                               <label for="cat_titile">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                        <?php
                            //update and include
                           if(isset($_GET['edit'])) {
                               
                               $cat_id= $_GET['edit'];
                            include "in/update.php";
                           }
                           
                            ?>
                        
                
         
                        </div>
                        <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                               
                                <?php 
                                  
                         find_all_categories(); 
                                
                                ?>
                            
                                    
                            
                                </tr>
                                <?php 
                                delete_query(); 
                               ?>
                            </tbody>
                        </table>
                        
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 <?php include "in/adminfooter.php"; ?>
