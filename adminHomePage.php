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

    <body class="adminHomePage">

      <sidebar-component></sidebar-component>

      <div id="main">
        <navbar-component></navbar-component>
        
        <div class="div_breadcrumb">
          <ul class="breadcrumb">
              <li><a href="index.html">Home</a></li>
              <li><a href="#"  class="current">Admin Home Page</a></li>
              <button class="openbtn openbtn_right" onclick="openNav()">☰ Admin Pages </button>  
          </ul>
        </div>
  
        <div class="container">
        <?php
          include 'php/db_connection.php';
          $conn = OpenCon();

          $sql = "select title, briefDescription, Description, nameOfUser, image, blogId from blogs where status='approved'";
          $result = mysqli_query($conn, $sql);

          if(mysqli_num_rows($result)>0){
            $i = 1;
            while($row = mysqli_fetch_assoc($result)){
              
              echo"
              <div class='row justify-content-center'>
              <div class='col-11  blog_Main'  id='blogBtn_".$i."'>
                <h3>". $row["title"]."</h3>
                <form  action='php/updateBlog.php'  method='get' >
                  <input type='submit' value='×' class='deleteBlogBtn dede' id='deleteBlogBtn_".$i."' name='BlogDelete' style='
                      font-size: 27px; font-weight: 600;color: #043f3d; float: right; position: absolute; right: 10px;
                      width:20px; box-shadow:none; border:none; padding:0px; top: 2px;background-color: transparent;'/>
                    <input type='hidden' name='blogid' id='blogid' value='".$row["blogId"]."' />
                  <!--<a class='deleteBlogBtn' id='deleteBlogBtn_".$i."' onclick='deleteBlog(this.parentNode.id)'>×</a><br><br>-->
                </form>
                
                
                <img src='data:image/jpg;charset=utf8;base64,".base64_encode($row['image'])."' alt='Blog title' />
                <p> ".$row["briefDescription"]."</p>
                
                <button class='edit_btn continue_reading_btn' id='blog_".$i."_Btn'>Edit The Blog</button>
              </div>
              <!-- blog 1 modal -->
              <div class='modal' id='blog_".$i."_modal'>
                
                <form action='php/updateBlog.php'  method='post'>
                  <!-- Modal content -->
                  <div class='modal-content'>
                    <div class='modal-header'>
                    <input type='text' value='". $row["title"]."' name='blogTitle' id='blogTitle'/>
                    <input type='number' name='blogid' id='blogid' value='".$row["blogId"]."' style='display:none;'/>
                    
                      <span class='close 1'>&times;</span>
                    </div>
                    <div class='modal-body'>
                      <div class='container'>
                        <div class='row'>
                          <div class='col-12' >
                            <p style='font-size:28px'>Edit Blog Description:</p>
                            <textarea type='text' id='blogDescription' name='blogDescription' onclick='auto_grow(this)'>
                            ". $row["Description"]."
                            </textarea>

                            <p style='font-size:28px;margin-top: 25px;margin-bottom: 10px;'>Edit Blog Brief Description:</p>
                            <textarea id='blogBrief' name='blogBrief' onclick='auto_grow(this)' maxlength='360'>
                            ".$row["briefDescription"]."
                            </textarea>

                            <input type='submit' value='save edit' name='save' style='float: right;margin: 8px 0px;background: #444;'/>
                          </div>
                        
                          <div class='col-12' >
                            <img class='img_modal' src='data:image/jpg;charset=utf8;base64,".base64_encode($row['image'])."' alt='blog_1'/>
                          </div>  
                        
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              
            <!-- end of blog 1 modal -->
            </div>
              ";
              $i = ++$i;
            }
          }
          
        ?>
        </div> 
        <footer-component></footer-component>
        <script src="js/javascript.js"></script> 
      </div>
    </body>
</html>