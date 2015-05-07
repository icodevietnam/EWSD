<?php
	$currentUser = helpers\session::get('user');
	if($currentUser->role_name == 'staff' || $currentUser->role_name == 'admin' ){
		helpers\url::redirect('EWSD/admin/dashboard');
	}
?>
<form class="box login" action="loginStaffProcess" method="post">
	<fieldset class="boxBody">
	  <label>Username</label>
	  <input type="text" tabindex="1" placeholder="username" name="username" required>
	  <label><a href="#" class="rLink" tabindex="5">Forget your password?</a>Password</label>
	  <input type="password" placeholder="password" name="password" tabindex="2" required>
	</fieldset>
	<footer>
	  <label><input type="checkbox" tabindex="3">Keep me logged in</label>
	  <input type="submit" class="btnLogin" name='action' value="Login" tabindex="4">
	</footer>
</form>