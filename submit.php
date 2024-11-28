<?php

if(isset($_POST['submit'])){
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];


   
//email
$to = "proptimesbangalore@gmail.com,Marketing@proptimes.org,hussainproptimes@gmail.com";
$subject = "Enquiry From To Sobha Hartland II ";

$htmlContent = '<html>
<body>
<div style="background:#eceff0; padding:30px; font-family:Verdana, Geneva, sans-serif; font-size:13px;">
<div style="background:#fff; border:1px solid#ccc; padding:25px;">



<br><br>
You have recived new enquiry from Sobha Hartland II  <br><br>

Details are:<br><br>
Name: '.$_POST['Name'].'<br>
County code: '.$_POST['County-code'].'<br>
Number: '.$_POST['Number'].'<br>
Email:  '.$_POST['Email'].'<br>
Project:  '.$_POST['Project'].'<br>
Location:  '.$_POST['Location'].'<br>
Ip:  '.$_POST['Ip'].'<br>


<br><br>
Team<br>
<strong>To Sobha Hartland II </strong><br>
</div>
</div>
</body>
</html>';

// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From:mickeysingh2017@gmail.com'  . "\r\n";


// Send email
mail($to,$subject,$htmlContent,$headers);
  //end email
    header('Location: thanks.php');
}
?>

