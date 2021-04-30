<?php
    include 'db_connection.php';
    $conn = OpenCon();
    echo "Connected Successfully";
    
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $name = $_POST["name"];

    if(isset($_POST["submit"])){

        $sql = "insert into admin (email, pass,fullName) values ('$email' , '$pass','$name')";
        
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('Successfully registered');
                 window.location.replace('../index.php');
            </script>"; 

        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }

        CloseCon($conn);

    }
?>