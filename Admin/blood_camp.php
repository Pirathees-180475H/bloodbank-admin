<?php  
       include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
       $factory=new Factory();
       $user = $factory->getUser("admin");  
       session_start();  
       if (!$user->session()){  
        header("location:login.php");  
     }
       if(isset($_POST['add'])){ 
            $user->add_camp($_REQUEST['title'], $_REQUEST['venue'], $_REQUEST['date'],$_REQUEST['time']);
       }  
       $d=$user->view_camp();
       if (isset($_REQUEST["submit"])){
        $id=$_REQUEST["id"];
        
        $result=$user->delete_camp($id);
        if($result==true){
            $d=$user->view_camp();
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
    <title>ADMIN | Add Blood Camp</title>
    <link rel="stylesheet" href="new-donor-page/3.css">
   
<style> 
 h2 {text-align: center;}

</style>

<body>

    <div class="container">

        <div  class="navbar">
            <br>
            <h2 text-align="center" style="font-display: #ccc;">ADMI</h2>
           
        
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
        
         
         
       </div>
       
       <!-- this div for info about donor page-->
       <html>
<head>
<style> 
input[type=time], input[type=submit], input[type=text],input[type=date] {
  background-color: #555555;
  border: none;
  color: white;
  padding: 10px 24px;
  text-decoration: none;
  margin: 2px 2px;
  cursor: pointer;
}
</style>
<link rel="stylesheet" href="table design.css">  

</head>

<style>
    body {
      background-image: url('profile change1.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed; 
      background-size: cover;
    }
  button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
    </style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD BLOOD CAMP</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

  <form action="blood_camp.php" method="post">
  
    <h1> ADD BLOOD CAMP</h1>
    <div style="width:1370px;height:150px;border:0px solid #000; " . class="fa fa-align-right" aria-hidden="true"></i>
    <head><style>
fieldset {
  background-color: #eeeeee;
 
}

legend {
  background-color: gray;
  color: white;
  padding: 5px 10px;
}

input {
  margin: 100px;
}

label {
        display: inline-block;
        width: 100px;
        text-align: center;
      }
</style>

    <fieldset>
      
      
      
      
      <label for="title"  class="fa fa-align-right" aria-hidden="true"></i>TITLE:</label>
      <input type="text" id="name" name="title" required>

      <label for="venue">VENUE</label>
      <input type="text" id="name" name="venue" required>

    
      
    
     
      <label for="date">DATE</label>
      <input type="date" id="date" name="date" min="2020-11-16" required> 
      
      <label for="time">TIME</label>
      <input type="time" id="name" name="time" required>
      <button type="submit" name="add">ADD</button>
    </fieldset>

 
 
    
  </form></div>
</head>
  
</body> 

<h1>  CURRENT CAMP DETAILS</h1>
<html>
<html>
<head>
<style> 
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
<link rel="stylesheet" href="table design.css">  

</head>
<body>
<div class="container">
<table border="5" cellpadding="5" cellspacing="5" align="centre" style="width:100%" class="rwd-table">
<tr> 
    <th> Title</th>
    <th> Venue</th>
    <th> Date</th>
    <th> Time</th>
    <th> ACTION</th>
</tr>
<?php foreach($d as $data){
?>
<tr>
    <td><?php echo $data["Title"]; ?></td>
    <td><?php echo $data["Venue"]; ?></td>
    <td><?php echo $data["Date"]; ?></td>
    <td><?php echo $data["Time"]; ?></td>
    <td><form action="" method="POST"><input type="hidden" name="id" value=<?php echo $data["ID"]; ?>> <input type="submit" name="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this user?');"></form></td>
</tr>
<?php
}
?>
</table>

</body>
</html>
       <!--end of about-->
    </div>
</body>
<script>
  var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("date").setAttribute("min", today);
  </script>
</html>


