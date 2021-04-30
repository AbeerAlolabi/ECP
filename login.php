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

    <body>
        <navbar-component></navbar-component>
        <div class="div_breadcrumb">
          <ul class="breadcrumb">
              <li><a href="index.html">Home</a></li>
              <li><a href="#" class="current">Admin Login</a></li>
          </ul>
        </div>
      
        <main class="login">
          <div class="container ">
            <div class="row justify-content-center ">
              <div class="col-md-5 col-12 Content">
                <form action="#" method="POST">
                  <label for="email">
                  Email:
                  </label><br>
                  <input type="email" id="email" name="email" placeholder="example@example.com" /><br><br>
                  <label for="password">Password:</label><br>
                  <input type="password" name="password" id="password" /><br>
                  <a href="#" class="continue_reading_btn" id="blog_1_Btn">Forgot password?</a><br><br>
                  <input type="submit" name="submit" value="login"/> <br>
                  
                </form>
            </div>
          </div>

        <!-- blog 1 modal -->
        <div class="modal"id="blog_1_modal">

          <!-- Modal content -->
          <div class="modal-content forgot_pass">
            <div class="modal-body ">
              <div class="container">
                <div class="row ">
                  <div class="col-12" >
                    <form>
                      <span class="close ">&times;</span>
                      <h4><label for="forgot_pass">Please! Enter Your Email:</label></h4>
                      <input type="email" id="forgot_pass">
                      <input type="submit" value="reset">
                    </form>                    
                  </div>
                </div>
              </div>
            </div>
              <br>
   
          </div>

        </div>
        <!-- end of blog 1 modal -->

        </main>

        <?php
          include 'php/db_connection.php';
          $conn = OpenCon();
          
          if(isset($_POST['submit'])) {
      
              $email = $_POST['email'];
              $password = $_POST['password'];
              $sql = "select email, pass from admin where email='".$email."' and pass='".$password."'";
              $result = mysqli_query($conn, $sql);
              if(mysqli_num_rows($result)>0 ){
                  echo "<script> window.location.replace('adminHomePage.php');
                  document.cookie= 'admin =adminPage; path=/'</script>";
              }else{
                  echo "<script>
                  alert('incorrect username or passowrd');</script>";   
              }   
          }
        
          CloseCon($conn);
        ?>
        <br>
        <footer-component></footer-component>
        <script src="js/javascript.js"></script>   
    </body>
</html>