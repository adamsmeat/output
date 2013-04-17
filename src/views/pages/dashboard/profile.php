<?=Form::open(['url' => 'dashboard', 'class' => 'form-horizontal'])?>
	<div class="control-group">
		<label class="control-label" for="username">Username</label>
		<div class="controls">
			<?=Form::text('username', Auth::user()->username, ['placeholder' => 'username'])?>
		</div>
	</div>	
	<div class="control-group">
		<label class="control-label" for="email">Email</label>
		<div class="controls">
			<?=Form::text('email', Auth::user()->email, ['placeholder' => 'email@example.com'])?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="first_name">First Name</label>
		<div class="controls">
			<?=Form::text('first_name', Auth::user()->first_name)?>
		</div>
	</div>	
	<div class="control-group">
		<label class="control-label" for="last_name">Last Name</label>
		<div class="controls">
			<?=Form::text('last_name', Auth::user()->last_name)?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?=Form::submit('Update', ['class' => 'btn btn-primary'])?>
		</div>
	</div>
<?=Form::close()?>