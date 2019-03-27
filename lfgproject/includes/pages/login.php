<div class="container">
<div class="row">
<div class="col-sm-8 col-md-6 col-lg-4 mx-auto loginSpacer">
<div class="loginBox">
<div id="login">
<form id="form_login" action="javascript:void(0);">
<fieldset>
<legend>Login</legend>
</fieldset>
<div class="form-group">
<label for="emailaddress">Email Address</label>
<input id="login_email" type="email" class="form-control" placeholder="Enter Email" required/>
</div>
<div class="form-group">
<label for="password">Password</label>
<input id="login_password" type="password" class="form-control" placeholder="Password" required/>
</div>
<button type="submit" class="btn btn-primary btn-block">Login</button>
</form>
<p>Don't have an account? <a id="dropSignup" href="#">Sign up</a>.</p>
</div>
<div style="display: none;" id="signup">
<form id="form_signup" action="javascript:void(0);">
<fieldset>
<legend>Sign up</legend>
</fieldset>
<div class="form-group">
<label for="username">Username</label>
<input id="signup_username" type="text" class="form-control" placeholder="Enter Username" required/>
</div>
<div class="form-group">
<label for="emailaddress">Email Address</label>
<input id="signup_email" type="email" class="form-control" placeholder="Enter Email" required/>
</div>
<div class="form-group">
<label for="password">Password</label>
<input id="signup_password" type="password" class="form-control" placeholder="Password" required/>
</div>
<div class="form-group">
<label for="password">Confirm Password</label>
<input id="signup_confirmpassword" type="password" class="form-control" placeholder="Confirm Password" required/>
</div>
<button type="submit" class="btn btn-primary btn-block">Sign up</button>
</form>
<p>Already have an account? <a id="dropLogin" href="#">Login</a>.</p>
</div>
</div>
<div style="padding-top: 10px; display: none;" id="registration"></div>
</div>
</div>
</div>
