<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Login</title>
        <link rel="icon" href="images/icon.png" type="image/icon type">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- bootstrap links -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <!-- fonts links-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        
        <!-- google icon link -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- my css link -->
        <link rel="stylesheet" href="css/style.css">
        
        <!--footer component-->
        <script src="js/components/footer.js" type="text/javascript"></script>
        <!--navbar components link-->
        <script src="js/components/navbar.js" type="text/javascript"></script>
    </head>

    <body onload="checkCookie();">
        <navbar-component></navbar-component>
        <div class="div_breadcrumb">
          <ul class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li><a href="adminHomePage.php">admin home page</a></li>
              <li><a href="#" class="current">new admin account</a></li>
          </ul>
        </div>
      
        <main class="login">
          <div class="container ">
            <div class="row justify-content-center ">
              <div class="col-md-5 col-12 Content">
                <form action="" method="POST">
                  <label for="name">Name:</label><br>
                  <input type="text" id="name" name="name" placeholder="your full name" /><br><br>
                  <label for="email">Email:</label><br>
                  <input type="email" id="email" name="email" placeholder="example@example.com" /><br><br>
  
                  <label for="password">Password:</label><br>
                  <input type="password" name="password" id="password" /><br><br>
                  <input type="submit" name="submit" value="sign up"/> <br>
                  
                </form>
            </div>
          </div>
        </main>
        <br>
          <?php
            include 'php/db_connection.php';
            $conn = OpenCon();
            echo "Connected Successfully";

            if(isset($_POST["submit"])){
                $email = $_POST["email"];
                $pass = $_POST["password"];
                $name = $_POST["name"];
                
                $sql = "insert into admin (email, pass,fullName) values ('$email' , '$pass','$name')";
                
                if(mysqli_query($conn, $sql)){
                    echo "<script>alert('Successfully registered');
                    </script>"; 

                } else{
                    echo "ERROR: Hush! Sorry $sql. " 
                        . mysqli_error($conn);
                }

                CloseCon($conn);

             }
?>
        <footer-component></footer-component>
        <script src="js/javascript.js"></script>   
    </body>
</html>