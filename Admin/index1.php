<?php  
       session_start();  
       include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
       $factory=new Factory();
       $user = $factory->getUser("admin");
       $id = $_SESSION['id'];  
       if (!$user->session()){  
          header("location:login.php");  
       }  
       if (isset($_REQUEST['q'])){  
          $user->logout();  
          header("location:login.php");  
       }  
    
    ?>  
<html lang="en"> 
  <head> 
    <style>
        body {
          background-image: url('back.jpg');
          background-repeat: no-repeat;
          background-attachment: fixed; 
          background-size: cover;
        }
        </style>
    <!--bootsstrap source--> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> 
  
    <title>admin  page</title> 
    <!-- CSS code for 2 headings -->
    <style> 
      h1{ 
        color: rgb(0, 0, 0); 
        text-align: center; 
      } 
      
      button{ 
        margin-top: 10px; 
      } 
    </style> 

<style> 
    h2{ 
      color: rgb(66, 37, 134); 
      text-align: center; 
    } 
    div.one{ 
      margin-top: 0px; 
      text-align: center; 
    } 
    div.two{
      float: right;
      
      
      
    }
    button{ 
      margin-top: 10px; 
    } 
  </style>
  <!--back round immage-->
    
  </head> 
  <img src="main.jpg" width="100%"
  height="30%" >

    <div class="container"> 
        
  
      <!-- Bootstrap Button Classes -->      
      <div class="one"> 
         
        <a class="btn btn-dark" href="pass_change.php" >CHANGE-PAASWORD</a>
        <a class="btn btn-dark" href="request_donation.php" target="">REQUEST BLOOD</a>
        <a class="btn btn-dark" href="manage_hospital.php" >MANNAGE HOSPITALS</a>
        <a class="btn btn-dark" href="manage_donor.php" >MANNAGE DONOR</a>
        <a class="btn btn-dark" href="view_request.php" >VIEW REQUEST</a>
        <a class="btn btn-dark" href="blood_camp.php" >ADD BLOOD CAMP</a>
        <a class="btn btn-dark" href="add_blood.php"  >ADD BLOOD</a>
        <a class="btn btn-dark" href="blood_inventory.php"  >Blood Inventory</a>
        
        
       
        <!-- <iframe src="" name="box1" frameborder="" width="500px" height="500px"></iframe> -->
      
        
      </div> 
      <div class="two">
        <br><br><br>
        <a class="btn btn-dark btn-lg"href=""  >LOG-OUT</a>
        <p align="right"><a href="?q=logout">LOGOUT</a></p>
      </div>
        
    </div> 
    
  </body> 
</html> 