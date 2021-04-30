<?php
    include 'db_connection.php';
    $conn = OpenCon();

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if(isset($_POST['submit'])) {
 
        $sql = "select * from admin";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0 ){
            while($row = mysqli_fetch_assoc($result)){
                echo "<script>console.log(".$row["email"].")</script>";
                if($row["email"] != $email || $row["pass"]!= $password){
                    echo "<script>window.location.replace('../login.html');
                    alert('incorrect username or passowrd');</script>";

                }else{
                   //echo "<script> window.location.replace('../adminHomePage.php');</script>";
                }
            }
        }
        
    }
  
    CloseCon($conn);
?>