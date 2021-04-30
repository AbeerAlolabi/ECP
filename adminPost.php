<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Post Plog</title>
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

    <body onload="checkCookie();">
      <sidebar-component></sidebar-component>

      <div id="main" >
        <navbar-component></navbar-component>
        <div class="div_breadcrumb">
          <ul class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li><a href="adminHomePage.php">Admin Home Page</a></li>
              <li><a href="#" class="current" >Post Blog</a></li>
              <button class="openbtn openbtn_right" onclick="openNav()">☰ Admin Pages </button>  
            
          </ul>
        </div>
      
      
        <main>
          <div class="container userAddBlog ">
            <h2> Upload Blog </h2>
            <br>   
            <form action="#" method="POST" enctype="multipart/form-data">
              <div class="row justify-content-center">
                <div class="col-12 col-md-4">
                  <label for="username">Full Name:</label><br>
                  <input type="text" id="username" name="username" title="Blog writer name, use only letters[a-z]"  maxlength="40" required/>
                </div>
                <div class="col-12 col-md-4">
                  <label for="userEmail">Email:</label><br>
                  <input type="email" id="userEmail" name="userEmail" required placeholder="example@example.com"/> <!-- pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$ -->
                </div>
                <div class="col-12 col-md-4">
                  <label for="userPhone">Phone:</label><br>
                  <input type="text" id="userPhone" name="userPhone" pattern="\+[0-9]{3}-[0-9]{3}-[0-9]*" required title="it should be in the form (+333-333-9999)" placeholder="+333-333-4444" />
                </div>
              </div>
              <br>
              <div class="row justify-content-center">
                <div class="col-12 col-md-4">
                  <label for="blogTitle">Title:</label><br>
                  <input type="text" id="blogTitle" name="blogTitle" required title="please add a title for the blog"/>
                </div>

                <div class="col-12 col-md-4">
                  <label for="image">Date:</label><br>
                  <input type="date" id="blogDate" name="blogDate" required title="please add blog date"/>
                </div>

                <div class="col-12 col-md-4">
                  <label for="image">Image:</label><br>
                  <input type="file" id="image" name="image" title="please upload an image" accept="image/gif, image/jpeg, image/png" required />
                </div>
                <div class="col-12 col-md-4">
                </div>
              </div>
              <br>
              <div class="row ">
                <div class="col-12 col-md-8">
                  <label for="blogText">Brief Description:</label><br>
                  <textarea id="brifeblogText"  name="brifeblogText" rows="2" maxlength="320" placeholder="max number of allowed characters are 300 characters" required>
                  </textarea>
                </div>
              </div>

              <br>
                <div class="row justify-content-center">
                  <div class="col-12">
                    <label for="blogText"> Description:</label><br>
                    <textarea id="blogText" name="blogText" rows="5" required>
                    </textarea>
                  </div>
              </div>
              <br>
              <div class="row" style="text-align: center;">
                <div class="col-12 ">
                  <input type="reset" value="Cancel"/>
                  <input type="submit" name="submit" id="submit" value="Upload now"/>
                </div>
              </div>

            </form>
          </div>  
        </main>
        <?php
            include 'php/db_connection.php';
            $conn = OpenCon();

            
            $status = $statusMsg = ''; 
            if(isset($_POST["submit"])){ 

                $blogTitle = $_POST['blogTitle'];
                $brifblogText = $_POST['brifeblogText'];
                $blogText = $_POST['blogText'];
                $blogDate = $_POST['blogDate'];
                $status = "approved";
                $userID = "123";
                $username = $_POST['username'];
                $userEmail = $_POST['userEmail'];
                $userPhone = $_POST['userPhone'];
        
                if(!empty($_FILES["image"]["name"])) { 
                    // Get file info 
                    $fileName = basename($_FILES["image"]["name"]); 
                    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

                    $image = $_FILES['image']['tmp_name']; 
                    $imgContent = addslashes(file_get_contents($image));
                    
                    $sql = "insert into blogs (title, briefDescription, Description, creatDate, status, userId, nameOfUser, emailOfUser, image) values
                    ('$blogTitle' , '$brifblogText', '$blogText','$blogDate','$status', '$userID','$username','$userEmail','$imgContent')";
              
        
                    if(mysqli_query($conn, $sql)){
                        echo 
                            "<script>alert('data stored in the database successfully.');
                            window.location.redirect('adminHomePage.php');</script>"; 

                    } else{
                        echo "ERROR: Hush! Sorry $sql. " 
                            . mysqli_error($conn);
                    }


                    CloseCon($conn);
                }
            }
        ?>
        <footer-component></footer-component>
      </div>
            <script  src="js/javascript.js"></script>
    </body>
</html>