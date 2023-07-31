<?php 
 

if(isset($_POST['create_posts'])){
    
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    
    $post_image = $_FILES['post_image']['name'];
    $post_temp_img = $_FILES['post_image']['tmp_name'];
    
    $post_tags = $_POST['post_tags'];
    //$post_comment_count = 4;
    
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    
    move_uploaded_file($post_temp_img, "../images/$post_image");
    
$query= " insert into posts( post_category_id, post_title, post_author, post_date, post_image, post_content,  post_tags,  post_status ) " ; 
    
$query .= " values( {$post_category_id} ,'{$post_title}' , '{$post_author}' , now() ,  '{$post_image}','{$post_content}',  '{$post_tags}' ,  '{$post_status}') " ;

    
    $create_post_query= mysqli_query($connection, $query); 
check_query($create_post_query);
    
 $the_post_id = mysqli_insert_id($connection);    

echo "<p class = 'bg-success'>Post Added. <a href= '../post.php?p_id={$the_post_id}'>View Post</a> or <a href='posts.php?source=add_post'>Add More Posts</a> </p>" ; 
  
}
    




?>





<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="post_title">
</div>
    
<div class="form-group">
   
   <select name="post_category" id= "" >
       
       <?php 
       
       $query= "select * from categories ";
     $select_category = mysqli_query($connection, $query);
        
       check_query($select_category);
                                  
                  while($row= mysqli_fetch_assoc($select_category)){
                    $cat_id = $row['cat_id'];
                   $cat_title = $row['cat_title']; 
       
                   echo " <option value='$cat_id'>{$cat_title}</option> ";      }        
    
       ?>
       
       
       
       
   </select>
   
   
</div>
  
<div class="form-group">
    <label for="title">Post Author</label>
    <input type="text" class="form-control" name="post_author">
</div>
      
<div class="form-group">
    
    <select id="" name="post_status">
        
        <option value="draft">Post Status</option>
        <option value="published">Publish</option>
        <option value="draft">Draft</option>
        
    </select>
 
 </div>
   
<div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file"  name="post_image">
</div>
   
<div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
</div>
   
<div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="body" cols="30" rows="10">
    </textarea>
</div>
   
<div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_posts" value="Publish Post">
</div>
</form> 