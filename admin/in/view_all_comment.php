 <table class="table table-bordered table-hover">
                           <thead>
                              <tr>
                                <th>Id</th> 
                                <th>Author</th> 
                                <th>Comment</th> 
                                <th>Email</th> 
                                <th>Status</th>
                                <th>In Response to</th>  
                                <th>Date</th>  
                                <th>Approve</th> 
                                <th>Unapprove</th> 
                                <th>Delete</th>  
                             
                              </tr> 
                           
                           </thead> 
                              <tbody>
                              <?php
                               $query= 'select * from comment';
                                  global $connection; 
                               $select_comment= mysqli_query($connection, $query);
                                  
                                  while($row= mysqli_fetch_assoc($select_comment)){
                                    $comment_id = $row['comment_id'];
                                    $comment_post_id = $row['comment_post_id'];
                                    $comment_author = $row['comment_author'];
                                    $comment_content = $row['comment_content'];
                                    $comment_email = $row['comment_email'];
                                    $comment_status = $row['comment_status'];
                                    $comment_date = $row['comment_date'];
                                    
                                 echo "<tr>";
                                 echo"<td>$comment_id</td>";
                                 echo"<td>$comment_author</td>";
                                 echo"<td>$comment_content</td>";
                                      
                                /* $query= "select * from categories where cat_id =  $post_category_id "; 
                                 $select_category_id = mysqli_query($connection, $query);
                                  while($row = mysqli_fetch_assoc($select_category_id )) {
                                          $cat_id = $row['cat_id'];
                                          $cat_title = $row['cat_title'];
                                      
                                       echo"<td>$cat_title</td>"; 
                                   
                                
                                      } */
                                      
                                //echo"<td>$post_category_id</td>";
                                      
                                 echo"<td>$comment_email</td>";
                                 echo"<td>$comment_status</td>";
                                      
                                $query= "SELECT * from posts where post_id = $comment_post_id ";
                                $select_post_id_query= mysqli_query($connection, $query);
                                while($row= mysqli_fetch_assoc($select_post_id_query)) {
                                    
                                    $post_id= $row['post_id'];
                                    $post_title= $row['post_title'];
                                    
                                    
                                       echo"<td><a href='../post.php?p_id=$post_id'>$post_title </a>  </td>";
                                    
                                    
                                }
                                      
                                      
                             
                                      
                                      
                                      
                                      
                                      
                                      
                                 echo"<td>$comment_date </td>";
                                 
                                 
                                echo"<td><a href='comment.php?approved= $comment_id'>Approved</a></td>";
                                 echo"<td><a href='comment.php?unapproved=$comment_id '>Unapproved</a></td>";      
                                      
                                
                                 echo"<td><a onClick=\"javascript: return confirm('Are you sure you want to Delete this post?'); \" href='comment.php?delete= $comment_id'>Delete</a></td>";
                                 echo "</tr>";
                      
                                  }
                             ?>
                      
                        </tbody>
                       
                        </table>
                        
<?php 

if(isset($_GET['unapproved'])) {
     
    
     
  $the_comment_id= $_GET['unapproved'];
    
$query = "update comment set comment_status = 'unapproved' where comment_id = $the_comment_id  ";
  
$unapprove_comment_query= mysqli_query($connection, $query); 

    header("Location: comment.php ");
    
}

if(isset($_GET['approved'])) {
     
    
     
  $the_comment_id= $_GET['approved'];
    
$query = "update comment set comment_status = 'approved' where comment_id = $the_comment_id ";
  
$approve_comment_query= mysqli_query($connection, $query); 

    header("Location: comment.php ");
    
}




 if(isset($_GET['delete'])) {
     
    
     
  $the_comment_id= $_GET['delete'];
    
$query = "delete from comment where comment_id= {$the_comment_id} ";
  
$delete_query= mysqli_query($connection, $query); 
    
     header("Location: comment.php ");
 
 }


?>
                      