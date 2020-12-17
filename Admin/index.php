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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | main page</title>
    <link rel="stylesheet" href="new-donor-page/1.css">
   <style>
       h2 {text-align: center;}
   </style>
</HEAD>
<body>

    <div class="container">

        <div  class="navbar">
            <br>
            <h2 text-align="left" style="font-display: #ccc;">ADMIN</h2>
           
        
            <nav>
            <ul>
                <li></li>
                <li> <a href="request_donation.php">REQUEST-BLOOD</a> </li>
                <li> <a href="manage_hospital.php" >MANAGE-HOSPITALS</a> </li>
                <li> <a href="manage_donor.php" >MANAGE-DONORS</a> </li>
                <li> <a href="view_request.php" >VIEW-REQUEST</a> </li>
                <li> <a href="blood_camp.php"  >ADD-BLOOD-CAMP</a> </li>
                <li> <a href="add_blood.php" >ADD-BLOOD</a> </li>
                <li> <a href="blood_inventory.php" >BLOOD-INVENTORY</a> </li>
                <li></li> <li></li>
               <li> <a href="?q=logout"  > LOG-OUT</a> </li>
            </ul>

        </nav>
        <div class="user">
           
           <img src="new-donor-page/logo.png">
       </div>

        
        </div>

       <div class="sidebar">
        <a href="index.php"> <img src="new-donor-page/homelogo.png"  class="homelogo"> </a>
        <a href="pass_change.php"> <img src="new-donor-page/up.png"  class="update"> </a>
         
         
       </div>
       
       <!-- this div for info about donor page-->

       <div class="msg-container">
         <div id="slider">
              <div class="msg-col">
                 
                 <img src="new-donor-page/ad.png"alt="add" width="1000" height="800">

              </div>
             

         </div>

       </div>
       <!--end of about-->
    </div>
</body>
</html>
