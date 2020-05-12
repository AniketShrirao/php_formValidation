<?php 
  include_once 'assets/php/form_validate.php';
?>
<!doctype html>
<!-- If multi-language site, reconsider usage of html lang declaration here. -->
<html lang="en"> 

<head>
  <meta charset="utf-8">
  <title>Form Validation</title>
  <!-- View-port Basics: http://mzl.la/VYREaP -->
  <!-- This meta tag is used for mobile device to display the page without any zooming,
       so how much the device is able to fit on the screen is what's shown initially. 
       Remove comments from this tag, when you want to apply media queries to the website. -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- Place favicon.ico in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="shortcut icon" href="favicon.ico" />
  <!--font-awesome link for icons-->
  <link rel="stylesheet" media="screen" href="assets/vendor/font-awesome/css/all.min.css" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Default style-sheet is for 'media' type screen (color computer display).  -->
  <link rel="stylesheet" media="screen" href="assets/css/style.css" >
</head>

<body>
  <!--container start-->
  <div class="container">
    <!--header section start-->
    <header>
      <div class="wrapper">
        <h1>Form Validation</h1>
      </div>
    </header>
    <!--header section start-->
    <!--main section start-->
    <main>
      <div class="wrapper">
        <div class="main-form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">       
          <div class="form-group">
            <label for="firstName">first name: </label>
            <input type="text" name="first_name" value="<?php echo $fname ?>" id="firstName">
            <span class="helperMessage" name="first_name_error"><?php echo $first_name_error; ?></span>
          </div>
          <div class="form-group">
            <label for="lastName">last name: </label>
            <input type="text" name="last_name" value="<?php echo $lname ?>" id="lastName">
            <span class="helperMessage" name="last_name_error"><?php echo $last_name_error; ?></span>
          </div>
          <div class="form-group">
            <label for="email">email id: </label>
            <input type="text" name="email_id" value="<?php echo $email ?>" id="email">
            <span class="helperMessage" name="email_id_error"><?php echo $email_id_error; ?></span>
          </div>
          <div class="form-group">
            <label for="phoneNo">phone no: </label>
            <input type="text" name="phone_no" value="<?php echo $phone ?>" id="phoneNo">
            <span class="helperMessage" name="phone_no_error"><?php echo $phone_no_error; ?></span>
          </div>
          <div class="form-group">
            <label for="password">password: </label>
            <input type="password" name="password" value="<?php echo $pass ?>" id="password">
            <span class="helperMessage" name="password_error"><?php echo $password_error; ?></span>
          </div>
          <div class="form-group">
            <label for="confirmPassword">confirm password: </label>
            <input type="password" name="confirm_password" value="<?php echo $confirm_pass ?>" id="confirmPassword">
            <span class="helperMessage" name="confirm_password_error"><?php echo $confirm_password_error; ?></span>
          </div>
          <div class="form-group">
            <label for="uploads">profile picture: </label>
            <input type="file" name="upload_profile" id="uploads">
            <span class="helperMessage" name="upload_profile_error"><?php echo $upload_profile_error ?></span>
          </div>
          <div class="form-control">
            <input type="submit" name="submit" id ="submit" value="Submit">
            <input type="reset"  name="reset" id = "cancel" value="Cancel">
          </div>
        </form>
        </div>
      </div>
    </main>
    <!--main section end-->
    <!--footer section start-->
    <footer> 
      <div class="wrapper">
        <h6>Logo</h6>
      </div>
    </footer>
    <!--footer section end-->
  </div>
  <!--container end-->
</body>
</html>