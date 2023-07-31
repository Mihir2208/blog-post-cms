<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 <?php include "admin/adminfunctions.php"; ?>
 
 
 <?php 
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST['username']);
    $user_email = trim($_POST['email']);
    $user_password = trim($_POST['password']);
    $user_firstname = trim($_POST['user_firstname']);
    $user_lastname = trim($_POST['user_lastname']);
 
    $error =[
        
        'username'=> '',
        'user_email'=> '',
        'user_password'=> ''
       ];
    
    if(strlen($username)<3){
        
        $error['username'] = 'Username should be greater than 3 letter';
    }
    
     if($username == ''){
        
        $error['username'] = 'Username cannot be empty';
    }
    
     if(username_exists($username)){
        
        $error['username'] = 'Username has already been taken';
    }
    
    if($user_email == ''){
        
        $error['user_email'] = 'Email cannot be empty';
    }
    
    if(email_exists($user_email)){
        
        $error['user_email'] = 'Email already exists <a href="index.php">Click here to Login</a>';
    }
    
    if($user_password == ''){
        
        $error['user_password'] = 'Password cannot be empty';
    }
    
    foreach($error as $key=> $value) {
        
        if(empty($value)){
            
           unset($error[$key]);

        }
    }
    
    if(empty($error)){
        
         register_user($username, $user_email, $user_password, $user_firstname, $user_lastname);
         login_user($username, $password);
    }
}





?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                      
                        <div class="form-group">
                             <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control"  placeholder="Enter Desired Username" autocomplete="on"
                            value="<?php echo isset($username) ? $username: '' ?>">
                            <p><?php echo isset($error['username']) ? $error['username']: '' ?></p>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="sr-only">Firstname</label>
                            <input type="text" name="user_firstname" id="user_firtsname" class="form-control" placeholder="Enter Firstname"
                            autocomplete="on"
                            value="<?php echo isset($user_firstname) ? $user_firstname: '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="sr-only">Lastname</label>
                            <input type="text" name="user_lastname" id="user_lastname" class="form-control" placeholder="Enter Lastname"
                            autocomplete="on"
                            value="<?php echo isset($user_lastname) ? $user_lastname: '' ?>">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com"
                            autocomplete="on"
                            value="<?php echo isset($user_email) ? $user_email: '' ?>">
                            <p><?php echo isset($error['user_email']) ? $error['user_email']: '' ?></p>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            <p><?php echo isset($error['user_password']) ? $error['user_password']: '' ?></p>
                        </div>
                
                        <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
      