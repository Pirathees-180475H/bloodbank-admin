
<?php
    session_start();
    include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
    $factory=new Factory();
    $user = $factory->getUser("admin");
    $db=new DB();
    $dbz=$db->getdb();
    $query="SELECT * FROM blood_inventory WHERE Status='Usable'";
    $d=$dbz->query($query);
    if (!$user->session()){  
        header("location:login.php");  
     } 
    if (isset($_REQUEST["submit"])){
        $id=$_REQUEST["id"];
        
        $result=$user->remove_blood($id);
        if($result==true){
            $query="SELECT * FROM blood_inventory WHERE Status='Usable'";
            $d=$dbz->query($query);
        }
    }
    
    
?>


<?php
$count=$user->view_blood_inventory();
if (isset($_REQUEST["request"])){
    $group=$_REQUEST["group"];
    
    $result=$user->send_request($group,"Blood Finished",date("Y-m-d"));
    if($result==true){
        $query="SELECT * FROM blood_inventory WHERE Status='Usable'";
        $d=$dbz->query($query);
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


<html>

<HEAD>

    <title>Admin | Blood Inventory</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="new-donor-page/2.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">

   <style>
       h2 {text-align: center;}
   </style>
</HEAD>
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
<style> 
input[type=button], input[type=submit], input[type=reset] {
  background-color:  #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<style>
input[type=button],  input[type=reset] {
  background-color:   #f44336;
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

<div class="con">
<table border="3" cellpadding="5" cellspacing="5" align="centre" class="rwd-table">
<tr> 
    <th> Blood Type</th>
    <th> Available UNITS</th>
    <th> Request to the Donor</th>
</tr>

<tr>
    <td><?php echo "A+"; ?></td>
    <td><?php echo $count['A+']; ?></td>
    <td><form action="" method="POST"><input type="hidden" name="group" value="A+"> <input type="submit" name="request" value="Request" onclick="return confirm('Are you sure you want to Request?');"></form></td>
</tr>
<tr>
    <td><?php echo "A-"; ?></td>
    <td><?php echo $count['A-']; ?></td>
    <td><form action="" method="POST"><input type="hidden" name="group" value="A-"> <input type="submit" name="request" value="Request" onclick="return confirm('Are you sure you want to Request?');"></form></td>
</tr>
<tr>
    <td><?php echo "B+"; ?></td>
    <td><?php echo $count['B+']; ?></td>
    <td><form action="" method="POST"><input type="hidden" name="group" value="B+"> <input type="submit" name="request" value="Request" onclick="return confirm('Are you sure you want to Request?');"></form></td>
</tr>
<tr>
    <td><?php echo "B-"; ?></td>
    <td><?php echo $count['B-']; ?></td>
    <td><form action="" method="POST"><input type="hidden" name="group" value="B-"> <input type="submit" name="request" value="Request" onclick="return confirm('Are you sure you want to Request?');"></form></td>
</tr>
<tr>
    <td><?php echo "AB+"; ?></td>
    <td><?php echo $count['AB+']; ?></td>
    <td><form action="" method="POST"><input type="hidden" name="group" value="AB+"> <input type="submit" name="request" value="Request" onclick="return confirm('Are you sure you want to Request?');"></form></td>
</tr>
<tr>
    <td><?php echo "AB-"; ?></td>
    <td><?php echo $count['AB-']; ?></td>
    <td><form action="" method="POST"><input type="hidden" name="group" value="AB-"> <input type="submit" name="request" value="Request" onclick="return confirm('Are you sure you want to Request?');"></form></td>
</tr>
<tr>
    <td><?php echo "O+"; ?></td>
    <td><?php echo $count['O+']; ?></td>
    <td><form action="" method="POST"><input type="hidden" name="group" value="O+"> <input type="submit" name="request" value="Request" onclick="return confirm('Are you sure you want to Request?');"></form></td>
</tr>
<tr>
    <td><?php echo "O-"; ?></td>
    <td><?php echo $count['O-']; ?></td>
    <td><form action="" method="POST"><input type="hidden" name="group" value="O-"> <input type="submit" name="request" value="Request" onclick="return confirm('Are you sure you want to Request?');"></form></td>
</tr>

</table>


<h1>--------------</h1>
<h1> FULL DETAILS</h1>
<h1>--------------</h1>


<html>
<head>
<link rel="stylesheet" href="table design.css">  

</head>

<div class="con">
<table border="3" cellpadding="5" cellspacing="5" align="centre" class="rwd-table">
<tr> 
    <th> BLOOD-ID</th>
    <th> BLOOD-TYPE</th>
    <th> DONOR-NIC-NUMBER</th>
    <th> DONATED -DATE</th>
    <th> </th>
</tr>
<?php foreach($d as $data){
?>
<tr>
    <td><?php echo $data["ID"]; ?></td>
    <td><?php echo $data["Blood_Type"]; ?></td>
    <td><?php echo $data["Donor"]; ?></td>
    <td><?php echo $data["Donated_Date"]; ?></td>
    <td><form action="" method="POST"><input type="hidden" name="id" value=<?php echo $data["ID"]; ?>> <input type="submit" name="submit" value="Remove" onclick="return confirm('Are you sure you want to delete this blood sample?');"></form></td>
</tr>
<?php
}
?>
</table>


      
       <!--end of about-->
    </div>
</body>
</html>


