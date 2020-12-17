<?php
include_once ('C:\xampp\htdocs\BMSfin\JBB\class.php');
include_once ('C:\xampp\htdocs\BMSfin\JBB\Blood\blood.php');
include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\LoginUser.php');
class Admin extends User implements LoginUser{
    private static $admin;
    private final function __construct(){}

    public static function getinstance(){
        if (!isset(self::$admin)) { 
            self::$admin = new Admin(); 
        } 
          
        return self::$admin; 
    }
    public  
    function login($user_name, $pass) {  
        $db=new DB();
        //$pass = md5($pass);  
        $dbz=$db->getdb();
        $sql="Select * from Admin where user_name='".$user_name."' ";
        $stmt=$dbz->prepare($sql);
        $stmt->bindValue(':user_name', $user_name);
        //Execute.
        $stmt->execute();
        //Fetch row.
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user==false){
            // echo "incorret username or password";
        }
        else{
            $validpw=password_verify($pass, $user['Password']);
            $validpw1=stripslashes($user['Password'])==md5($pass);
            if ($validpw1){
                $_SESSION['login'] = true;  
                $_SESSION['id'] = $user_name;  

                return true;  
            } else {  
                return false;  
        }  
            
    }
}


    public function change_password($current,$new,$confirm){
        $db=new DB();
        //$pass = md5($pass);  
        $dbz=$db->getdb();
        $sql="Select * from Admin where user_name='".$_SESSION['id']."' ";
        $stmt=$dbz->prepare($sql);
        $stmt->bindValue(':user_name', $_SESSION['id']);
        //Execute.
        $stmt->execute();
        //Fetch row.
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user==false){
            echo "incorret username or password";
        }
        else{
            if ($user['Password']==md5($current)){
                $sql2="UPDATE Admin SET Password='".md5($new)."' WHERE user_name='".$_SESSION['id']."'";
                $pass_change=$dbz->prepare($sql2);
                if ($new==$confirm){
                    $result2=$pass_change->execute();
                    if ($result2){
                        echo '<script type="text/javascript"> alert("Password changed successfully")</script>';
                        $_SESSION['login'] = false;  
                        session_destroy(); 
                        header("location:login.php");
                    }
                    else{
                        echo '<script type="text/javascript"> alert("Password change failed. Try again later")</script>';
                    }
                }  
                else{
                    echo '<script type="text/javascript"> alert("Password does not match.")</script>';
                }
            
            
        }
        else{
            echo '<script type="text/javascript"> alert("Incorrect password")</script>';
        }
        }
    }

    public function view_donor(){
        $db=new DB();
        $dbz=$db->getdb();
        $query="SELECT * FROM donors";
        $d=$dbz->query($query);
        return $d;
    } 

    public function delete_donor($id){
        $db=new DB();
        $dbz=$db->getdb();
        $query="DELETE FROM DONORS WHERE NIC_NO='".$id."'";
        $stmt=$dbz->prepare($query);
        $result=$stmt->execute();
        if ($result){
            return true;
        }
    }

    public function view_camp(){
        $db=new DB();
        $dbz=$db->getdb();
        $query="SELECT * FROM blood_camp ORDER BY Date DESC, Time Desc";
        $d=$dbz->query($query);
        return $d;
    }

    public function view_hospital(){
        $db=new DB();
        $dbz=$db->getdb();
        $query="SELECT * FROM hospital";
        $d=$dbz->query($query);
        return $d;
    } 

    public function delete_hospital($id){
        $db=new DB();
        $dbz=$db->getdb();
        $query="DELETE FROM hospital WHERE Registration_ID='".$id."'";
        $stmt=$dbz->prepare($query);
        $result=$stmt->execute();
        if ($result){
            return true;
        }
    }

    public function delete_camp($id){
        $db=new DB();
        $dbz=$db->getdb();
        $query="DELETE FROM blood_camp WHERE ID='".$id."'";
        $stmt=$dbz->prepare($query);
        $result=$stmt->execute();
        if ($result){
            return true;
        }
    }

    public function remove_blood($blood){
        $db=new DB();
        $dbz=$db->getdb();
        // $id=$blood->getid();
        $query="UPDATE blood_inventory SET Status='Expired' WHERE ID='".$blood."'";
        $stmt=$dbz->prepare($query);
        $result=$stmt->execute();
        if ($result){
            return true;
        }
    }

    public  
      
        function add_camp($title, $venue, $date,$time) {  
            $db = new DB();
            $sql = "INSERT INTO blood_camp (Title,Venue,Date,Time) VALUES (?,?,?,?)"; 
            $dbz=$db->getdb();
            $stmtinsert=$dbz->prepare($sql);
            $result=$stmtinsert->execute([$title,$venue,$date,$time]);
            if ($result){
                echo '<script type="text/javascript"> alert("Added Succesfully.")</script>';
            }else{
                echo '<script type="text/javascript"> alert("Failed. Try again later!!!")</script>';
            }
        }

        public  
      
        function add_blood($blood,$donated_place) {  
            $db = new DB();
            $id=$blood->getid();
            $blood_type=$blood->gettype();
            $donor_id=$blood->getdonor();
            $donated_date=$blood->getdonated_date();
            $expiry_date=$blood->getexpiry_date();
            $status=$blood->getState();
            $donated_place=$donated_place;
            $sql1 = "INSERT INTO blood_inventory (ID,Blood_Type,Donor,Donated_Date,Expiry_Date,Status) VALUES (?,?,?,?,?,?)"; 
            $sql2 = "INSERT INTO blood_donations (Donor_ID,Donated_date,Donated_place,Status) VALUES (?,?,?,?)"; 
            $dbz=$db->getdb();
            $stmtinsert1=$dbz->prepare($sql1);
            $result1=$stmtinsert1->execute([$id, $blood_type, $donor_id,$donated_date,$expiry_date,$status]);
            
            $stmtinsert2=$dbz->prepare($sql2);
            $result2=$stmtinsert2->execute([$donor_id,$donated_date,$donated_place,$status]);
            if ($result1 && $result2){
                echo '<script type="text/javascript"> alert("Blood sample added Succesfully.")</script>';
            }else{
                echo '<script type="text/javascript"> alert("Failed. Try again later!!!")</script>';
            }
        }

        public function view_request(){
            $db=new DB();
            $dbz=$db->getdb();
            $query="SELECT * FROM blood_request ORDER BY Request_ID DESC";
            $d=$dbz->query($query);
            return $d;
        } 

        public function reply_request($id,$response){
            $db=new DB();
            $dbz=$db->getdb();
            $sql = "UPDATE blood_request SET Response='".$response."' WHERE Request_ID='".$id."'"; 
            $dbz=$db->getdb();
            $stmtinsert=$dbz->prepare($sql);
            $result=$stmtinsert->execute();
            if ($result){
                return true;
            }
        }

        public function send_request($blood_type, $message, $date){
            $db = new DB();
            $sql = "INSERT INTO donation_request (Blood_Type,Message,Date) VALUES (?,?,?)"; 
            $dbz=$db->getdb();
            $stmtinsert=$dbz->prepare($sql);
            $result=$stmtinsert->execute([$blood_type,$message,$date]);
            if ($result){
                echo '<script type="text/javascript"> alert("Request sent succesfully.")</script>';
            }else{
                echo '<script type="text/javascript"> alert("Request sent failed. Try again later!!!")</script>';
            }
        }
}
?>