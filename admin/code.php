<?php
// session_start();
include('authentication.php');
include('config/dbconn.php');


// Logout
if(isset($_POST['logout_btn'])){
    // session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    $_SESSION['status'] = "Logged out Successfully";
    header("Location:login.php");
    exit(0);
}

// check Available email 
if(isset($_POST['check_Emailbtn'])){
    $email=$_POST['email'];

        $checkmail = "SELECT email FROM users WHERE email='$email' ";
        $checkmail_run = mysqli_query($conn, $checkmail);

        if(mysqli_num_rows($checkmail_run)>0){
           echo "Email already taken.!";
        }
        else{
            echo "It's Available";
        }
}
 
// Add users
if(isset($_POST['addUser'])){
    // echo "I am here";
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirmPassword'];
    $phoneno=$_POST['phoneno'];

    if($password==$confirmPassword){
        $checkmail = "SELECT email FROM users WHERE email='$email' ";
        $checkmail_run = mysqli_query($conn, $checkmail);

        if(mysqli_num_rows($checkmail_run)>0){
            //Taken Already exists
            $_SESSION['status']='Email Already Taken.!!';
            header("Location: registered.php");
            exit;
        }
        else{
            //Available
            $user_query = "INSERT INTO users (`name`,`email`,`password`,`phoneno`) VALUES ('$name','$email','$password','$phoneno') ";
            $user_query_run= mysqli_query($conn, $user_query);

            if($user_query_run){
                $_SESSION['status']='User Added Successfully';
                header("Location: registered.php");
            }
            else{
                $_SESSION['status']='User Registration Failed !!';
                header("Location: registered.php");
            }
        }
    }
    else{
        $_SESSION['status'] = "Password Not Match.!!";
        header('Location: registered.php');
    }
}


// update users
if(isset($_POST['updateUser'])){
    // echo "I am here";
    $user_id=$_POST['user_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirmPassword'];
    $phoneno=$_POST['phoneno'];
    $role_as=$_POST['role_as'];

    $query = "UPDATE users SET `name`='$name',`email`='$email',`password`='$password',`phoneno`='$phoneno', `role_as`='$role_as' WHERE id= '$user_id' ";

    $query_run= mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['status']='User Updated Successfully';
        header("Location: registered.php");
    }
    else{
        $_SESSION['status']='User Updating Failed !!';
        header("Location: registered.php");
    }
}

// delete users
if(isset($_POST['DeleteUserbtn'])){
    $userid = $_POST['delete_id'];

    $query = "DELETE FROM users WHERE id = '$userid' ";
    $query_run= mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['status']='User Deleted Successfully';
        header("Location: registered.php");
    }
    else{
        $_SESSION['status']='User Delete Failed !!';
        header("Location: registered.php");
    }

}

// add intro-images
if(isset($_POST["addIntroImage"]))
{
    $name=$_POST['introimageName'];
    $image = $_FILES["introImage"]["name"];    

	$query = "INSERT INTO introimage(`introimageName`,`introImage`) VALUES('$name','$image')";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
    	// echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
        move_uploaded_file($_FILES["introImage"]["tmp_name"],"uploads/".$_FILES["introImage"]["name"]);
        $_SESSION['status']='Intro-Image Uploaded Successfully';
        header("Location: introImage.php");
    }
    else
    {
    	$_SESSION['status'] = "Intro-Image Not Uploaded.!!";
        header('Location: introImage.php');
        // echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }
}

// update intro image 
if(isset($_POST['updateIntroImage'])){
    $imgedit_id=$_POST['introimgedit_id'];
    $name=$_POST['introimageName'];
    $image = $_FILES["introImage"]["name"]; 

    $query= "UPDATE introimage SET `introimageName`='$name', `introImage`='$image' WHERE id='$imgedit_id' ";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
    	// echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
        move_uploaded_file($_FILES["introImage"]["tmp_name"],"uploads/".$_FILES["introImage"]["name"]);
        $_SESSION['status']='Image Updated Successfully';
        header("Location: introImage.php");
    }
    else
    {
    	$_SESSION['status'] = "Image Not Updated.!!";
        header('Location: introImage.php');
        // echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }

}

// delete Introimages
if(isset($_POST['DeleteIntroImagebtn'])){
    $imageid = $_POST['delete_id'];

    $query = "DELETE FROM introimage WHERE id = '$imageid' ";
    $query_run= mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['status']='Intro Image Deleted Successfully';
        header("Location: introImage.php");
    }
    else{
        $_SESSION['status']='Intro Image Delete Failed !!';
        header("Location: introImage.php");
    }

}
// add intro-video
if(isset($_POST["addIntroVideo"]))
{
    $name=$_POST['introvideoName'];
    $image = $_FILES["introVideo"]["name"];    

	$query = "INSERT INTO introvideo(`introvideoName`,`introVideo`) VALUES('$name','$image')";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
    	// echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
        move_uploaded_file($_FILES["introVideo"]["tmp_name"],"uploads/".$_FILES["introVideo"]["name"]);
        $_SESSION['status']='Intro-Video Uploaded Successfully';
        header("Location: introVideo.php");
    }
    else
    {
    	$_SESSION['status'] = "Intro-Video Not Uploaded.!!";
        header('Location: introVideo.php');
        // echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }
}
// update intro Video 
if(isset($_POST['updateIntroVideo'])){
    $videdit_id=$_POST['introvidedit_id'];
    $name=$_POST['introvideoName'];
    $image = $_FILES["introVideo"]["name"]; 

    $query= "UPDATE introvideo SET `introvideoName`='$name', `introVideo`='$image' WHERE id='$videdit_id' ";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
    	// echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
        move_uploaded_file($_FILES["introVideo"]["tmp_name"],"uploads/".$_FILES["introVideo"]["name"]);
        $_SESSION['status']='Video Updated Successfully';
        header("Location: introVideo.php");
    }
    else
    {
    	$_SESSION['status'] = "Video Not Updated.!!";
        header('Location: introVideo.php');
        // echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }

}

// delete Introvideo
if(isset($_POST['DeleteIntroVideobtn'])){
    $videoid = $_POST['delete_id'];

    $query = "DELETE FROM introvideo WHERE id = '$videoid' ";
    $query_run= mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['status']='Intro Video Deleted Successfully';
        header("Location: introVideo.php");
    }
    else{
        $_SESSION['status']='Intro Video Delete Failed !!';
        header("Location: introVideo.php");
    }

}

// add images
if(isset($_POST["addImage"]))
{
    $name=$_POST['imageName'];
    $image = $_FILES["imagePic"]["name"];    

	$query = "INSERT INTO images(`imageName`,`imagePic`) VALUES('$name','$image')";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
    	// echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
        move_uploaded_file($_FILES["imagePic"]["tmp_name"],"uploads/".$_FILES["imagePic"]["name"]);
        $_SESSION['status']='Image Uploaded Successfully';
        header("Location: imageAdd.php");
    }
    else
    {
    	$_SESSION['status'] = "Image Not Uploaded.!!";
        header('Location: imageAdd.php');
        // echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }
}

// update image 
if(isset($_POST['updateImage'])){
    $imgedit_id=$_POST['imgedit_id'];
    $name=$_POST['imageName'];
    $image = $_FILES["imagePic"]["name"]; 

    $query= "UPDATE images SET `imageName`='$name', `imagePic`='$image' WHERE id='$imgedit_id' ";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
    	// echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
        move_uploaded_file($_FILES["imagePic"]["tmp_name"],"uploads/".$_FILES["imagePic"]["name"]);
        $_SESSION['status']='Image Updated Successfully';
        header("Location: imageAdd.php");
    }
    else
    {
    	$_SESSION['status'] = "Image Not Updated.!!";
        header('Location: imageAdd.php');
        // echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }

}
	
// delete images
if(isset($_POST['DeleteImagebtn'])){
    $imageid = $_POST['delete_id'];

    $query = "DELETE FROM images WHERE id = '$imageid' ";
    $query_run= mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['status']='User Deleted Successfully';
        header("Location: imageAdd.php");
    }
    else{
        $_SESSION['status']='User Delete Failed !!';
        header("Location: imageAdd.php");
    }

}

// add activites images
if(isset($_POST["addactivitesImage"]))
{
    $name=$_POST['activitesimageName'];
    $image = $_FILES["activitesImage"]["name"];    

	$query = "INSERT INTO activitesimage(`activitesimageName`,`activitesImage`) VALUES('$name','$image')";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
    	// echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
        move_uploaded_file($_FILES["activitesImage"]["tmp_name"],"uploads/".$_FILES["activitesImage"]["name"]);
        $_SESSION['status']='Activite Image Uploaded Successfully';
        header("Location: activitesImage.php");
    }
    else
    {
    	$_SESSION['status'] = "Activite Image Not Uploaded.!!";
        header('Location: activitesImage.php');
        // echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }
}
// update activites image 
if(isset($_POST['updateactivitesImage'])){
    $imgedit_id=$_POST['activitesedit_id'];
    $name=$_POST['activitesimageName'];
    $image = $_FILES["activitesImage"]["name"]; 

    $query= "UPDATE activitesimage SET `activitesimageName`='$name', `activitesImage`='$image' WHERE id='$imgedit_id' ";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
    	// echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
        move_uploaded_file($_FILES["activitesImage"]["tmp_name"],"uploads/".$_FILES["activitesImage"]["name"]);
        $_SESSION['status']='Image Updated Successfully';
        header("Location: activitesImage.php");
    }
    else
    {
    	$_SESSION['status'] = "Image Not Updated.!!";
        header('Location: activitesImage.php');
        // echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }

}

// delete activites images
if(isset($_POST['DeleteactivitesImagebtn'])){
    $imageid = $_POST['delete_id'];

    $query = "DELETE FROM activitesimage WHERE id = '$imageid' ";
    $query_run= mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['status']='User Deleted Successfully';
        header("Location: activitesImage.php");
    }
    else{
        $_SESSION['status']='User Delete Failed !!';
        header("Location: activitesImage.php");
    }

}

// add accommodation images
if(isset($_POST["addaccomo"]))
{
    $name=$_POST['accomoName'];
    $image = $_FILES["accomoImage"]["name"];    

	$query = "INSERT INTO accomoimages(`accomoName`,`accomoImage`) VALUES('$name','$image')";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
    	// echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
        move_uploaded_file($_FILES["accomoImage"]["tmp_name"],"uploads/accommodation_images/".$_FILES["accomoImage"]["name"]);
        $_SESSION['status']='Image Uploaded Successfully';
        header("Location: accomo.php");
    }
    else
    {
    	$_SESSION['status'] = "Image Not Uploaded.!!";
        header('Location: accomo.php');
        // echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }
}
// update accommodation image 
if(isset($_POST['updateAccomoImage'])){
    $imgedit_id=$_POST['accomoedit_id'];
    $name=$_POST['accomoName'];
    $image = $_FILES["accomoImage"]["name"]; 

    $query= "UPDATE accomoimages SET `accomoName`='$name', `accomoImage`='$image' WHERE id='$imgedit_id' ";
    $query_run = mysqli_query($conn,$query);

    if($query_run)
    {
    	// echo '<script type="text/javascript"> alert("Data Inserted Seccessfully!"); </script>';  // alert message
        move_uploaded_file($_FILES["accomoImage"]["tmp_name"],"uploads/accommodation_images/".$_FILES["accomoImage"]["name"]);
        $_SESSION['status']='Image Updated Successfully';
        header("Location: accomo.php");
    }
    else
    {
    	$_SESSION['status'] = "Image Not Updated.!!";
        header('Location: accomo.php');
        // echo '<script type="text/javascript"> alert("Error Uploading Data!"); </script>';  // when error occur
    }

}

// delete accommodation-images
if(isset($_POST['DeleteAccomobtn'])){
    $imageid = $_POST['delete_id'];

    $query = "DELETE FROM accomoimages WHERE id = '$imageid' ";
    $query_run= mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['status']='Image Deleted Successfully';
        header("Location: accomo.php");
    }
    else{
        $_SESSION['status']='Image Delete Failed !!';
        header("Location: accomo.php");
    }

}


// delete contact
if(isset($_POST['Deletecontactbtn'])){
    $userid = $_POST['delete_id'];

    $query = "DELETE FROM users WHERE id = '$userid' ";
    $query_run= mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['status']='Deleted Successfully';
        header("Location: contactQ.php");
    }
    else{
        $_SESSION['status']='Delete Failed !!';
        header("Location: contactQ.php");
    }

}

// delete feedback
if(isset($_POST['Deletefeedbackbtn'])){
    $userid = $_POST['delete_id'];

    $query = "DELETE FROM users WHERE id = '$userid' ";
    $query_run= mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['status']='Deleted Successfully';
        header("Location: feedbackQ.php");
    }
    else{
        $_SESSION['status']='Delete Failed !!';
        header("Location: feedbackQ.php");
    }

}

?>
