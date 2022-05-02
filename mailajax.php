<?php
include('config/dbconn.php');
?>

<?php
$msg="";
if (isset($_POST['noPersons']) && isset($_POST['dateOccasion']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['message']) ){
    $noPersons=mysqli_real_escape_string($conn,$_POST['noPersons']);
    $dateOccasion=mysqli_real_escape_string($conn,$_POST['dateOccasion']);
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
    $message=mysqli_real_escape_string($conn,$_POST['message']);

    mysqli_query($conn,"insert into contactus(noPersons,dateOccasion,name,email,mobile,message) values('$noPersons','$dateOccasion','$name','$email','$mobile','$message')");
    $msg="Thank You..";

    $html="<table>
          <tr><td>No of Persons: </td><td>$noPersons</td></tr>
          <tr><td>Date for Occasion: </td><td>$dateOccasion</td></tr>
          <tr><td>Name: </td><td>$name</td></tr>
          <tr><td>Email: </td><td>$email</td></tr>
          <tr><td>Mobile No: </td><td>$mobile</td></tr>
          <tr><td>Message: </td><td>$message</td></tr>
          </table>";

    include('smtp/PHPMailerAutoload.php');
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
    $mail->Port=587;
    $mail->SMTPSecure="tls";
    // $mail->SMTPDebug = 4; 
    $mail->SMTPAuth=true;
    $mail->isHTML(true);
    $mail->Username="murali3811@gmail.com";
    $mail->Password="9019844407";
    $mail->SetFrom("murali3811@gmail.com");
    $mail->addAddress("murali3811@gmail.com");
    
    $mail->Subject="New Contact Us";
    $mail->Body= $html;
    $mail->SMTPOptions=array('ssl'=>array(
          'verify_peer'=>false,
          'verify_peer_name'=>false,
          'allow_self_signed'=>false,
    ));
    if($mail->send()){
      // echo "Mail Sent";
    }else{
      // echo "Error Occur";
    }
    echo $msg;
}



// feedback 
if(isset($_POST['feedback'])){
  $group1 = $_POST['group1'];
  $comments = $_POST['comments'];
  $email = $_POST['email'];

  $query = mysqli_query($conn, "INSERT INTO `feedback`( `email`, `poll`, `comments`) VALUES ('$email','$group1','$comments')");
  // $query_run= mysqli_query($conn, $query);

  if($query){
      $_SESSION['']='Feedback Successfull';
      header("Location: index.php");
  }
  else{
      $_SESSION['']='Feedback Failed !!';
      header("Location: index.php");
  }

}

?>