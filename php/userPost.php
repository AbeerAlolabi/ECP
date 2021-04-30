<?php
    include 'db_connection.php';
    $conn = OpenCon();

    
    $status = $statusMsg = ''; 
    if(isset($_POST["submit"])){ 

        $blogTitle = $_POST['blogTitle'];
        $brifblogText = $_POST['brifeblogText'];
        $blogText = $_POST['blogText'];
        $blogDate = $_POST['blogDate'];
        $status = "onReview";
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
                echo "<script>
                alert('you have submitted a new blog successfully, it will be review within a week. if it is approved by the admin you will be able to see it on the blogs page');
                window.location.replace('../index.php');
                 </script>"; 

                echo nl2br("\n$blogTitle\n $brifblogText\n "
                    . "$blogText\n $blogDate\n $status \n $userID \n  $username \n $userEmail \n$userPhone \n$image");
            } else{
                echo "ERROR: Hush! Sorry $sql. " 
                    . mysqli_error($conn);
            }


            CloseCon($conn);
        }
    }
?>