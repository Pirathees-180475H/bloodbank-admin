<?php
    session_start();
    include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
    $factory=new Factory();
    $user = $factory->getUser("admin");
    $d=$user->view_hospital();
    if (!$user->session()){  
        header("location:login.php");  
     } 
    if (isset($_REQUEST["submit"])){
        $id=$_REQUEST["id"];
        
        $result=$user->delete_hospital($id);
        if($result==true){
            $d=$user->view_hospital();
        }
    }

?>

<?php  
        
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
    <title>ADMIN | Manage Hospital</title>
    <link rel="stylesheet" href="new-donor-page/1.css">
   
<style> 
 h2 {text-align: center;}
input[type=button], input[type=submit], input[type=reset] {
  background-color: #f44336;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

<body>

    <div class="container">

        <div  class="navbar">
            <br>
            <h2 text-align="center" style="font-display: #ccc;">ADMIN</h2>
           
        
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

       
<html>
<head>
<link rel="stylesheet" href="table design.css">  

</head>

<div class="con">
<table border="3" cellpadding="5" cellspacing="5" align="centre" class="rwd-table">
<tr> 
    <th> Registration ID</th>
    <th> Name of the hospital</th>
    <th> Mobile Number</th>
    <th> Address or Location</th>
    <th> Manage</th>
</tr>
<?php foreach($d as $data){
?>
<tr>
    <td><?php echo $data["Registration_ID"]; ?></td>
    <td><?php echo $data["Name"]; ?></td>
    <td><?php echo $data["Mobile_No"]; ?></td>
    <td><?php echo $data["Address"]; ?></td>
    <td><form action="" method="POST"><input type="hidden" name="id" value=<?php echo $data["Registration_ID"]; ?>> <input type="submit" name="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this user?');"></form></td>
</tr>
<?php
}
?>
</table>
</div>

</html>

    </div>
</body>
</html>

