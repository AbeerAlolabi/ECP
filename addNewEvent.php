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
        <script src="js/components/sidebar.js" type="text/javascript"></script>
    </head>

    <body class="adminHomePage" onload="checkCookie();">

<sidebar-component></sidebar-component>

<div id="main">
  <navbar-component></navbar-component>
  
  <div class="div_breadcrumb">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="adminHomePage.php"  >Admin Home Page</a></li>
        <li><a href="#"  class="current">Add A New Event</a></li>
        <button class="openbtn openbtn_right" onclick="openNav()">☰ Admin Pages </button>  
    </ul>
  </div>
            <form action="#" method="POST">
                <div class="container">
                    <div class="event row justify-content-center">
                    <div class="card text-center" style="width: 100%;">
                        <div class="card-header">Create New Event</div>
                        <div class="card-body">
                        <h5 class="card-title"><input type="text" placeholder="Event title" name="title" style="text-align: center;"/></h5>
                        <p class="card-text">
                        <textarea rows="5" placeholder="event description" style="text-align: center;" name="description"></textarea>
                        </p>
                        </div>
                        <div class="card-footer text-muted"><input type="date" name="date" /></div>
                        <a><input type="text" placeholder="Event link" name="link" style="text-align: center;"><br/>
                    </div>
                    <input type="submit" value="submit" name="submit"/>
                </div>
            </div>
          </form>
        </main>
        
        <?php
            include 'php/db_connection.php';
            $conn = OpenCon();

            if(isset($_POST["submit"])){

                $title = $_POST["title"];
                $description = $_POST["description"];
                $date = $_POST["date"];
                $link = $_POST["link"];
                $sql = "insert into events (title, description,data,link) values ('$title' , '$description','$date','$link')";
                
                if(mysqli_query($conn, $sql)){
                    echo "<script>alert('New event added sccessfully ');
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