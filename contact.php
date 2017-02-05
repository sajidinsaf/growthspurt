<!DOCTYPE HTML>
<html>

<head>
  <title>GrowthSpurt</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>

<body>
  
  <div id="main">
    <div id="top_container">
	  <header>
        <div id="logo"><image src="images/growthspurt-logo.png"/></div> 
        <nav>
          <ul class="lavaLampWithImage" id="lava_menu">
            <li><a href="index.html">home</a></li>
            <li><a href="aboutus.html">about us</a></li>
            <li><a href="services.html">services</a></li>
            <li><a href="clients.html">clients</a></li>
            <li><a href="testimonials.html">testimonials</a></li>
            <li class="current"><a href="contact.php">contact us</a></li>
          </ul>
        </nav>
      </header>
      <div style="vertical-align:middle; text-align:center">
        <img width="550" height="250" src="images/1.jpg" alt="&quot;Skill building: Impactful Communication, Influencing, Networking, People Development &quot;" />
	  </div>	
	  <div class="strapline_container">	  
        <div class="strapline">
      <h2>Passionate about growth</h2>
		</div>
	  </div>	  
    </div>	
	
    <div id="site_content">
      <div id="content">
        <h1>Contact</h1>
        <?php
          // Set-up these 3 parameters
          // 1. Enter the email address you would like the enquiry sent to
          // 2. Enter the subject of the email you will receive, when someone contacts you
          // 3. Enter the text that you would like the user to see once they submit the contact form
          $to = 'shibu.warrier@gmail.com';
          $subject = 'Enquiry from the website';
          $contact_submitted = 'Your message has been sent. We endeavour respond to you within 72 hours';

          // Do not amend anything below here, unless you know PHP
          function email_is_valid($email) {
            return preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i',$email);
          }
          if (!email_is_valid($to)) {
            echo '<p style="color: red;">You must set-up a valid (to) email address before this contact page will work.</p>';
          }
          if (isset($_POST['contact_submitted'])) {
            $return = "\r";
            $youremail = trim(htmlspecialchars($_POST['your_email']));
            $yourname = stripslashes(strip_tags($_POST['your_name']));
            $yourmessage = stripslashes(strip_tags($_POST['your_message']));
            $contact_name = "Name: ".$yourname;
            $message_text = "Message: ".$yourmessage;
            $user_answer = trim(htmlspecialchars($_POST['user_answer']));
            $answer = trim(htmlspecialchars($_POST['answer']));
            $message = $contact_name . $return . $message_text;
            $headers = "From: ".$youremail;
            if (email_is_valid($youremail) && !eregi("\r",$youremail) && !eregi("\n",$youremail) && $yourname != "" && $yourmessage != "" && substr(md5($user_answer),5,10) === $answer) {
              mail($to,$subject,$message,$headers);
              $yourname = '';
              $youremail = '';
              $yourmessage = '';
              echo '<p style="color: blue;">'.$contact_submitted.'</p>';
            }
            else echo '<p style="color: red;">Please enter your name, a valid email address, your message and the answer to the simple maths question before sending your message.</p>';
          }
          $number_1 = rand(1, 9);
          $number_2 = rand(1, 9);
          $answer = substr(md5($number_1+$number_2),5,10);
        ?>
        <form id="contact" action="contact.php" method="post">
          <div class="form_settings">
            <p><span>Name</span><input class="contact" type="text" name="your_name" value="<?php echo $yourname; ?>" /></p>
            <p><span>Email Address</span><input class="contact" type="text" name="your_email" value="<?php echo $youremail; ?>" /></p>
            <p><span>Message</span><textarea class="contact textarea" rows="5" cols="50" name="your_message"><?php echo $yourmessage; ?></textarea></p>
            <p style="padding: 10px 0; line-height: 2em;">To help prevent spam, please enter the answer to this question:</p>
            <p><span><?php echo $number_1; ?> + <?php echo $number_2; ?> = ?</span><input type="text" name="user_answer" /><input type="hidden" name="answer" value="<?php echo $answer; ?>" /></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="send" /></p>
          </div>
        </form>
      </div>
    </div>
    <footer>
      <p><a href="index.html">home</a> | <a href="examples.html">about us</a> | <a href="services.html">services</a> | <a href="clients.html">clients</a> | <a href="testimonials.html">testimonials</a> | <a href="contact.php">contact</a></p>
      <p>&copy; 2016 GrowthSpurt. All Rights Reserved.</p>
    </footer>
  </div>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.easing.min.js"></script>
  <script type="text/javascript" src="js/jquery.lavalamp.min.js"></script>
  <script type="text/javascript" src="js/image_fade.js"></script>
  <script type="text/javascript">
    $(function() {
      $("#lava_menu").lavaLamp({
        fx: "backout",
        speed: 700
      });
    });
  </script>
</body>
</html>
