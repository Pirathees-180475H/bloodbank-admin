<?php  
       session_start();  
       include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
       $factory=new Factory();
       $user = $factory->getUser("admin");
       if ($user->session())
       {  
          header("location:index.php");  
       }  
      
       //$user = new Donor();  
       if (isset($_POST['login'])){  
          $login = $user->login($_REQUEST['Username'],$_REQUEST['Password']);  
          if($login){  
              //echo "loginned";
             header("location:index.php");  
          }
         //  else
         //  {  
         //     echo "Login Failed!";  
         //  }  
       }  
    ?> 
   <html>
      <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      </head>
<body>
<link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="login-framecss.css" type="text/css">

<div class="login">
  <div class="login-header">
    <h1>ADMIN</h1>
  </div>
  <div class="login-form">
      <form action="login.php" method="post">
    <h3>ID:</h3>
    <input type="text" name="Username" placeholder="Username" required><br>
    <h3>Password:</h3>
    <input type="password" name="Password" placeholder="Password" required>
    <br>
    <input type="submit" name="login" value="Login" class="login-button" required>
    
    </form>
  </div>
</div>
      </body>
   </html>