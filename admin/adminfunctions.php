<?php 

function escape($string){
    
    global $connection;
   return mysqli_real_escape_string($connection, trim($string));
    
}




function users_online(){
    
    global $connection; 
        $session = session_id();
        $time = time();
        $time_out_seconds = 40;
        $time_out= $time - $time_out_seconds;
        $query= "select * from users_online where session = '$session'";
        $send_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($send_query);
       
        
        if($count == NULL) {
            
     mysqli_query($connection, "insert into users_online(session, time) values('$session','$time')");
            
            
        } else {
            
     mysqli_query($connection, "update users_online set time='$time' where session = '$session'");
            
        }
        
    $users_online_query = mysqli_query($connection, "select * from users_online where time > '$time_out'");
    return $count_users_online = mysqli_num_rows($users_online_query);
    
    
    
    
    
    
    
    
}
  

  function check_query($result) {  
     
      global $connection;
      
      if(!$result) {
        
        die("failed" . mysqli_error($connection));
    } }
    
function insert_category() {
    
        global $connection; 
                          if(isset($_POST['submit']))  {
                           
                              $title= $_POST['cat_title'];
                              
                              if($title== "" || empty($title)){
                                  
                                  echo "This field cannot be empty"; 
                              } else {
                                  
                                  $query= "insert into categories(cat_title) ";
                                  $query.= "values('{$title}') ";
                                  
                                  $create_cat= mysqli_query($connection, $query);
                                  
                                  if(!$create_cat){
                                      
                                      die('FAILED' . mysqli_error($connection));
                                  }
                              }
                              
                              
                              
                              
                          }
}

function find_all_categories() {
     
    global $connection; 
    
        $query= 'select * from categories';
                               $select_category= mysqli_query($connection, $query);
                                  
                                  while($row= mysqli_fetch_assoc($select_category)){
                                    $cat_id = $row['cat_id'];
                                    $title = $row['cat_title'];
                                      
                                     echo "<tr>" ; 
                                     echo "<td>{$cat_id}</td>";
                                     echo "<td>{$title}</td>";
                                     echo "<td><a href= 'categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "<td><a href= 'categories.php?edit={$cat_id}'>Edit</a></td>";
                                      echo "</tr>" ;
                                       }
}
                                
function delete_query(){
    global $connection; 
                                 if(isset($_GET['delete'])){
                                    
                                    $c_id = $_GET['delete'];
                                    
                                    $query= "delete from categories where cat_id= {$c_id}" ;
                                    $delete_query = mysqli_query($connection, $query);
                                    
                                    header("location: categories.php");  } 
    
    
    
    
}


function is_admin($username = '') {
   global $connection;
    
    $query = "select user_role from users where username = '$username' ";
    $result = mysqli_query($connection, $query);
    check_query($result);
    $row = mysqli_fetch_array($result);
    
    if($row['user_role']=='admin'){
        
        return true;
    } else {
        
        return false;
    }
    
}


function username_exists($username){
    global $connection;
    $query = "select username from users where username = '$username' ";
    $result = mysqli_query($connection, $query);
    check_query($result);
    
    if(mysqli_num_rows($result) > 0){
        
        return true;
    } else{
        
        return false;
    }
    
    
}

function email_exists($email){
    global $connection;
    $query = "select user_email from users where user_email = '$email' ";
    $result = mysqli_query($connection, $query);
    check_query($result);
    
    if(mysqli_num_rows($result) > 0){
        
        return true;
    } else{
        
        return false;
    }
    
    
}

function register_user($username, $user_email, $user_password, $user_firstname, $user_lastname){
    
global $connection;
    $username = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
 
        
$username= mysqli_real_escape_string($connection,$username);
$user_email= mysqli_real_escape_string($connection,$user_email);
$user_password= mysqli_real_escape_string($connection, $user_password);
$user_firstname= mysqli_real_escape_string($connection, $user_firstname);
$user_firstname= mysqli_real_escape_string($connection, $user_firstname);
$user_lastname= mysqli_real_escape_string($connection, $user_lastname);

$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' =>10) );
        

$query = "insert into users (username, user_email, user_password, user_firstname, user_lastname, user_role) " ; 
$query .= "values('{$username}' , '{$user_email}' , '{$user_password}' , '{$user_firstname}', '{$user_lastname}','subscriber')"; 
    
$register_user = mysqli_query($connection , $query);
check_query($register_user);
        
 } 

    
    
 function login_user($username, $password)
  {
 
    global $connection;
 
    $username = trim($username);
 
    
    $password = trim($password);
 
 
 
    $username = mysqli_real_escape_string($connection, $username);
 
    $password = mysqli_real_escape_string($connection, $password);
 
 
 
    $query = "select * from users where username= '{$username}' ";
 
 
 
    $select_user_query = mysqli_query($connection, $query);
 
    check_query($select_user_query);
 
 
 
    while ($row = mysqli_fetch_array($select_user_query)) {
 
 
 
      $user_id = $row['user_id'];
 
      $user_name = $row['username'];
 
      $db_user_password = $row['user_password'];
 
      $user_firstname = $row['user_firstname'];
 
      $user_lastname = $row['user_lastname'];
 
      $user_role = $row['user_role'];
    }
 
 
 
    //$password = crypt($password, $db_user_password);
 
 
 
 
 
   
    if (password_verify($password, $db_user_password)) {
     
//      if (session_status() === PHP_SESSION_NONE) session_start();
 
      $_SESSION['username'] = $user_name;
 
      $_SESSION['user_firstname'] = $user_firstname;
 
      $_SESSION['user_lastname'] = $user_lastname;
 
      $_SESSION['user_role'] = $user_role;
 
 
      header("Location: in/add_posts.php");
   
    } else {
 
 
 
      header("Location: ../index.php");
    }
  }   
    














?>  