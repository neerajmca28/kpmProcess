
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Internal Software :: Login</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
    <meta property="og:url" content="http://demo.naksoid.com/elephant">
    <meta property="og:type" content="website">
    <meta property="og:title" content="The fastest way to build modern admin site for any platform, browser, or device">
    <meta property="og:description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
    <meta property="og:image" content="../../elephant/img/ae165ef33d137d3f18b7707466aa774d.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@naksoid">
    <meta name="twitter:creator" content="@naksoid">
    <meta name="twitter:title" content="The fastest way to build modern admin site for any platform, browser, or device">
    <meta name="twitter:description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
    <meta name="twitter:image" content="../../elephant/img/ae165ef33d137d3f18b7707466aa774d.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="manifest.json">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#0288d1">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/vendor.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/elephant.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/login-1.min.css">
  </head>
  <body>
    <div class="login">
      <div class="login-body">
        <a class="login-brand" href="javascript:void(0)">
          <img class="img-responsive" src="<?= base_url(); ?>assets/img/Logo G-trac.png" alt="GTRAC">
        </a>
        <h3 class="login-heading">Sign in</h3>
        <div class="login-form">
          <form data-toggle="validator" method="post" action="<?= base_url(); ?>welcome/authentication">
            <div class="form-group">
              <label for="username" class="control-label">Username</label>
              <input id="username" class="form-control" type="text" name="username" spellcheck="false" autocomplete="off" data-msg-required="Please enter your username." required>
            </div>
            <div class="form-group">
              <label for="password" class="control-label">Password</label>
              <input id="password" class="form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
            </div>
            <div class="form-group">
              <label for="password" class="control-label"></label>
              <button class="btn btn-primary btn-block" type="submit" name="LoginSubmit">Sign in</button>
            </div>
            <!-- <div class="form-group">
              <ul class="list-inline">
                <li>
                  <label class="custom-control custom-control-primary custom-checkbox">
                    <input class="custom-control-input" type="checkbox">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-label">Keep me signed in</span>
                  </label>
                </li>
              </ul>
              <ul class="list-inline">
                <li><a href="password-1.html">Forgot username?</a></li>
                <li>
                  <span aria-hidden="true"> · </span>
                </li>
                <li><a href="password-1.html">Forgot password?</a></li>
              </ul>
            </div> -->
          </form>
        </div>
      </div>
      <!-- <div class="login-footer">
        <ul class="list-inline">
          <li><a class="link-muted" href="signup-1.html">Sign up</a></li>
          <li>|</li>
          <li><a class="link-muted" href="#">Privacy Policy</a></li>
          <li>|</li>
          <li><a class="link-muted" href="#">Terms</a></li>
          <li>|</li>
          <li><a class="link-muted" href="#">Cookie Policy</a></li>
          <li>|</li>
          <li>© Elephant 2016</li>
        </ul>
      </div>
    </div> -->
    <script src="<?= base_url(); ?>assets/js/vendor.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/elephant.min.js"></script>
  </body>
</html>