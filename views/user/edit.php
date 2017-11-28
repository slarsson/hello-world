<form action="<?php echo URL."user/authorize"; ?>" method="post" id="edit">

<div class="user-input" id="email">

		<label>Email</label>

		<input type="text" name="email" value="<?php echo $this->user['email']; ?>">

</div>

<div class="user-input" id="phone">

		<label>Phone Number</label>

		<input type="tel" name="phone" value="<?php echo $this->user['phone']; ?>">

</div>

<br>

<div class="user-input">

		<label>Firstname</label>

		<input type="text" name="firstname" value="<?php echo $this->user['firstname']; ?>">

</div>

<div class="user-input">

		<label>Lastname</label>

		<input type="text" name="lastname" value="<?php echo $this->user['lastname']; ?>">

</div>

<div class="user-input">

		<label>Street</label>

		<input type="text" name="street" value="<?php echo $this->user['street']; ?>">

</div>

<div class="user-input">

		<label>Zip</label>

		<input type="text" name="zip" value="<?php echo $this->user['zip']; ?>">

</div>

<div class="user-input">

		<label>City</label>

		<input type="text" name="city" value="<?php echo $this->user['city']; ?>">

</div>

<div class="user-input">

		<label>Country</label>

		<select name="country">
		
		<?php foreach($GLOBALS['countries'] as $key => $value): ?>

			<option value="<?php echo $key; ?>" <?php if($this->user['country'] == $key){echo "selected";}?>>

				<?php echo $value; ?>

			</option>

  		<?php endforeach; ?>

  		</select>

</div>

<div class="user-input-submit">

	<label></label>

	<div class="user-info-submit">

		<div class="submit"><input type="submit" value="SAVE CHANGES"></div>

		<div id="status"></div>

	</div>

</div>

</form>