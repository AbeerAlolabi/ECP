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

    <body onload="checkCookie(); note();">
        <navbar-component></navbar-component>
        <div class="div_breadcrumb">
          <ul class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li><a href="adminHomePage.php">admin home page</a></li>
              <li><a href="#" class="current">new admin account</a></li>
          </ul>
        </div>
      
        <main>
          <div class="container ">
            <div class="row justify-content-center ">
              <div class="col-md-7 col-12 signup">
                <form action="" method="POST">
                  <div class="row">
                    <div class="col-md-6 col-12 ">
                      <label for="name">Name:</label><br>
                      <input type="text" id="name" name="name" placeholder="your full name"  required/><br><br>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email" placeholder="example@example.com" required /><br><br>
                    </div>
                  </div>
               
                  <div class="row">
                    <div class="col-md-6 col-12">
                      <label for="password">Password:</label><br>
                      <input type="password" name="password" id="password" required/><br><br>
                      
                   </div>
                    <div class="col-md-6 col-12">
                        <label for="passwordCon">Confirm Password:</label><br>
                        <input type="password" name="passwordCon" id="passwordCon" onblur="testpassword2();"required/><br><br>
                        <p id="message"></p>
                   </div>
                  </div>
                  <input type="submit" name="submit" id="submit" value="sign up" disabled="true"/> <br>
                  
                </form>
            </div>
          </div>
        </main>
        <br>
          <?php
            include 'php/db_connection.php';
            $conn = OpenCon();

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
        <script>
          function note(){
            alert("please, make sure to create unforgettabel passowrd");
          }
          function testpassword2() {
              var text1 = document.getElementById("password");
              var text2 = document.getElementById("passwordCon");
              if (text1.value == text2.value){
                text1.style.borderColor = "#2EFE2E"; 
                text2.style.borderColor = "#2EFE2E"; 
                document.getElementById('submit').disabled = false;
              }
              else{
                text1.style.borderColor = "red";
                text2.style.borderColor = "red";
                document.getElementById('submit').disabled = true;

              }
          }
        </script>
        <footer-component></footer-component>
        <script src="js/javascript.js"></script> 
    </body>
</html>