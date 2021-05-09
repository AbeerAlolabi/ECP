<!DOCTYPE html>
<html lang="en">
  <head>

    <title>ECP Home Page</title>
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
  ​ <navbar-component></navbar-component>
    <br>
    
    <header>
      <div class="container ">
          <div class="row justify-content-center">
              <div class="col-12 col-md-8 left_header">
                  
                  <p>
                      The Education,Conflict and Peacebuilding (ECP) Interest Group includes graduate students, faculty, and practitioners, who are all exploring the intersection between education, peace, conflict, and development.ECP conducts monthly meetings that involve a deep and critical exploration into a current issue or topic within the field.
                   </p>
                   <a href="aboutUs.html"><button>Continue Reading</button></a>
              </div>
              
          
          </div>
      </div>

    </header>
    <br>

    <main>
      <h1>L<span>atest Blog</span>s</h1>
      <div class="container ">
        <div class="row justify-content-center">

          <?php
              include 'php/db_connection.php';
              $conn = OpenCon();

              $sql = "select title, briefDescription, Description, nameOfUser, image from blogs  where status='approved' ORDER BY blogId LIMIT 3";

              $result = mysqli_query($conn, $sql);
              
              if(mysqli_num_rows($result)>0){
                $i = 1 ;
                while($row = mysqli_fetch_assoc($result)){
                  echo "
                  <div class='col-11 col-md-3 blog_main  '>
                  <h3>". $row["title"]."</h3>
                  <p>" .$row["briefDescription"]."</p>
                  <img  src='data:image/jpg;charset=utf8;base64,".base64_encode($row['image'])."' alt='Blog title' />
                  <button class='continue_reading_btn' id='blog_".$i."_Btn'>continue reading</button>
                  </div>
                  <!-- blog 1 modal -->
                  <div class='modal' id='blog_".$i."_modal'>

                  <!-- Modal content -->
                  
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <h2>". $row["title"]." </h2>
                      <span class='close 1'>&times;</span>
                    </div>
                    <div class='modal-body'>
                      <div class='container'>
                        <div class='row justify-content-center'>
                          <div class='col-12' >
                            <p>". $row["Description"]."</p>

                            <div style='text-align: center; display: block;'>
                              <img  class='img_modal'  src='data:image/jpg;charset=utf8;base64,".base64_encode($row['image'])."' alt='blog_1'/>
                            </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                      <br>
          
                  </div>

                </div>
                <!-- end of blog 1 modal -->";
                $i = ++$i;
                }
              }
                ?>
        </div>
      </div>
      <div class="main_button">
          <a href="blogs.php"><button>Read More Blogs </button></a>
      </div> 
    </main>  
          
    <footer-component></footer-component>
    <script src="js/javascript.js"></script>    
  </body>
</html>
​
