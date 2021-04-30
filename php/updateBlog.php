<?php
    include 'db_connection.php';
    $conn = OpenCon();

    if(isset($_POST['save'])) {
        $blogTitle = $_POST['blogTitle'];
        $blogDescription = $_POST['blogDescription'];
        $blogBrief = $_POST['blogBrief'];
        $blogId = $_POST['blogid'];

        $sql = "select title, briefDescription, Description, nameOfUser, image, blogId from blogs";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>0 ){
            while($row = mysqli_fetch_assoc($result)){
                if($row["blogId"] == $blogId){
                    $sqlUpdate = "update  blogs set title='$blogTitle', briefDescription = '$blogBrief', Description = '$blogDescription' , status='approved' where blogId =$blogId ";
               
                    if(mysqli_query($conn, $sqlUpdate)){
                        echo "<h3>data stored in a database successfully." 
                            . " Please browse your localhost php my admin" 
                            . " to view the updated data</h3>"; 
        
                        echo nl2br("\n$blogTitle\n $blogBrief\n "
                            . "$blogDescription\n ");
                    } else{
                        echo "ERROR: Hush! Sorry $sqlUpdate. " 
                            . mysqli_error($conn);
                    }
        
                }
            }
        }
        
    }

    if(isset($_GET['BlogDelete'])){
        $blogId = $_GET['blogid'];
        $sql = "select * from blogs";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0 ){
            while($row = mysqli_fetch_assoc($result)){
                if($row["blogId"] == $blogId){
                    $sqlUpdate = "delete    from  blogs where blogId =$blogId ";
               
                    if(mysqli_query($conn, $sqlUpdate)){
                        echo "<h1>blog deleted from database successfully.</h1>"
                        ."<p>you will be redirect to admin home page withn 3 seconds"
                        ."<script>
                        setTimeout(function() {
                            window.location.href='../adminHomePage.php'
                        }, 3000)
                        </script>"; 
        
                    } else{
                        echo "ERROR: Hush! Sorry $sqlUpdate. " 
                            . mysqli_error($conn);
                    }
        
                }
            }
        }
    }
  
    CloseCon($conn);
?>