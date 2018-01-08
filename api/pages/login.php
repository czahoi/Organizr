<?php

$pageLogin = '
<script>
</script>
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
    <div class="white-box">
      <form class="form-horizontal form-material" id="loginform" onsubmit="return false;">
        <a href="javascript:void(0)" class="text-center db"><img style="max-width: 350px;" src="https://sonflix.com/images/newsonflixlogo.png" alt="Home" /></a>

        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input class="form-control" name="username" type="text" required="" placeholder="Username" autofocus>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" name="password" type="password" required="" placeholder="Password" lang="en">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-login" name="remember" type="checkbox" checked>
              <label for="checkbox-signup" lang="en"> Remember Me </label>
            </div>
            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> <span lang="en">Forgot pwd?</span></a> </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light login-button" type="submit" lang="en">Login</button>
          </div>
        </div>

        <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
            <p><span lang="en">Don\'t have an account? </span><a href="#" class="text-primary m-l-5 to-register"><b lang="en">Sign Up</b></a></p>
          </div>
        </div>
      </form>
      <form class="form-horizontal form-material hidden" id="registerForm" onsubmit="return false;">
        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input class="form-control" type="text" name="registrationPassword" required="" placeholder="Registration Password" lang="en" autofocus>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" name="username" type="text" required="" placeholder="Username" lang="en">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" name="email" type="text" required="" placeholder="Email" lang="en">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" name="password" type="password" required="" placeholder="Password" lang="en">
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light register-button" type="submit" lang="en">Register</button>
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button id="leave-registration" class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="button" lang="en">Go Back</button>
          </div>
        </div>
      </form>
      <form class="form-horizontal" id="recoverform" action="">
        <div class="form-group ">
          <div class="col-xs-12">
            <h3 lang="en">Recover Password</h3>
            <p class="text-muted" lang="en">Enter your Email and instructions will be sent to you! </p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Email" lang="en">
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" lang="en">Reset</button>
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button id="leave-recover" class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="button" lang="en">Go Back</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
';