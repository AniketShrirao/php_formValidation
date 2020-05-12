<?php 
  include_once 'assets/php/form_validate.php';
  $default = 'assets/demo_pics/user.jpeg';
?>
<!doctype html>
<!-- If multi-language site, reconsider usage of html lang declaration here. -->
<html lang="en"> 

<head>
  <meta charset="utf-8">
  <title>registered Successfully</title>
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
        <h1>USERS</h1>
      </div>
    </header>
    <!--header section start-->
    <!--main section start-->
    <main>
      <div class="wrapper">
        <h3>user Details</h3>
      <ul class="customer-list">
        <li class="customer">
          <img src="<?php echo ($_REQUEST['image'] == "") ? $default : $_REQUEST['image'] ?>" class="customer-img" alt="Default User">
            <ul class="customer-details">
              <li>
                <span class="label-name">name :</span>
                <span id="customer-name"><?php echo $_REQUEST['name'] ?></span>
              </li>
              <li>
                <span class="label-course">Email address :</span>
                <span id="customer-course"><?php echo $_REQUEST['email'] ?></span>
              </li>
              <li>
                <span class="label-author">Mobile Number :</span>
                <span id="Customer-author"><?php echo $_REQUEST['phone'] ?></span>
              </li>
            </ul>
        </li>
      </ul>
      </div>
    </main>
    <!--main section end-->
  </div>
  <!--container end-->
</body>
</html>  