<?php 

if(isset($_GET['edit_users'])){
    
   $the_user_id = $_GET['edit_users']; 
    
     $query= "select * from users where user_id = $the_user_id ";
    

                                  global $connection; 
                               $select_users_query = mysqli_query($connection, $query);
                                  
                                  while($row= mysqli_fetch_assoc($select_users_query)){
                                    $user_id = $row['user_id'];
                                    $username = $row['username'];
                                    $user_password = $row['user_password'];
                                    $user_firstname = $row['user_firstname'];
                                    $user_lastname = $row['user_lastname'];
                                    $user_email = $row['user_email'];
                                    $user_image = $row['user_image'];
                                    $user_role = $row['user_role'];
                                  }

 

if(isset($_POST['edit_users'])){
    
    
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role= $_POST['user_role'];
    
   /* $post_image = $_FILES['post_image']['name'];
    $post_temp_img = $_FILES['post_image']['tmp_name']; */
    
    $username = $_POST['username'];
    //$post_comment_count = 4;
    
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
   // $post_date = date('d-m-y');
    
   // move_uploaded_file($post_temp_img, "../images/$post_image");
//    
//    $query = "select randSalt from users ";
//    $select_randSalt = mysqli_query($connection, $query);
//    
//    if(!$select_randSalt){
//        
//        die("FAILED" . mysqli_error($connection));
//    }
//    
//    $row = mysqli_fetch_assoc($select_randSalt);
//    $salt = $row['randSalt'];
//    $hash_password = crypt($user_password, $salt);
    
    if(!empty($user_password)){
        
        $query_password = "select user_password from users where user_id = $the_user_id ";
        $get_query= mysqli_query($connection , $query);
        check_query($get_query);
       $row = mysqli_fetch_array($get_query);
        
        $db_user_password = $row['user_password'];
        
    if($db_user_password != $user_password){
        
        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' =>10) );
    }
    $query = "update users set ";
    $query .= "user_firstname = '{$user_firstname}', "; 
    $query .= "user_lastname = '{$user_lastname}', "; 
    $query .= "user_role = '{$user_role}', "; 
    $query .= "username = '{$username}', "; 
    $query .= "user_email = '{$user_email}', "; 
    $query .= "user_password = '{$user_password}' ";
    $query .= "where user_id= {$the_user_id} ";
    
    $edit_user_query = mysqli_query($connection, $query);
    
    check_query($edit_user_query); 
        
    echo "<p>User Updated!. <a href = 'users.php'>View All Users</a> </p> ";
    }

    
    
   
}

} else {
    
    header("Location: index.php");
}
 

?>





<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="title">Firstname</label>
    <input type="text" value= "<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
</div>
    
    <div class="form-group">
    <label for="title">Lastname</label>
    <input type="text" value= "<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
</div>
    
    <select name="user_role" id= "" >
     <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?> </option>
    
    
    <?php
        
        if($user_role== 'admin') {
            
            echo "<option value='subscriber'>subscriber</option>" ;
            
            
        }  else {
            
           echo " <option value='admin'>admin</option> " ;
            
        }
        
        
        
        ?>
   
    
     
     </select>
  
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
    <input autocomplete="off" type="password" class="form-control" name="user_password">
</div>
   
<!--<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
    </textarea>
</div> -->
   
<div class="form-group">
    <input class="btn btn-primary" type="submit" name="edit_users" value="Update User">
</div>
</form>