<?php
    if (isset($_POST["submit"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $human = intval($_POST['human']);
        $from = 'Website'; 
        $to = 'bcarped@comcast.net'; 
        $subject = 'Message from Website';
        
        $body = "From: $name\n E-Mail: $email\n Message:\n $message";
 
        // Check if name has been entered
        if (!$_POST['name']) {
            $errName = 'Please enter your name';
        }
        
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }
        
        //Check if message has been entered
        if (!$_POST['message']) {
            $errMessage = 'Please enter your message';
        }
        //Check if simple anti-bot test is correct
        if ($human !== 5) {
            $errHuman = 'Your anti-spam is incorrect';
        }
 
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
    if (mail ($to, $subject, $body, $from)) {
        $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
    } else {
        $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
    }
}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head> 
 <meta charset="utf-8">
    <title>Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Sarala' rel='stylesheet' type='text/css'>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Contact.css">
</head>


<style>
     
    #footer{
    background-color:white;
    height:50px;
    text-align: center;

  
}
    
    
    .logo-nav2{height:30px;
    width:50px;
    position:relative;
    bottom:5px;}

    .logo-nav1{
    height: Auto;
    Width:auto;
}

     .container-static{margin-top:-20px;
}
    
    .icon-bar {
    color: black;
    border-color: black;
    background-color: black;
}
    

     
     .jumbotronmaster{background-image:url(https://images.unsplash.com/photo-1428509397302-6725315e7947?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&w=1080&fit=max&s=77d0bdafe748596b29201da619629c4b);
     margin-top:-20px;
     height:700px;
}
    
    .Logo xs{height:90px;
}
    
    .img-responsive1{height:25%;
    width:25%;
}
     
     .input-group{padding:20px;}
     
     
     h1{font-family: 'Sarala', sans-serif;
}
     h2{font-family: 'Sarala', sans-serif;
}
     li{font-family: 'Sarala', sans-serif;
}
     
     a:link {color: #A72039;
}     
     a:visited {color: #A72039;
}   
     a:hover {color: #A72039;
}     
     a:active {color: #A72039;
}    
    
    </style>
   
<nav class="navbar navbar-default" style="background-color:white">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
           <a class="navbar-brand visible-xs" href="index.html">
                <img class="logo-nav2" alt="Logo xs" src="CEI%20Logomark.jpg">        
           </a>
           <a class="navbar-brand visible-sm" href="index.html">
                <img class="logo-nav2" alt="Logo sm" src="CEI%20Logomark.jpg">   
           </a>
           <a class="navbar-brand visible-md logo-nav1" href="index.html">
                <img class="img-responsive" alt="Logo md" src="Logo.jpg">
           </a>
           <a class="navbar-brand visible-lg logo-nav1" href="index.html">
                <img class="img-responsive" alt="Logo lg" src="Logo.jpg">
           </a>
    </div>

   
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <ul style= "margin-top:20px;" class="nav nav-pills navbar-right">
        <li><a href="index.html">Home</a></li>
        <li class="active"><a href="index.php">Contact</a></li>
      </ul>
      
    </div>
  </div>
</nav>

    
     
</style>
<div class="jumbotron jumbotronmaster">
    <div class=container>
        <div class="jumbotron" style="margin:30px;" >
             <h2 style="text-align:center; padding-bottom: 20px;">How can we help?</h2>
            <div class=container>
                      <div class="row" id=Content>
       <form class="form-horizontal" role="form" method="post" action="index.php">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
            <?php echo "<p class='text-danger'>$errName</p>";?>
            </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Your Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
            <?php echo "<p class='text-danger'>$errEmail</p>";?>
        </div>
    </div>
    <div class="form-group">
        <label for="message" class="col-sm-2 control-label">Message</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="4" name="message" placeholder="Your message here..."><?php echo htmlspecialchars($_POST['message']);?></textarea>
            <?php echo "<p class='text-danger'>$errMessage</p>";?>
        </div>
    </div>
    <div class="form-group">
        <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="human" name="human" placeholder="This is just for security.">
            <?php echo "<p class='text-danger'>$errHuman</p>";?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <?php echo $result; ?>    
        </div>
    </div>
</form> 
 </div>
</div>
</div>
</div>
</div>

<footer id="footer">
      <div class="container">
        <p class="text-muted">Carpenter Engineering</p>
      </div>
</footer>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-transition.js"></script>
</body>
</html>