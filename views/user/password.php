<form action="<?php echo URL."user/authorize"; ?>" method="post" id="edit">

<div class="user-input" id="new_password">

		<label>New Password</label>

		<input type="password" name="new_password" value="">

</div>

<div class="user-input" id="confirm_password">

		<label>Comfirm Password</label>

		<input type="password" name="confirm_new_password" value="">

</div>

<br>

<div class="user-input" id="old_password">

		<label>Old Password</label>

		<input type="password" name="old_password" value="">

</div>

<div class="user-input-submit">

	<label></label>

	<div class="user-info-submit">

		<div class="submit"><input type="submit" value="CHANGE PASSWORD"></div>

		<div id="status"></div>

	</div>

</div>

</form>