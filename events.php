<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ECP Home Page</title>
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

    <body >
        <navbar-component></navbar-component>
        <div class="div_breadcrumb">
          <ul class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li><a href="#"class="current">Events</a></li>
          </ul>
        </div>
      
        <main>
          <div class="container">
            
            <?php
              include 'php/db_connection.php';
              $conn = OpenCon();

              $sql = "select title, description, data, link from events ";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                  echo "
                  <div class='event row justify-content-center'>
                      <div class='card text-center'>
                      <div class='card-header'>New Events</div>
                      <div class='card-body'>
                        <h5 class='card-title'>".$row["title"]."</h5>
                        <p class='card-text'>
                        ".$row["description"]." 
                        </p>
                        <p>for more details on date and time click on the lick below</p>
                      </div>
                      <div class='card-footer text-muted'>".$row["data"]."</div>
                      <a href='".$row["link"]."'>Event link</a>
                    </div>
                  </div>
                  ";
                };
              };
              ?>
              </div>
          </div>  
        </main>
      <footer-component></footer-component>
  </body>
</html>