<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blogs Page </title>
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
       
         <!-- my js link -->
        
       
        <!--footer component-->
        <script src="js/components/footer.js" type="text/javascript"></script>
        <!--navbar components link-->
        <script src="js/components/navbar.js" type="text/javascript"></script>
    </head>

    <body>
        <navbar-component></navbar-component>
        <div class="div_breadcrumb">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="#"class="current">Blogs</a></li>
            </ul>
        </div>

        <main>
          <h1>&nbsp;<span> Blogs </span>&nbsp;</h1>
          
          <div class="container ">
            <div class="row justify-content-center">
            
              <?php
                include 'php/db_connection.php';
                $conn = OpenCon();

                $sql = "select title, briefDescription, Description, nameOfUser, image from blogs where status='approved'";

                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0){
                  $i = 1 ;
                  while($row = mysqli_fetch_assoc($result)){
                    echo "
                    <div class='container'>
                      <div class='row justify-content-center'>
                        <div class='blog_Main row'>
                            <div class='col-11 col-sm-8'>
                              <h4>". $row["title"]."</h4>
                              <p> " .$row["briefDescription"]."</p>
                              <h6 class='continue_reading_btn' id='blog_".$i."_Btn'>continue reading</h6>
                            </div>

                            <div class='col-11 col-sm-4' >
                              <img  src='data:image/jpg;charset=utf8;base64,".base64_encode($row['image'])."' alt='Blog title' />
                            </div>
                            
                          <!-- blog 1 modal -->
                          <div class='modal' id='blog_".$i."_modal'>
                
                            <!-- Modal content -->
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h3>". $row["title"]."</h3>
                                <span class='close 1'>&times;</span>
                              </div>
                              <div class='modal-body'>
                                <div class='container'>
                                  <div class='row'>
                                    <div class='col-12 ' >
                                      <p>". $row["Description"]."</p>
                                      <img src='data:image/jpg;charset=utf8;base64,".base64_encode($row['image'])."' alt='blog_1'/>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          </div>
                        </div>
                     </div>
                    ";
                    $i = ++$i;
                  }
                  }
                ?>
              
              
        </main>
        <br>
        <div class="user_add_btn ">
          <h4>Would you like to publish a blog on education, conflict and peacebuilding?</h4>
          <a  href="userPost.html"><button class="add_btn"> Submit here</button></a>
        </div>
        

        <footer-component></footer-component>
        <script src="js/javascript.js"></script>    
    </body>
</html>