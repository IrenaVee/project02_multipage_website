<?php
if(isset($_POST['email'])) {


    $email_to = "irena.vieira@gmail.com";

    $email_subject = "website html form submissions";


    function died($error) {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    if(!isset($_POST['fullname']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $fullname = $_POST['fullname']; // required
    $email_from = $_POST['email']; // required
    $message = $_POST['message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$fullname)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
  if(strlen($message) < 2) {
    $error_message .= 'The Message you entered does not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "Name: ".clean_string($fullname)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";


// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Thank you!</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Satisfy|Roboto' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <!Onderstaande link heeft betrekking op Social Media icons onderaan de pagina>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>

    <nav class="topnav">
      <a class="logo" href="index.html">IV</a>
      <a href="index.html">HOME</a>
      <a href="about.html">ABOUT</a>
      <a href="skills.html">SKILLS</a>
      <a href="funfact.html">FUN FACTS!</a>
      <a href="contact.html">CONTACT</a>
    </nav>

    <section class="thank-you">
      <div class="content-wrap">
        <h1>Thank you!</h1>
        <p>Your message is underway to my inbox. <br> I will be in contact with you as soon as possible.
        </p>
      </div>
      </section>


  <footer>
     <div class="social-horizontal">
       <a href="https://twitter.com/msirenavieira" target="_blank"><i class="fa fa-twitter" title="Twitter"></i></a>
       <a href="https://uk.linkedin.com/in/irena-vieira-1020b76a" target="_blank"><i class="fa fa-linkedin" title="LinkedIn"></i></a>
       <a href="https://www.instagram.com/irena.vieira/" target="_blank"><i class="fa fa-instagram" title="Instagram"></i></a>
       <a href="https://www.facebook.com/Irena.Vieira" target="_blank"><i class="fa fa-facebook" title="Facebook"></i></a>
     </div>

     <nav class= "bottomnav">
       <a href="index.html">HOME</a>
       <a href="about.html">ABOUT</a>
       <a href="skills.html">SKILLS</a>
       <a href="funfact.html">FUN FACTS!</a>
       <a href="contact.html">CONTACT</a>
     </nav>

     <p class="copyright">&#169; 2015 by Irena Vieira</p>
   </footer>

</body>
</html>

<?php
}
die();
 ?>
