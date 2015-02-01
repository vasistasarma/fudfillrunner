<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="css/assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">

      <form class="form-signin" action="includes/credential_check.php" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="User name" id="user_name" name="user_name" autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off">
        <input type="password" class="input-block-level" placeholder="Password" id="user_password" name="user_password">
        <input class="btn btn-large btn-primary" type="submit" value="Sign in">
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>