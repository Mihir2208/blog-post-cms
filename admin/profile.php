<?php include "in/adminheader.php"; ?>
    
   
<?php 
                        
  if(isset($_SESSION['username'])){
      
      $username = $_SESSION['username']; 
      
      $query= "select * from users where username = '{$username}' " ;
      
      $select_user_profile_query = mysqli_query($connection, $query);
      
      while($row = mysqli_fetch_array($select_user_profile_query) ) {
          
                  $user_id = $row['user_id'];
                  $username = $row['username'];
                  $user_password = $row['user_password'];
                  $user_firstname = $row['user_firstname'];
                  $user_lastname = $row['user_lastname'];
                  $user_email = $row['user_email'];
                  $user_image = $row['user_image'];
                  

      }
          
        if(!$select_user_profile_query) {
            
            die("Profile not Found" . mysqli_error($connection));
            
        }
 
  }
    
  ?>
    
    
    
    <?php 


if(isset($_POST['edit_users'])){
    
    
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
  
    
   /* $post_image = $_FILES['post_image']['name'];
    $post_temp_img = $_FILES['post_image']['tmp_name']; */
    
    $username = $_POST['username'];
    //$post_comment_count = 4;
    
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
   // $post_date = date('d-m-y');
    
   // move_uploaded_file($post_temp_img, "../images/$post_image");
    
$query = "update users set ";
    $query .= "user_firstname = '{$user_firstname}', "; 
    $query .= "user_lastname = '{$user_lastname}', "; 
    
   
    $query .= "username = '{$username}', "; 
    $query .= "user_email = '{$user_email}', "; 
    $query .= "user_password = '{$user_password}' ";
    $query .= "where username= '{$username}' ";
    
    $edit_user_profile_query = mysqli_query($connection, $query);
    
    check_query($edit_user_profile_query);
   
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
                    
 <form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="title">Firstname</label>
    <input type="text" value= "<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
</div>
    
    <div class="form-group">
    <label for="title">Lastname</label>
    <input type="text" value= "<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
</div>
    
    
   
      
  
<div class="form-group">
    <label for="title">Username</label>
    <input type="text" value= "<?php echo $username; ?>" class="form-control" name="username">
</div>
      
<div class="form-group">
    <label for="post_status">Email</label>
    <input type="email" value= "<?php echo $user_email; ?>" class="form-control" name="user_email">
 </div>
   
<!--<div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file"  name="post_image">
</div> -->
   
<div class="form-group">
    <label for="post_tags">Password</label>
    <input autocomplete="off" type="password"  class="form-control" name="user_password">
</div>
   
<!--<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
    </textarea>
</div> -->
   
<div class="form-group">
    <input class="btn btn-primary" type="submit" name="edit_users" value="Update Profile">
</div>
</form>                     
                      
                      
                      
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

 <?php include "in/adminfooter.php"; ?>
